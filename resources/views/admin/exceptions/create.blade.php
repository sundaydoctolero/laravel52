@extends('layouts.admin.admin',['page_header' => 'Add Exception'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/exceptions/create']) !!}
                            @include('admin.exceptions.form',['buttonlabel' => 'Add Exception'])
                        {!! Form::close() !!}
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
            $('.hide-form').hide();
        });
    </script>
@endpush
