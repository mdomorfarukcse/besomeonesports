<div class="modal fade login-div-modal" id="lostpsModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="get">
                    <div class="com-div-md">
                        <h5 class="text-center mb-3">Forget Your Password?</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="login-modal-pn">
                            <p>We'll email you a link to reset your password</p>
                            <div class="cm-select-login mt-3">
                                <div class="phone-div">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                                </div>
                            </div>

                            <button type="submit" class="btn continue-bn">Send Me a password reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade login-div-modal" id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div id="login-td-div" class="com-div-md">
                        <h5 class="text-center mb-3">Login</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span>×</span>
                        </button>
                        <div class="login-modal-pn">
                            <div class="cm-select-login mt-3">
                                <div class="country-dp">
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="phone-div">
                                    <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" required/>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn continue-bn"><i class="fas fa-lock"></i> SIGN IN</button>
                        </div>

                        <p class="text-center mt-3">
                            <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#lostpsModal" data-bs-dismiss="modal"> Lost Password ? </a>
                        </p>

                        <p class="text-center mt-3">Do not have an account? <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#memberModal" data-bs-dismiss="modal"> Register </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade login-div-modal" id="memberModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" method="get">
                    <div class="com-div-md">
                        <h5 class="text-center mb-3">Become A Member</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        <div class="login-modal-pn">
                            <div class="cm-select-login mt-0">
                                <div class="country-dp">
                                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" required />
                                </div>
                                <div class="phone-div">
                                    <input type="email" name="phone" class="form-control" placeholder="Email or Phone Number" required />
                                </div>
                                <div class="phone-div">
                                    <input type="password" name="password" class="form-control" placeholder="Create Password" required />
                                </div>
                                <div class="phone-div">
                                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required />
                                </div>

                                <div class="forget2 mt-3 ml-3 d-flex justify-content-between">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1"> By clicking Register, you agree to our Terms of Use and Cookie Policy</label>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn continue-bn">Register</button>
                        </div>

                        <p class="text-center mt-3">Do not have an account? <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal" data-bs-dismiss="modal"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
