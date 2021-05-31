@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($huduma_no) }}
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
                            <th>Date</th>
                            <th>Facility</th>
                            <th>Diagnosis</th>
                            <th>Prescription</th>
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