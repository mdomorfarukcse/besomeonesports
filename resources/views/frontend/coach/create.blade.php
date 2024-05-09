@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Coach'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
     <!-- Select2 css -->
     <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        /* Image Upload */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #ffffff;
            border: 1px solid;
            border-color: #a1a1a1;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #d8d8d8;
            border-color: #a1a1a1;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 5px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .list-group-item:hover {
            cursor: pointer !important;
        }

        .list-group-item label:hover {
            cursor: pointer !important;
        }

        .list-group-item input:hover {
            cursor: pointer !important;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Coach') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Become a Coach') }}</li>
@endsection

@section('content')

    <section class="float-start w-100">
        <div class="mediasection d-inline-block w-100">
            <div class="container">
                <div class="mindle-heading text-center">
                    <h5>Coach Request</h5>
                    <h1>Want to be a <span> Coach? </span></h1>
                </div>
                <div class="row  justify-content-center mt-2 mb-5">
                    <div class="col-md-8">
                        <div class="contact-use-div">
                            <p class="mb-3 mt-3">Becoming a coach for Be Someone Sports is a rewarding journey filled with opportunities to inspire
                                and shape young athletes both on and off the field. As a coach, you'll have the chance to impart
                                valuable life lessons, instill discipline, and foster teamwork among your players. Whether it's
                                volleyball, basketball, or flag football, you'll play a pivotal role in helping children develop
                                their skills, confidence, and passion for the game. It's not just about teaching the fundamentals;
                                it's about being a mentor, a role model, and a source of encouragement. By dedicating your time and
                                expertise to coaching, you'll make a lasting impact on the lives of the next generation of athletes.
                            </p>
                            <form action="{{ route('frontend.coach.store') }}" method="post" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <div class="row mt-4">
                                    {{-- <div class="col-md-12">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" id="coachAvatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                                <label for="coachAvatar"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="first_name" class="text-capitalize">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                class="form-control" placeholder="First Name *" required />
                                            @error('first_name')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="last_name" class="text-capitalize">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control" placeholder="Last Name *" required />
                                            @error('last_name')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="email" class="text-capitalize">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="Email*" required />
                                            @error('email')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="from-group">
                                            <label for="password" class="text-capitalize">Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" value="87654321"
                                                class="form-control" placeholder="Password *" />
                                            @error('password')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="from-group">
                                            <label for="birthdate" class="text-capitalize">Birthday <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="birthdate" value="1990-01-01"
                                                class="form-control" placeholder="Birthdate *" />
                                            @error('birthdate')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="phone_number" class="text-capitalize">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}"
                                                class="form-control" placeholder="+1 (123) 456 -7890" required />
                                            @error('phone_number')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-none">
                                        <div class="from-group">
                                            <label for="street_address" class="text-capitalize">Street Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="street_address" value="NA"
                                                class="form-control" placeholder="Street Address *" />
                                            @error('street_address')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <label for="state" class="text-capitalize">State <span
                                                class="text-danger">*</span></label>
                                        <div class="from-group">
                                            <input type="text" name="state" value="NA"
                                                class="form-control" placeholder="State *" />
                                            @error('state')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="from-group">
                                            <label for="city" class="text-capitalize">city <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="city" value="NA"
                                                class="form-control" placeholder="City *" />
                                            @error('city')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="from-group">
                                            <label for="postal_code" class="text-capitalize">Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="postal_code" value="N/A"
                                                class="form-control" placeholder="Zip Code *" />
                                            @error('postal_code')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="sport_of_interests[]" class="text-capitalize">Fields Of Interest
                                                <span class="text-danger">*</span></label>
                                            <br>
                                            <ul class="list-group d-inline-block">
                                                <li class="list-group-item d-inline-block border-1">
                                                    <input class="form-check-input me-1" type="checkbox"
                                                        value="Basketball" name="sport_of_interests[]" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1">Basketball</label>
                                                </li>
                                                <li class="list-group-item d-inline-block border-1">
                                                    <input class="form-check-input me-1" type="checkbox"
                                                        value="Flag Football" name="sport_of_interests[]" id="checkbox2">
                                                    <label class="form-check-label" for="checkbox2">Flag Football</label>
                                                </li>
                                                <li class="list-group-item d-inline-block border-1">
                                                    <input class="form-check-input me-1" type="checkbox"
                                                        value="Volleyball" name="sport_of_interests[]" id="checkbox3">
                                                    <label class="form-check-label" for="checkbox3">Volleyball</label>
                                                </li>
                                            </ul>
                                            @error('sport_of_interests[]')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="grade_of_interests" class="text-capitalize">Grade Of Interest
                                                <span class="text-danger">*</span></label>
                                            <br>
                                            <select name="grade_of_interests[]" class="select2-multi-select form-control" multiple="multiple">
                                                <option value="">Select a Grade</option>
                                                <option value="Girls K-8">Girls K-8</option>
                                                <option value="Boys K-8">Boys K-8</option>
                                            </select>
                                            @error('grade_of_interests')
                                                <b class="text-danger"><i
                                                        class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" name="submit"
                                            class="btn btn-dark btn-lg float-end">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        $(document).ready(function(){
            $('#grade_gender').change(function(){
                var grade = $(this).val();
                $.ajax({
                    url: '{{ route("frontend.coach.get-divisions") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        gender: grade
                    },
                    success: function(data){
                        $('#grade').html('');
                        $.each(data, function(index, division){
                            $('#grade').append('<option value="'+division.id+'">'+division.name+'</option>');
                        });
                        $('#grade').show();
                    }
                });
            });
        });
    </script>
    <script>
        // File Uploder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#coachAvatar").change(function() {
            readURL(this);
        });
    </script>
@endsection
