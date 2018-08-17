@extends('layouts.admin.admin',['page_header' => 'Quality Control Reports', 'logo'=>'fa fa-check-square'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="background-color: lightblue">
                    {!! Form::open(['url' => '/newspaper_reports/quality_control','class' => 'form-inline', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <h3 class="box-title"><a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Export To Excel</a></h3>
                    </div>
                    <div class="pull-right">
                        <div class="form-group">
                            {!! Form::label('issue', 'Issue :') !!}
                            {!! Form::select('pub_group',['Monday'=>'Monday',
                            'Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thursday'=>'Thursday','Friday'=>'Friday',
                            'Saturday'=>'Saturday','Sunday'=>'Sunday','Comm'=>'Comm','Tier 1'=>'Tier 1','Chinese'=>'Chinese',
                            'Hard Copy'=>'Hard Copy','Gum Tree'=>'Gum Tree','Monthly'=>'Monthly','Email'=>'Email','Bi-Weekly'=>'Bi-Weekly',
                            'NZ'=>'NZ'],null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_from', 'Date From :') !!}
                            {!! Form::date('date_from',\Carbon\Carbon::now()->startOfMonth(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_to', 'To :') !!}
                            {!! Form::date('date_to',\Carbon\Carbon::now()->endOfMonth(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Filter User',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="box-body" style="background-color: #494949">
                    <table class="table table-bordered" style="color:white;border:2px solid" >
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">State</th>
                                <th rowspan="2">Publication Name</th>
                                <th colspan="4" class="text-center">1st Week</th>
                                <th colspan="4" class="text-center">2nd Week</th>
                                <th colspan="4" class="text-center">3rd Week</th>
                                <th colspan="4" class="text-center">4th Week</th>
                            </tr>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        @foreach($publications as $count => $publication)
                            @if($publication->states->count() == 1)
                                <tr>
                                    <td>{{ $count + 1 }}</td>
                                    <td class="text-center">{{ $publication->states->first()->state_code }}</td>
                                    <td>{{ ucwords($publication->publication_name) }}&nbsp;&nbsp;<small class="label label-success pull-right" >[{{ $publication->issue }}</small></td>
                                    @foreach($publication->downloads as $count => $download)
                                        @foreach($download->output as $out)
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $download->publication_date }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $out->sequence_from }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $out->sequence_to }}</td>
                                            <td class="text-center" style="background-color:#5cb85c;color:white">{{ $out->total_records }}</td>
                                        @endforeach
                                    @endforeach
                                </tr>
                            @else
                                @if($publication->output)
                                    @foreach($publication->download->output as $rowspan => $out)
                                        @if($rowspan == 0)
                                            <tr>
                                                <td rowspan="{{ $publication->output->count() }}">{{ $count + 1 }}</td>
                                                <td rowspan="{{ $publication->output->count() }}">{{ $publication->publication_name }}</td>
                                                <td></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ $count + 1 }}</td>
                                        <td></td>
                                        <td>{{ ucwords($publication->publication_name) }}&nbsp;&nbsp;<small class="label label-success pull-right" >[{{ $publication->issue }}</small></td>
                                        @foreach($publication->downloads as $down)
                                            <td>{{ $down->publication_date }}</td>
                                            <td colspan="3">{{ $down->status  }}</td>
                                        @endforeach
                                    </tr>
                                @endif
                            @endif
                        @endforeach
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