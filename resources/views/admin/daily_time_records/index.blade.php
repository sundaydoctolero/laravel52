@extends('layouts.admin.admin',['page_header' => 'Daily Time Record', 'logo' =>'fa fa-building'])


@section('css')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <form class="form-inline" enctype='multipart/form-data' method="POST">
                            {{ csrf_field() }}
                            <label class="btn btn-primary btn-file">
                                Browse ... <input type="file" name="dtr_file" style="display: none;">
                            </label>
                            <input type="submit" value="Upload" />
                        </form>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Operator No</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Code</th>
                            <th>Device Id</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dtrs as $dtr)
                                <tr>
                                    <td>{{ $dtr->operator_no }}</td>
                                    <td>{{ $dtr->dtr_date }}</td>
                                    <td>{{ $dtr->dtr_time }}</td>
                                    <td>{{ $dtr->dtr_code == 1 ? 'In' : "Out" }}</td>
                                    <td>{{ $dtr->device_id == 1 ? 'Main Door' : 'Back Door' }}</td>
                                    <td>{{ $dtr->remarks }}</td>
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