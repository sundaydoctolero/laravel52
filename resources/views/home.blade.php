@extends('layouts.app.app',['page_header'=>'Dashboard'])

@section('main-content')
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-speedometer"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Daily Records</span>
                    <span class="info-box-number">{{ $daily }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-social-bitcoin"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Weekly Records</span>
                    <span class="info-box-number">{{ $weekly }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-calculator"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Monthly Records</span>
                    <span class="info-box-number">{{ $monthly }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

