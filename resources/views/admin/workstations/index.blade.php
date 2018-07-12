@extends('layouts.admin.admin',['page_header' => 'Workstations', 'logo'=>'fa fa-keyboard-o'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/workstations/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>

                        <tr>
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
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection
