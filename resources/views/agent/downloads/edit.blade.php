@extends('layouts.app.app',['page_header' => 'Modify Downloads'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1>
                            <strong>{{ $download->publication->publication_name}}</strong>
                            <small class="label label-info"> {{$download->publication->publication_code }}{{ ' '.$download->publication_date }}</small>
                        </h1>
                    </div>
                </div>
                <div class="box-body" style="font-size: 16px">
                    <div class="col-md-5 col-md-offset-1">
                    <ul class="list-group">
                        @foreach(explode(" ",$download->publication->website) as $key)
                            <li class="list-group-item"><a target="_blank" href="{{ $key }}">{{ $key }}</a></li>
                        @endforeach
                        <li class="list-group-item"><i>state : </i>
                            @foreach($download->publication->states as $state)
                                <small class="label label-info">{{ $state->state_code }}</small>
                            @endforeach
                        </li>
                        <li class="list-group-item"><i>username : </i>{{ $download->publication->username }}</li>
                        <li class="list-group-item"><i>password : </i>{{ $download->publication->password }}</li>
                        <li class="list-group-item"><i>issue : </i>
                            {{ $download->publication->issue.' [ ' }}
                            @foreach($download->publication->days as $day)
                                {{ $day->day_code.' | '}}
                            @endforeach
                            ]
                        </li>
                        <li class="list-group-item"><i>download instruction :</i> </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-solid box-primary">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header"></div>
                <div class="box-body">
                    {!! Form::model($download,['method'=>'PATCH','url' => '/agent/downloads/'.$download->id,'class'=>'form-horizontal']) !!}
                    @include('agent.downloads.form',['buttonlabel'=>'Update Download'])
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>






@endsection
