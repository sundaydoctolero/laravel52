@extends('layouts.admin.admin',['page_header' => $abouts-> site_name])

@section('main-content')
    <div class="row">
        <div class = "col-xs-12">
            <div class = "box">
                <div class = "box-header">
                </div>
                <div class ="box-body">
                    <p>{{$abouts->company_name}}</p>
                    <a href = "/abouts"><button>Back</button></a>
                </div>

                <div class = "box-footer">
                </div>
            </div>
        </div>
    </div>




@endsection
