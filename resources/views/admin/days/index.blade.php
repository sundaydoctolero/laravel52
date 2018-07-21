@extends('layouts.admin.admin',['page_header' => 'Days', 'logo' => 'fa fa-users'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/days/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add Day</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Day Name</th>
                            <th>Day Code</th>
                            <th>Created Since</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $day)
                            <tr>
                                <td>{{ $day->id }}</td>
                                <td>{{ $day->day_name }}</td>
                                <td>{{ $day->day_code }}</td>
                                <td>{{ $day->created_at->diffforHumans() }}</td>
                                <td>
                                    <a href="days/{{ $day->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>

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
