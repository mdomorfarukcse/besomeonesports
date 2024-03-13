<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template" />
    <meta name="keywords"
        content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss" />
    <meta name="author" content="Themesbox" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <title>{{ config('app.name') }} || {{ __('REGISTER') }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <!-- Start css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    {{-- custom css --}}
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <style>
        label.custom-control-label {
            text-align: initial;
        }
        p{
            color: #fff;
        }
        .card {
            background-color: #000000 !important;
            opacity: 0.9 !important;
        }
    </style>
    <!-- End css -->
</head>

<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-8 col-lg-7">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-head">
                                            <a href="/" class="logo">
                                                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid"
                                                    alt="logo" />
                                            </a>
                                        </div>
                                        <p class="mt-3">Welcome to <b>Be Someone Sports</b>. We are excited to have you register your player and join our youth sports family.</p>
                                        <p>To get started, please create an account below and proceed to the registration process.</p>
                                        {{-- <h4 class="text-primary my-4"><b>{{ __('REGISTER') }}</b></h4> --}}

                                        <div class="form-group">
                                            {{-- <select name="role"
                                                class="form-control @error('role') is-invalid @enderror" required>
                                                <option value="" selected disabled>Select Role</option>
                                                <option value="user">User</option>
                                                <option value="guardian">Guardian</option>
                                                <option value="player">Player</option>
                                            </select>

                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                            <h5 class="text-white border border-light p-1">Guardian Account Information</h5>
                                            <input type="hidden" name="role" value="guardian">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" value="{{ old('first_name') }}" name="first_name"
                                                        autocomplete="off" autofocus
                                                        class="form-control @error('first_name') is-invalid @enderror"
                                                        placeholder="{{ __('First Name*') }}" tabindex="0" required>

                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{ old('last_name') }}" name="last_name"
                                                        autocomplete="off" autofocus
                                                        class="form-control @error('last_name') is-invalid @enderror"
                                                        placeholder="{{ __('Last Name*') }}" tabindex="0" required>

                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" value="{{ old('email') }}" name="email" required
                                                autocomplete="off" autofocus tabindex="0"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="{{ __('Email*') }}">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" value="{{ old('password') }}" name="password"
                                                required autocomplete="off" tabindex="0"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="{{ __('Password*') }}">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" value="{{ old('password_confirmation') }}"
                                                name="password_confirmation" required autocomplete="off" tabindex="0"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="{{ __('Re-Type Password*') }}">

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div
                                                        class="custom-control custom-checkbox float-left d-inline-block">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="agree" name="agree" required>
                                                        <label class="custom-control-label text-black text-bold"
                                                            for="agree">
                                                            <p> I agree to <a href="/privacy"
                                                                    target="_blank" class="ml-1 text-bold">Privacy
                                                                    Policy</a></p>
                                                            <p> I agree to <a href="/term"
                                                                    target="_blank" 
                                                                    class="ml-1 text-bold">Term Of Service</a></p>
                                                            <p> I agree to <a href="javascript:void(0);"
                                                                    data-toggle="modal"
                                                                    data-target="#termsAndConditionModal"
                                                                    class="ml-1 text-bold">Sportsmanship Promise</a></p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="/" class="btn btn-dark btn-lg btn-block font-18"><b>Back Home</b></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18"><b>{{ __('REGISTER') }}</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <p class="mb-0 mt-3">{{ __('Already have a account?') }}
                                        <a href="{{ route('login') }}">
                                            <b>{{ __('LOGIN') }}</b>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- End js -->





    {{-- Terms & Condition Modal Starts --}}
    <div class="modal fade" id="termsAndConditionModal" tabindex="-1" role="dialog"
        aria-labelledby="termsAndConditionModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark border-0">
                    <h6 class="text-white">Sports Etiquette of {{ config('app.name') }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Welcome to Be Someone Sports!</h4>
                    <p>Be Someone Sports, we are committed to providing a safe and positive online environment for kids
                        who are passionate about sports. We take your privacy seriously and want to assure you of the
                        following:</p>
                    <p>1. **Privacy Protection:** We do not share your personal information with third parties without
                        your consent. Your data is handled securely and in accordance with our Privacy Policy.</p>
                    <p>2. **Zero Tolerance for Negative Activities:** Be Someone Sports strictly prohibits any form of
                        negative behavior, bullying, or harmful activities. We maintain a positive and respectful
                        community where sportsmanship and teamwork are valued.</p>
                    <p>3. **User Responsibility:** By signing up and using Be Someone Sports, users agree to abide by
                        our Terms of Use and Privacy Policy. It's important to understand and follow these guidelines to
                        ensure a safe and enjoyable sports league experience.</p>
                    <p>We are here to create a space where young athletes can learn, compete, and have fun while staying
                        safe. If you ever come across any concerns or issues, please don't hesitate to reach out to our
                        support team.</p>
                    <p>Thank you for being a part of Be Someone Sports. Together, we can promote sportsmanship and
                        teamwork in the digital world!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                        OKAY
                        <i class="fa fa-check ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Terms & Condition Modal Ends --}}
</body>

</html>
