@extends('layouts.admin.admin',['logo'=>'fa fa-diamond','page_header' => 'Assets'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/assets/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Asset</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item No.</th>
                            <th>Quantity</th>
                            <th>Item Name</th>
                            <th>Item Brand</th>
                            <th>Description</th>
                            <th>Serial No.</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $asset)
                            <tr>
                                <td>{{ $asset->id }}</td>
                                <td>{{ $asset->item_no }}</td>
                                <td>{{ $asset->quantity }}</td>
                                <td>{{ $asset->item_name }}</td>
                                <td>{{ $asset->item_brand }}</td>
                                <td>{{ $asset->description }}</td>
                                <td>{{ $asset->serial_no }}</td>
                                <td>{{ $asset->status }}</td>
                                <td>{{ $asset->remarks }}</td>
                                <td>
                                    <a href="assets/{{ $asset->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($asset,['method'=>'DELETE','url' => '/assets/'.$asset->id,'style'=>'display:inline']) !!}
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
