@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Level 5 Facilities') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo $level5_facility_design; ?>
                    </div>
                </div>
                <div class="text-center">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Level 4 Facilities') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo $level4_facility_design; ?>
                    </div>
                </div>
                <div class="text-center">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Level 3 Facilities') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo $level3_facility_design; ?>
                    </div>
                </div>
                <div class="text-center">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Level 2 Facilities') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo $level2_facility_design; ?>
                    </div>
                </div>
                <div class="text-center">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Level 1 Facilities') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo $level1_facility_design; ?>
                    </div>
                </div>
                <div class="text-center">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
