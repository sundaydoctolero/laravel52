@extends('layouts.admin.admin',['page_header' => 'Job Numbers'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/jobnumbers/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Number</th>
                            <th>Job Number Description</th>
                            <th>Month Of</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobnumbers as $jobnumber)
                            <tr>
                                <td>{{ $jobnumber->id }}</td>
                                <td>{{ $jobnumber->job_number_id }}</td>
                                <td>{{ $jobnumber->job_number_description }}</td>
                                <td>{{ $jobnumber->month_of }}</td>
                                <td>
                                    <a href="jobnumbers/{{ $jobnumber->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Modify</button></a>
                                    {!! Form::model($jobnumber,['method'=>'DELETE','url' => '/jobnumbers/'.$jobnumber->id,'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection
