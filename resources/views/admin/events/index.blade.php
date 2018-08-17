@extends('layouts.admin.admin',['page_header' => 'Events', 'logo' => 'fa fa-calendar-check-o'])

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $calendar->script() !!}

@endpush
