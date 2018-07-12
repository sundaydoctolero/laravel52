@extends('layouts.admin.admin',['page_header' => 'Abouts'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/abouts/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Site name</th>
                            <th>Company Name</th>
                            <th>Theme</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Created Since</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abouts as $about)
                            <tr>

                                <td>{{ $about -> id }}</td>
                                <td>{{ $about -> site_name }}</td>
                                <td>{{$about -> company_name}}</td>
                                <td>{{$about -> theme}}</td>
                                <td>{{$about -> website}}</td>
                                <td><img height="60px" src ={{asset('images/userprofile/'.$about -> logo)}}></td>
                                <td>{{$about -> created_at->diffforHumans() }}</td>


                                <td>

                                    <a href= "/abouts/{{$about->id}}/edit">  <button type="button" class="btn btn-primary btn-sm"><i class = "fa fa-edit"></i> Modify</button></a>
                                    <a href= "/abouts/{{$about->id}}/delete"><button type="button" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i> Delete</button></a>
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

