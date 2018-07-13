@extends('layouts.admin.admin',['logo' =>'fa fa-address-book','page_header' => 'Contacts'])

@section('main-content')
    @foreach($contacts as $contact)
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <img src="{{ asset('images/userprofile/user.png') }}" width="200px"/>
            </div>
            <div class="col-md-8">
                <h3>{{ $contact->lastname.', '.$contact->firstname }}</h3>
                <h4>{{ $contact->address }}</h4>
                <br>
                <h5>{{ $contact->mobile_1 }}</h5>
                <h5>{{ $contact->company_name }}</h5>
                <h5>{{ $contact->email }}</h5>
                <a href="contacts/{{ $contact->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                {!! Form::model($contact,['method'=>'DELETE','url' => '/contacts/'.$contact->id,'style'=>'display:inline']) !!}
                {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}

                {!! Form::close() !!}
            </div>
        </div>

        <hr>
    @endforeach



    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/contacts/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
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
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection
