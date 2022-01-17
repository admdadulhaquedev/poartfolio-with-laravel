@extends('layouts.backend.app')

@section('content')

<!-- Content -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="login-wrapper d-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="loginbox">
                            <div class="login-right" style="width: 100%;padding-left:130px;padding-right:130px">
                                <div class="login-right-wrap">
                                    <h1>Register</h1>
                                    <p class="account-subtitle">Access to our dashboard</p>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('email') }}" placeholder="Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text"  placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-0">
                                            <button class="btn btn-primary btn-block" type="submit">Register</button>
                                        </div>
                                    </form>

                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">xx</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

@endsection
