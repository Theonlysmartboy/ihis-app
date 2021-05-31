@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Health Facilities') }}
                    <a href="{{ route('facility.add') }}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
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
                            <th>Name</th>
                            <th>Zone</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php echo $facility_design;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection