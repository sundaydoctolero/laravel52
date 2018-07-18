@extends('layouts.admin.admin',['page_header' => 'Add Download'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/downloads/create']) !!}

                        @include('admin.downloads.form',['buttonlabel' => 'Add Download'])
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
            $('#hide-form').hide();
        });
    </script>
@endpush
