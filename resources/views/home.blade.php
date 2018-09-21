@extends('layouts.app.app',['page_header'=>'Dashboard'])

@section('css')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-3">
            <div class="container-fluid">
            <h2>Records</h2>
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-speedometer"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Daily Records</span>
                    <span class="info-box-number">{{ $daily }}</span>
                </div>
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-social-bitcoin"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Weekly Records</span>
                    <span class="info-box-number">{{ $weekly }}</span>
                </div>
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-calculator"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Monthly Records</span>
                    <span class="info-box-number">{{ $monthly }}</span>
                </div>
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-calculator"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ongoing Batch</span>
                    @foreach($log_sheets as $log_sheet)
                        <span class="info-box-number">{{ $log_sheet->batch_id }}</span>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container-fluid">
            <h2>My Events</h2>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#calendar">Calendar</a></li>
                <li><a href="#list">List View</a></li>
            </ul>

            <div class="tab-content">
                <div id="calendar" class="tab-pane fade in active">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            {!! $calendar->calendar() !!}
                        </div>
                    </div>
                </div>
                <div id="list" class="tab-pane fade">
                    <div class="container-fluid" style="margin: 20px;">
                        <form class="form-inline">
                            <input type="text" class="form-control" name="title" />
                            <input type="datetime-local" class="form-control" name="sdate" />
                            <input type="datetime-local" class="form-control" name="edate" />
                            <input type="submit" value="Add" class="btn btn-primary" />
                        </form>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th class="text-center">End Date</th>
                            <th class="text-center">Description</th>
                            <th>Command</th>
                        </tr>
                        @foreach($events as $count => $event)
                            <tr>
                                <td>{{ $count + 1 }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->description }}</td>
                                <td><a href="agent/events/delete">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">

        </div>
    </div>

@endsection


@push('scripts')
    <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
    </script>

    {!! $calendar->script() !!}



@endpush('scripts')
