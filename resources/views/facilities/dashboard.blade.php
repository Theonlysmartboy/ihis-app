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
                            <a href="{{ route('patients',$facility_name) }}">
                                <div class="card">
                                    <div class="card-body bg-warning text-center">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer text-center">
                                        Patient List
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('patient.search',$facility_name) }}">
                                <div class="card">
                                    <div class="card-body bg-primary text-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer text-center">
                                        Patient Search
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <div class="card">
                                    <div class="card-body bg-success">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-footer">
                                        
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