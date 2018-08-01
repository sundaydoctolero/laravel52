@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>Download Report</h3>
                                {!! Form::open(['url' => '/newspaper_reports/download','method'=>'GET','class'=>'form-horizontal']) !!}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {!! Form::label('status','Report') !!}
                                            {!! Form::select('status',['Download','Delivered'],null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-xs-12">
                                            {!! Form::label('date_from','Output Date From') !!}
                                            {!! Form::date('date_from',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {!! Form::label('date_to','Date To') !!}
                                            {!! Form::date('date_to',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <br>
                                    {!! Form::submit('Filter Results',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Publication Name</th>
                                <th>Publication Date</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Download Date</th>
                                <th>Output Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloads as $download)
                                <tr>
                                    <td>{{ $download->id }}</td>
                                    <td>{{ $download->publication->publication_name }}</td>
                                    <td>{{ $download->publication_date }}</td>
                                    <td>{{ $download->status }}</td>
                                    <td>{{ $download->remarks }}</td>
                                    <td>{{ $download->website_update_at }}</td>
                                    <td>{{ $download->output2['output_date'] }}</td>
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
