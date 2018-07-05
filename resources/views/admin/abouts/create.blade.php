@extends('layouts.admin.admin',['page_header' => 'Abouts'])

@section('main-content')
    <div class="row">
        <div class = "col-xs-12">
            <div class = "box">
                <div class = "box-header">
                </div>
                <div class ="box-body">
                    {!! Form::open(['url' => '/abouts/create']) !!}
                    @include('admin.abouts.form',['buttonlabel'=>'Add About'] )
                </div>

                <div class = "box-footer">
                </div>
            </div>
        </div>
    </div>


@endsection