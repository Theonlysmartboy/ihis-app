@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Health Facility') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('facility.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="zone" class="form-label">Zone</label>
                                <select name="zone" id="zone" class="form-control">
                                    <?php echo $zone_dropdown; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="form-label">Contact Person</label>
                                <select name="contact" id="contact" class="form-control">
                                    <?php echo $user_dropdown; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">Select Level</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="Refferal">Refferal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descr" class="form-label">Description</label>
                                <input type="text" name="descr" id="descr" class="form-control" />
                            </div>
                            <input type="submit" value="Save" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
