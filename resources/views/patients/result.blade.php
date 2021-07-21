@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('facility.dashboard', $facility_name) }}" class="btn btn-success btn-xs">Back</a>
                <a href="{{ route('patient.search', $facility_name) }}" class="btn btn-success btn-xs">Search</a>
                <a href="{{ route('patient.add', $facility_name) }}" class="btn btn-danger btn-xs">Diagnose</a>
                <div class="card">
                    <div class="card-header">{{ __($huduma_no) }}
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
                                    <th>Date</th>
                                    <th>Facility</th>
                                    <th>Diagnosis</th>
                                    <th>Prescription</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $result_design; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
