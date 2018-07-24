@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>Download Report</h3>

                                {!! Form::open(['url' => '/newspaper_reports/delivered_reports','method'=>'GET','class'=>'form-horizontal']) !!}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {!! Form::label('date_from','Output Date From') !!}
                                            {!! Form::date('date_from',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {!! Form::label('date_to','Date To') !!}
                                            {!! Form::date('date_to',null,['class'=>'form-control']) !!}
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
                                <th>Output Date</th>
                                <th>Processor</th>
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
                                    <td>{{ $download->output->first()->output_date }}</td>
                                    <td>
                                        @foreach($download->output as $operator=> $key)
                                            <small class="label label-danger">{{ $key->user['operator_no'] }}</small>
                                        @endforeach
                                    </td>
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
