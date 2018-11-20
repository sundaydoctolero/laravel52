@extends('layouts.admin.admin',['page_header' => 'Not Updated / No Records Report', 'logo' => 'fa fa-newspaper-o'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="background-color: lightblue">
                        {!! Form::open(['url' => '/newspaper_reports/not_updated_reports','class' => 'form-inline', 'method' => 'GET']) !!}

                        <div class="pull-right">
                            <div class="form-group">
                                {!! Form::label('date', 'Date') !!}
                                {!! Form::date('date_added', \Carbon\Carbon::now()) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('View Report',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body">
                            @if($downloads->count() > 0)
                                <form action="/newspaper_reports/not_updated_reports/email">
                                    <input type="hidden" name="date_added" value="{{ request()->get('date_added') }}" />
                                    <input type="submit" class="btn btn-success" value="Send To Email" />
                                </form>
                            @endif
                            <br><br>
                        <table id="results_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">ID</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Name</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Publication Date</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Status</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Remarks</th>
                                <th class="text-center" style="background-color:#5e5d5d;color:white">Downloader</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloads as $download)
                                <tr>
                                    <td class="text-center">{{ $download->id }}</td>
                                    <td class="text-left">{{ $download->publication->publication_name }}</td>
                                    <td class="text-center">{{ $download->publication_date }}</td>
                                    <td class="text-center">{{ $download->status }}</td>
                                    <td class="text-center">{{ $download->remarks }}</td>
                                    <td>{{ $download->checked_by == 0 ? '' : $download->operator->operator_no }}</td>
                                </tr>
                            @endforeach
                            @if($records)
                                @foreach($records as $count => $no_re)
                                    @if($no_re->download->publication->publication_type == 'Inactive')

                                    @elseif($no_re->download->publication->publication_type == 'Overlap')

                                    @else
                                        <tr>
                                            <td>{{ $count++ + 1 }}</td>
                                            <td>{{ $no_re->state.' - '.$no_re->download->publication->publication_name }}</td>
                                            <td align="center">{{ $no_re->download->publication_date }}</td>
                                            <td>{{ $no_re->download->status }}</td>
                                            <td>{{ $no_re->download->remarks }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
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
