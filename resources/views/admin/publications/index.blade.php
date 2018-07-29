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
                            <th>Publication Type</th>
                            <th>Number of Batch</th>
                            <th>Action</th>



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
                                <td>{{ $publication->publication_type }}</td>
                                <td>{{ $publication->default_batch }}</td>

                                <td>
                                    <a href="publications/{{ $publication->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($publication,['method'=>'DELETE','url' => '/publications/'.$publication->id,'style'=>'display:inline']) !!}
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
