@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="background-color: lightblue">
                    {!! Form::open(['url' => '/newspaper_reports/monthly_delivery','class' => 'form-inline', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Export To Excel</a></h3>
                    </div>
                    <div class="pull-right">
                        <div class="form-group">
                            {!! Form::label('publication_day', 'Day of Publication :') !!}
                            {!! Form::select('publication_day',\App\Day::lists('day_name','day_code'),null,['class'=>'form-control','placeholder'=>'---']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_from', 'Date From :') !!}
                            {!! Form::date('date_from',\Carbon\Carbon::now()->startOfMonth(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_to', 'To :') !!}
                            {!! Form::date('date_to',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Filter User',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="box-body" style="background-color: #494949">
                    <table class="table table-bordered" style="color:white;border:2px solid" >
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">State</th>
                                <th rowspan="2">Publication Name</th>
                                <th rowspan="2" class="text-center">Pub Type</th>
                                <th rowspan="2" class="text-center">Publication Day</th>
                                <th colspan="4" class="text-center">1st Week</th>
                                <th colspan="4" class="text-center">2nd Week</th>
                                <th colspan="4" class="text-center">3rd Week</th>
                                <th colspan="4" class="text-center">4th Week</th>
                            </tr>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Sale</th>
                                <th class="text-center">Rent</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Sale</th>
                                <th class="text-center">Rent</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        @foreach($publications as $count => $publication)
                            @foreach($publication->days as $row => $day)
                                <tr>
                                    <td>{{ $count + 1 }}</td>
                                    <td class="text-center">{{ $publication->states->first()->state_code }}</td>
                                    <td>{{ ucwords($publication->publication_name) }}&nbsp;&nbsp;<small class="label label-success pull-right" >[{{ $publication->issue }}</small></td>
                                    <td class="text-center">{{ $publication->publication_type }}</td>
                                    <td class="text-center">{{ $day->day_code }}</td>

                                    @if($day->day_code == 'MNTH' OR $day->day_code == 'Email' OR $day->day_code == 'Aut' OR $day->day_code == 'Spr' OR $day->day_code == 'Sum' OR $day->day_code == 'Win' OR $day->day_code == 'Aut')
                                        @foreach($publication->downloads as $download)
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $download->publication_date }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('sale_records') }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('rent_records') }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('sale_records') + collect($download->output)->sum('rent_records') }}</td>
                                        @endforeach
                                    @else
                                        @foreach($publication->downloads()->whereBetween('publication_date',['2018-08-01','2018-08-30'])->where(\DB::raw("WEEKDAY(publication_date)"),day_int($day->day_code))->get() as $download)
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $download->publication_date }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('sale_records') }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('rent_records') }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ collect($download->output)->sum('sale_records') + collect($download->output)->sum('rent_records') }}</td>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        "order": [[ 6, "asc" ]],
        "pageLength": 50,
    } );
</script>
@endpush