@extends('layouts.backend.app')

@section("breadcrumb")
<div class="col-sm-12">
    <h3 class="page-title">General Settings</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('settings.index') }}">Settings</a>
        </li>
        <li class="breadcrumb-item active">General Settings</li>
    </ul>
</div>
@endsection

@section('content')

<!-- content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Tab Menu -->
        <nav class="user-tabs mb-4 custom-tab-scroll">
            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                <li>
                    <a class="nav-link active" href="#generalsettings" data-toggle="tab">General Settings</a>
                </li>

                <li>
                    <a class="nav-link" href="#sociallogin" data-toggle="tab">Social Login</a>
                </li>
            </ul>
        </nav>
        <!-- /Tab Menu -->

        <!-- Tab Content -->
        <div class="tab-content">

            <!-- General -->
            <div role="tabpanel" id="generalsettings" class="tab-pane fade show active">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        @yield("breadcrumb")
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.update') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" class="form-control" name="WebsiteName"
                                            value="{{ $settings->website_name }}">
                                    </div>

                                    <div class="row">

                                        <div class="col-md-7">
                                            <div class="form-group mb-0">
                                                <label>Favicon</label>
                                                <input name="Favicon" class="form-control" type="file"
                                                    onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">

                                                <small class="text-secondary">
                                                    Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b>
                                                </small>
                                                    <br>
                                                <small class="text-secondary">
                                                    Accepted formats : only png and ico
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="favicon" class="favico" src="{{asset('uploads/settings')}}/{{ $settings->favicon }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Website Header Logo</label>
                                                <input name="HeaderLogo" class="form-control" type="file"
                                                    onchange="document.getElementById('header_logo').src = window.URL.createObjectURL(this.files[0])">

                                                <small class="text-secondary">
                                                    Recommended image size is <b>150px x
                                                        150px</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="header_logo" class="logo"
                                                                src="{{asset('uploads/settings')}}/{{ $settings->header_logo }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Website Header Stick Logo</label>
                                                <input name="StickyLogo" class="form-control" type="file"
                                                    onchange="document.getElementById('stick_logo').src = window.URL.createObjectURL(this.files[0])">
                                                <small class="text-secondary">
                                                    Recommended image size is <b>150px x
                                                        150px</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="stick_logo" class="logo"
                                                                src="{{asset('uploads/settings')}}/{{ $settings->sticky_logo }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Website Mobile Logo</label>
                                                <input name="MobileLogo" class="form-control" type="file"
                                                    onchange="document.getElementById('mobile_logo').src = window.URL.createObjectURL(this.files[0])">
                                                <small class="text-secondary">
                                                    Recommended image size is <b>150px x
                                                        150px</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="mobile_logo" class="logo"
                                                                src="{{asset('uploads/settings')}}/{{ $settings->mobile_logo }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Website Footer Logo</label>
                                                <input name="FooterLogo" class="form-control" type="file"
                                                    onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])">
                                                <small class="text-secondary">
                                                    Recommended image size is <b>150px x
                                                        150px</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="footer_logo" class="logo"
                                                                src="{{asset('uploads/settings')}}/{{ $settings->footer_logo }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>About Us</label>
                                        <textarea class="form-control" name="about_us" id="aboutUs" cols="30" rows="3">
                                            {{ $settings->about_us }}
                                        </textarea>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /General -->

            <!-- Social Login -->
            <div role="tabpanel" id="sociallogin" class="tab-pane fade">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Social Login</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                                <li class="breadcrumb-item active">Social Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card shadow-none">
                    <div class="card-header">
                        <h4 class="card-title">Social Login</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Facebook App ID</label>
                            <input type="text" class="form-control mb-2" id="website_facebook_app_id"
                                name="website_facebook_app_id" value="506928406484271">
                            <a href="https://www.codexworld.com/create-facebook-app-id-app-secret/" target="_blank">How
                                to Create facebook app id?</a>
                        </div>
                        <div class="form-group">
                            <label>Google Client ID</label>
                            <input type="text" class="form-control mb-2" id="website_google_client_id"
                                name="website_google_client_id"
                                value="387823802376-7e1kr704s4o39a8cqtdmd6jeaob636tu.apps.googleusercontent.com">
                            <a href="https://www.codexworld.com/create-google-developers-console-project/"
                                target="_blank">How to Create google client id?</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <button name="form_submit" type="submit" class="btn btn-primary" value="true">Save
                            Changes</button>
                    </div>
                </div>
            </div>
            <!-- /Social Login -->

        </div>
        <!-- /Tab Content -->

    </div>
</div>
<!-- /content -->
@endsection
