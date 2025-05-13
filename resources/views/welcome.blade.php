@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <h4 class="border-bottom pb-3 mb-3">1. {{ __('Documents XVIII and XX') }}.</h4>

                        <div class="row mb-3">

                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card h-100">
                                    <div class="card-header">{{ __('Annex') }} XVIII</div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">{{ __('Application for Social Service') }}</h6>
                                        <a href="{{ route('solicitud.create') }}" class="btn btn-primary w-100">{{ __('Fill') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">{{ __('Annex') }} XX</div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">{{ __('Letter of commitment to social service') }}</h6>
                                        <a href="{{ route('compromiso.create') }}" class="btn btn-primary w-100">{{ __('Fill') }}</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h4 class="border-bottom pb-3 mb-3">2. {{ __('Work plan') }}.</h4>

                        <div class="card h-100">
                            <div class="card-header">F-08-04</div>
                            <div class="card-body">
                                <h6 class="card-title mb-3">F-08-04 {{ __('Work plan') }}</h6>
                                <a href="{{ route('plan.trabajo.create') }}" class="btn btn-primary w-100">{{ __('Fill') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
