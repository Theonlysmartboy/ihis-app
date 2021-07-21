@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('facility.dashboard',$facility_name) }}" class="btn btn-success btn-xs">Back</a>
            <a href="{{ route('patient.search',$facility_name) }}" class="btn btn-success btn-xs">Search</a>
            <a href="{{ route('patient.add',$facility_name) }}" class="btn btn-danger btn-xs">Diagnose</a>    
            <div class="card">
                <div class="card-header">{{ __('Patient data') }}
                    <a href="{{ route('patient.add',$facility_name) }}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    New </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-stripped" id="table">
                        <thead>
                            <th>#</th>
                            <th>Huduma no</th>
                            <th>Zone</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient )
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->huduma_no }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection