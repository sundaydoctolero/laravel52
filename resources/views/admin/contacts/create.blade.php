@extends('layouts.admin.admin',['logo'=>'','page_header' => ''])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/contacts/create']) !!}
                        <div class = "col-md-offset-1">
                            <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-user-plus">&nbsp<tt>Add New Contact</tt></h1></font>
                        </div>
                        <hr>


                        @include('admin.contacts.form',['buttonlabel' => 'Add Contact'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
