@extends('layouts.admin.admin',['page_header' => 'Workstations'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/workstations/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Workstation</button></a></h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Rack ID</th>
                        <th>IP Address</th>
                        <th>Workstation ID</th>
                        <th>Table</th>
                        <th>Location</th>
                        <th>Operator</th>
                        <th>Comp Name</th>
                        <th>Mac Address</th>
                        <th>Action</th>

                    </tr>
                    @foreach($workstations as $workstation)
                    <tr>
                        <td>{{ $workstation->id }}</td>
                        <td>{{ $workstation->rack_id}}</td>
                        <td>{{ $workstation->ip_address }}</td>
                        <td>{{ $workstation->workstation_id }}</td>
                        <td>{{ $workstation->table }}</td>
                        <td>{{ $workstation->location }}</td>
                        <td>{{ $workstation->operator }}</td>
                        <td>{{ $workstation->comp_name }}</td>
                        <td>{{ $workstation->mac_address }}</td>
                        <td>
                            <a href="workstations/{{ $workstation->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($workstation,['method'=>'DELETE','url' => '/workstations/'.$workstation->id,'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
