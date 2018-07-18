@extends('layouts.app.app')


@section('main-content')
    <h1>Property</h1>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="checkbox">
                <label>
                    <input name="db_name" type="checkbox" value="1">
                    Air Conditioned
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1">
                    Swimming Pool
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1">
                    Ducted Heating
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1">
                    Ducted Vacuum
                </label>
            </div>
        </div>
    </div>

@endsection