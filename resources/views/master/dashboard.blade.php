@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('zones') }}">
                                <div class="card">
                                    <div class="card-body bg-warning text-center">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer text-center">
                                        Zones
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('facilities') }}">
                                <div class="card">
                                    <div class="card-body bg-primary text-center">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer text-center">
                                        Health Facilities
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admins') }}">
                                <div class="card">
                                    <div class="card-body bg-success text-center">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer text-center">
                                        Users
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection