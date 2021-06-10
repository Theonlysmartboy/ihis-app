@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patient search form') }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('patient.search',$facility_name) }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Huduma Number</label>
                        <input type="text" name="id" id="id" required class="form-control"/>
                    </div>
                    <input type="submit" value="Search" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection