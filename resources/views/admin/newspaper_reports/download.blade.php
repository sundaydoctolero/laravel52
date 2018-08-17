@extends('layouts.admin.admin',['page_header' => 'Publication Reports', 'logo' => 'fa fa-newspaper-o'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="background-color: lightblue">
                        {!! Form::open(['url' => '/newspaper_reports/download','class' => 'form-inline', 'method' => 'GET']) !!}
                        <div class="form-group">
                            <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-download"></i> Download Reports</a></h3>
                        </div>
                        <div class="pull-right">
                            <div class="form-group">
                                {!! Form::label('status','Report') !!}
                                {!! Form::select('status',['Download','Delivered'],null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_from','Output Date From') !!}
                                {!! Form::date('date_from',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_to','Date To') !!}
                                {!! Form::date('date_to',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Filter Results',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="box-body">
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">ID</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Name</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Status</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Remarks</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Download Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Output Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloads as $download)
                                <tr>
                                    <td class="text-center">{{ $download->id }}</td>
                                    <td>{{ $download->publication->publication_name }}</td>
                                    <td class="text-center">{{ $download->publication_date }}</td>
                                    <td class="text-center">{{ $download->status }}</td>
                                    <td class="text-center">{{ $download->remarks }}</td>
                                    <td class="text-center">{{ $download->website_update_at }}</td>
                                    <td class="text-center">{{ $download->output2['output_date'] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
