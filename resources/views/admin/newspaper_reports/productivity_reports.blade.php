@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="background-color: lightblue">
                        {!! Form::open(['url' => '/newspaper_reports/productivity','class' => 'form-inline', 'method' => 'GET']) !!}
                        <div class="form-group">
                            <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Export To Excel</a></h3>
                        </div>
                        <div class="pull-right">
                            <div class="form-group">
                                {!! Form::label('user_id', 'User :') !!}
                                {!! Form::select('user_id',\App\User::lists('operator_no','id'),null,['class'=>'form-control','placeholder'=>'--']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('productivity', 'Productivity :') !!}
                                {!! Form::select('productivity',['Download'=>'Download','Data Entry'=>'Data Entry'],null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_from', 'Date From :') !!}
                                {!! Form::date('date_from',\Carbon\Carbon::yesterday(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_to', 'To :') !!}
                                {!! Form::date('date_to',\Carbon\Carbon::yesterday(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Filter User',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body">
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            @if(request('productivity') == 'Download')
                            <tr>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">#</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Downloader</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Name</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Pages</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Status</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Download Date</th>
                            </tr>
                            @else
                            <tr>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">#</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Operator</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Name</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Status</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Sale</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Rent</th>
                            </tr>
                            @endif
                            </thead>
                            <tbody>
                                @if(request('productivity') == 'Download')
                                    @foreach($downloads as $count => $download)
                                        <tr>
                                            <td class="text-center">{{ $count++ + 1 }}</td>
                                            <td class="text-center">
                                                {{ $download->user->operator_no ? $download->user->operator_no : ''  }}
                                            </td>
                                            <td>{{ $download->publication->publication_name }}</td>
                                            <td class="text-center">{{ $download->publication_date }}</td>
                                            <td class="text-center">{{ $download->pages }}</td>
                                            <td class="text-center">{{ $download->status }}</td>
                                            <td class="text-center">{{ $download->time_downloaded }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>


                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection


@push('scripts')
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        "order": [[ 6, "asc" ]],
        "pageLength": 50,
    } );
</script>
@endpush