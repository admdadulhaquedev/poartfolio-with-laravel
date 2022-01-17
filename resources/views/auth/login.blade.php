
    @extends('layouts.backend.authapp')

    @section('auth_content')

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/img/logo-white.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        {{-- <span class="fas fa-eye toggle-password"></span> --}}
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>


                            <div class="text-center forgotpass">
                                @if (Route::has('password.request'))
                                    <a class="forgot-link" href="{{ route('password.request') }}">
                                        Forgot Password ?
                                    </a>
                                @endif
                            </div>
                            {{-- <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <div class="social-login">
                                <span>Login with</span>
                                <a href="#" class="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#"  class="google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </div> --}}

                            {{-- <div class="text-center dont-have">
                                    Don’t have an account
                                <a href="{{ route('register') }}">Register</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
