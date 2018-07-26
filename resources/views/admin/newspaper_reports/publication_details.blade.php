@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>Generate Publication Details</h3>

                                {!! Form::open(['url' => '/newspaper_reports/generate_pub_details','method'=>'GET','class'=>'form-horizontal']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::label('output_date','Output Date') !!}
                                            {!! Form::date('output_date',null,['class'=>'form-control']) !!}
                                            <br>
                                            {!! Form::label('delivery_time','Folder') !!}
                                            {!! Form::select('delivery_time',\App\Output::groupBy('delivery_time')->lists('delivery_time','delivery_time'),null,['class'=>'form-control']) !!}
                                            <br>
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
                            <hr>

                            @if($downloads->count() > 0)
                                {!! Form::open(['url' => '/export/generate_pub_details','method'=>'GET','class'=>'form-horizontal']) !!}
                                <div class="hidden">
                                    {!! Form::date('output_date',null,['class'=>'form-control']) !!}
                                    {!! Form::select('delivery_time',\App\Output::groupBy('delivery_time')->lists('delivery_time','delivery_time'),null,['class'=>'form-control']) !!}
                                </div>
                                {!! Form::submit('Export To Text File',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            @endif
                            <br>
                            <br>
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Publication Name</th>
                                <th>Publication Date</th>
                                <th>Status</th>
                                <th>Folder</th>
                                <th>Remarks</th>
                                <th>Downloader</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloads as $download)
                                <tr>
                                    <td>{{ $download->id }}</td>
                                    <td>{{ $download->publication->publication_name }}</td>
                                    <td>{{ $download->publication_date }}</td>
                                    <td>{{ $download->status }}</td>
                                    <td>{{ $download->output->first()->delivery_time }}</td>
                                    <td>{{ $download->remarks }}</td>
                                    <td><small class="label label-info">{{ $download->user['operator_no'] }}</small></td>
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
