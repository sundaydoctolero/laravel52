@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header" style="background-color: lightblue">
                        {!! Form::open(['url' => '/newspaper_reports/not_updated_reports','class' => 'form-inline', 'method' => 'GET']) !!}
                        <div class="form-group">
                            <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-list"></i>  <strong>Not Updated Reports</strong></a></h3>
                        </div>
                        <div class="pull-right">
                            <div class="form-group">
                                {!! Form::label('filter', 'Filter') !!}
                                {!! Form::select('filter_list[]',$status_lists, null, ['class'=>'form-control','required'=>'true','id'=>'role_list','multiple'=>'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Filter Results',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body">
                            @if($downloads->count() > 0)
                                {!! Form::open(['url' => '/export/not_updated','method'=>'GET','class'=>'form-horizontal']) !!}
                                <div class="hidden">
                                    {!! Form::select('filter_list[]',$status_lists, null, ['class'=>'form-control','required'=>'true','id'=>'role_list','multiple'=>'true']) !!}
                                </div>
                                {!! Form::submit('Export To Excel',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            @endif
                            <br>
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">ID</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Name</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Status</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Remarks</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Downloader</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloads as $download)
                                <tr>
                                    <td class="text-center">{{ $download->id }}</td>
                                    <td class="text-left">{{ $download->publication->publication_name }}</td>
                                    <td class="text-center">{{ $download->publication_date }}</td>
                                    <td class="text-center">{{ $download->status }}</td>
                                    <td class="text-center">{{ $download->remarks }}</td>
                                    <td class="text-center""><small class="label label-info">{{ $download->user['operator_no'] }}</small></td>
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
