@extends('layouts.admin.admin',['page_header' => 'Publications', 'logo'=> 'fa fa-newspaper-o'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {!! Form::open(['url' => '/publications','method'=>'GET']) !!}
                        {!! Form::label('Day Due Out', 'Day Due Out') !!}
                        {!! Form::select('filter_list[]',\App\Day::lists('day_code','id'),null, ['class'=>'form-control','id'=>'role_list','multiple'=>'true']) !!}
                        {!! Form::submit('Filter Results',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <hr>
                    <div class="box-title">

                        <h3 class="box-title"><a href="/publications/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>States</th>
                            <th>Publication Name</th>
                            <th>Website URL</th>
                            <th>Issue</th>
                            <th>Day Due Out</th>
                            <th class="text-center">Publication Type</th>
                            <th class="text-center">Batching</th>
                            <th class="text-center">Action</th>



                        </tr>
                        </thead>
                        <tbody>

                        @foreach($publications as $publication)
                            <tr>
                                <td>{{ $publication->id }}</td>
                                <td>
                                    @foreach($publication->states as $state)
                                        <small class="label label-success">{{ $state->state_code }}</small>
                                    @endforeach
                                </td>
                                <td>{{ $publication->publication_name }}</td>
                                <td>{{ $publication->website }}</td>
                                <td>{{ $publication->issue }}</td>
                                <td>
                                    @foreach($publication->days as $day)
                                        <small>{{ $day->day_code.' |'}}</small>
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $publication->publication_type }}</td>
                                <td class="text-center">{!! batching_label($publication->default_batch) !!}</td>
                                <td class="tex-center">
                                    <a href="publications/{{ $publication->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($publication,['method'=>'DELETE','url' => '/publications/'.$publication->id,'style'=>'display:inline']) !!}
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
