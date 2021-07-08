@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('master.dashboard') }}" class="btn btn-success btn-xs">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Zones') }}
                    <a href="{{ route('zone.add') }}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    {{ __('Add new') }}</a>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($zones as $zone )
                            <tr>
                                <td>{{ $zone->id }}</td>
                                <td>{{ $zone->name }}</td>
                                <td>{{ $zone->description }}</td>
                                <td>
                                    <button class="btn btn-warning btn-xs">Edit</button>
                                    <button class="btn btn-danger btn-xs">Delete</button>
                                </td>
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