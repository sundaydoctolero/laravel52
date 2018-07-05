@extends('layouts.admin.admin',['page_header' => 'Contacts'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/contacts/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Contact</button></a></h3>

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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Landline</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Mobile 1</th>
                        <th>Mobile 2</th>
                        <th>Skype Id</th>
                        <th>Action</th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->firstname}}</td>
                        <td>{{ $contact->lastname }}</td>
                        <td>{{ $contact->company_name }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->landline }}</td>
                        <td>{{ $contact->website }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->mobile_1 }}</td>
                        <td>{{ $contact->mobile_2 }}</td>
                        <td>{{ $contact->skype_id }}</td>

                        <td>
                            <a href="contacts/{{ $contact->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($contact,['method'=>'DELETE','url' => '/contacts/'.$contact->id,'style'=>'display:inline']) !!}
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
