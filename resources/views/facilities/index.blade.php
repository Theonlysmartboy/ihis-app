@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('master.dashboard') }}" class="btn btn-success btn-xs">Back</a>
                <div class="card">
                    <div class="card-header">{{ __('Health Facilities') }}
                        <a href="{{ route('facility.add') }}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>
                            New </a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Zone</th>
                                    <th>Level</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $facility_design; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
