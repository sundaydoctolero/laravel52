@extends('layouts.admin.admin',['page_header' => 'Reports'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="background-color: lightblue">
                        {!! Form::open(['url' => '/newspaper_reports/monitoring','class' => 'form-inline', 'method' => 'GET']) !!}
                        <div class="form-group">
                            <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Export To Excel</a></h3>
                        </div>
                        <div class="pull-right">
                            <div class="form-group">
                                {!! Form::label('issue', 'Issue :') !!}
                                {!! Form::select('issue',\App\Publication::groupBy('issue')->lists('issue','issue'),null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_from', 'Date From :') !!}
                                {!! Form::date('date_from',\Carbon\Carbon::now()->startOfMonth(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('date_to', 'To :') !!}
                                {!! Form::date('date_to',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Filter User',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body" style="background-color: #494949">
                        @foreach($publications as $publication)
                            <div class="row" style="background-color: #494949;border:solid 2px #f4f4f4;margin:0;padding:0;color:white" >
                                <div class="col-md-3">
                                    <small class="label label-success">({{ $publication->issue }})</small>
                                    <br>
                                    <h5>
                                        @foreach($publication->states as $state)
                                            {{ $state->state_code }}
                                        @endforeach
                                    </h5>
                                    <h4>{{ $publication->publication_name}}</h4>
                                </div>
                                @foreach($publication->downloads as $download)
                                    <div class="col-md-1" style="background-color: {{ $download->output->count() > 0 ? '#5cb85c' : '#494949' }};color: {{ $download->output->count() > 0 ? 'white' : 'white' }};padding:0px">
                                        <table class="table" style="border:1px solid #f4f4f4;margin:0">
                                            <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">{{ $download->publication_date }}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Sale</th>
                                                <th class="text-center">Rent</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($download->output as $out)
                                                    <tr>
                                                        <td class="text-center">{{ $out->sale_records }}</td>
                                                        <td class="text-center">{{ $out->rent_records }}</td>
                                                        <td class="text-center">{{ $out->total_records }}</td>
                                                    </tr>
                                            @endforeach
                                                    <tr>
                                                        <td colspan="3" class="text-center">{{ $download->status.' - '.$download->remarks }}</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
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