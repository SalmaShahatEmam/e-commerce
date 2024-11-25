@extends('dashboard.layouts-auth.app')

@section('title', 'login')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="" class="brand-logo">
                                    <img src="#" width="200px" alt="">
                                </a>

                                <form class="auth-login-form mt-2" id="authForm" action="{{ route('admin.login.post') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">{{'email' }}</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="john@example.com" aria-describedby="email" tabindex="1"
                                            autofocus />

                                        @error('email')
                                        <div class="error">{{ $message }}</div>

                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">{{ 'password'}}</label>
                                           
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="password"
                                                name="password" tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <div class="error">{{ $message }}</div>

                                        @enderror
                                    </div>
                                 
                                    <button class="btn btn-primary btn-block"
                                        tabindex="4">{{ 'login' }}</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/assets/js/custom/validation/authForm.js') }}"></script>
    @endpush

@endsection
