@extends('layouts.admin.admin',['page_header' => 'Assets'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/assets/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>

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
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
