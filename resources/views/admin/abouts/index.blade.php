@extends('layouts.admin.admin',['page_header' => 'Abouts'])

@section('main-content')
    <div class = "row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><a href= "/abouts/create"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Add New Record</button></a></h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Site name</th>
                            <th>Company Name</th>
                            <th>Theme</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Created Since</th>

                            <th>Action</th>
                        </tr>
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
                        </tbody></table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

