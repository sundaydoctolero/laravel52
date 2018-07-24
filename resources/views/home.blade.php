@extends('layouts.app.app',['page_header'=>'Dashboard'])

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Daily Records</span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Weekly Records</span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Monthly Records</span>
                    <span class="info-box-number">90<small>%</small></span>
                </div>
            </div>
        </div>

    </div>
@endsection

