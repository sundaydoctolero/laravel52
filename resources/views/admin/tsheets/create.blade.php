@extends('layouts.admin.admin',['logo'=>'','page_header' => ''])
@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/tasks/create']) !!}
                        <div class = "col-md-offset-1">
                            <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-plus-circle">&nbsp<tt>Add Tsheet</tt></h1></font>
                        </div>
                        <hr>
                        <div class = "container" >
                            <tt>

                                <font face = "microsoft sans serif">

                                    <div class="row">
                                        <div class="form-group">
                                            <div class = "col-md-6 col-xm-1 col-md-offset-3">
                                                    {!! Form::open(['url' => '/tsheets/create']) !!}
                                                    {!! Form::label('user_id', 'Employee') !!}
                                                    {!! Form::select('user_id',$user_lists,null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </font>
                            </tt>
                        </div>


                        @include('admin.tsheets.form',['buttonlabel' => 'Add Tsheet'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
