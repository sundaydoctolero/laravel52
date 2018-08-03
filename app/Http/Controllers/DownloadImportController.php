<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;
use App\Publication;
use App\Download;
use App\Output;

class DownloadImportController extends Controller
{
    public function import_downloads(){



        $today = Carbon::now();
        $advance = Carbon::now()->addDays(7);


        $check = Download::where('publication_date',$today->toDateString())->get();

        if($check->count() > 0){
            flash('Batch Imports already Run!!')->warning();
            return redirect()->back();
        }

        $this->import_publications_monthly();

        $publications =  Publication::whereHas('days',function ($query) use ($today) {
            $query->where('day_name',$today->format('l'));
        })->with('days')->get();


        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;

            if($publication->issue == 'Weekly - Advance'){
                $download->publication_date = $advance->toDateString();
            } else {
                $download->publication_date = $today->toDateString();
            }
            $download->no_of_batches = $publication->default_batch;

            if($publication->publication_type == 'Direct Capture'){
                $download->status = 'For Entry';
                /**
                 * sync offline code here
                 */
            } else {
                $download->status = 'For Download';
            }


            $download->save();
            $download->output()->save(new Output());
        }
        flash('Batch Imports successful!!')->success();
        return redirect()->back();
    }

    public function import_publications_monthly(){
        if(Carbon::now()->day == 1){
            $publications =  Publication::whereHas('days',function ($query) {
                $query->where('day_name','Monthly');
            })->with('days')->get();

            foreach($publications as $publication){
                $download = new Download();
                $download->publication_id = $publication->id;
                $download->publication_date = Carbon::now()->toDateString();
                $download->no_of_batches = $publication->default_batch;
                $download->status = 'For Download';
                $download->save();
                $download->output()->save(new Output());
            }
        }

    }

    public function import_property_press(){

    }

}
