@extends('layouts.admin.admin',['page_header' => 'States', 'logo' =>'fa fa-building'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/states/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>State Code</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($states as $state)
                            <tr>
                                <td>{{ $state->id }}</td>
                                <td>{{ $state->state_code }}</td>
                                <td>{{ $state->state }}</td>

                                <td>
                                    <a href="states/{{ $state->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($state,['method'=>'DELETE','url' => '/states/'.$state->id,'style'=>'display:inline']) !!}
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