@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-mars"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Male</span>
                    <span class="info-box-number">{{ count($male) }} Contacts</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ count($male) }}%"></div>
                    </div>
                    <span class="progress-description">
                </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-venus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Female</span>
                    <span class="info-box-number">{{ count($female) }} Contacts</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ count($female) }}%"></div>
                    </div>
                    <span class="progress-description">
                </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-globe-asia"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lebanon</span>
                    <span class="info-box-number"> {{ count($lebanon) }} Contacts</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ count($lebanon) }}%"></div>
                    </div>
                    <span class="progress-description">
                </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="far fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Created Today</span>
                    <span class="info-box-number">{{ count($created_today) }} Contacts</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ count($created_today) }}%"></div>
                    </div>
                    <span class="progress-description">
                </span>
                </div>
            </div>
        </div>
    </div>
@stop
