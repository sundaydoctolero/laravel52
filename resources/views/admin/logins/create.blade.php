@extends('layouts.admin.admin',['page_header' => 'Add Login'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style=background-color:powderblue>

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/logins/create']) !!}
                        @include('admin.logins.form',['buttonlabel' => 'Add Login'])
                    </div>
                    <div class="box-footer" style=background-color:powderblue>

                    </div>
                </div>
            </div>
        </div>
@endsection
