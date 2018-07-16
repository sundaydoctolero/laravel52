@extends('layouts.admin.admin',['page_header' => '', 'logo'=> ''])

@section('main-content')
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header" style=background-color:powderblue>

                    </div>
                    <div class="box-body" style=background-color:ghostwhite>
                        {!! Form::open(['url' => '/permissions/create']) !!}
                        <div class = "col-md-offset-1">
                            <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-plus-circle">&nbsp<tt>Add New Permission</tt></h1></font>
                        </div>
                        <hr style="height:2px; border:none; color:#000; background-color:#282B2E;">
                       @include('admin.permissions.form',['buttonlabel' => 'Add Permission'])
                    </div>
                    <div class="box-footer" style=background-color:powderblue>

                    </div>
                </div>
            </div>
        </div>
@endsection
