@extends('layouts.backend.app')

@section("breadcrumb")
<div class="col-sm-12">
    <h3 class="page-title">My Profile</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Profile</li>
    </ul>
</div>
@endsection

@section('content')

<!-- content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                @yield("breadcrumb")
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="profile-image">
                                <a href="#">
                                    <img class="rounded-circle" id="" alt="User Image"
                                        src="{{asset('uploads/profiles').'/'.Auth::user()->photo}}">
                                </a>
                                <div class="upload-img">
                                    <a class="photo-edit-link" data-toggle="modal" href="#edit_photo">
                                        <p class="m-0">Edit</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ Auth::user()->name }}</h4>
                            <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                            <div class="pb-3">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ Auth::user()->address }}
                            </div>
                            <div class="about-text">
                                {{ Auth::user()->about_me }}
                            </div>
                        </div>
                        <div class="col-auto profile-btn">
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link {{ ($errors->any()||session("success")||session("confirm_password")) ? '' : 'active' }}" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($errors->any()||session("success")||session("confirm_password")) ? 'active' : '' }}" data-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade {{ ($errors->any()||session("success")||session("confirm_password")) ? '' : 'active show' }}" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details">
                                                <i class="fa fa-edit mr-1"></i>
                                                Edit
                                            </a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{ Auth::user()->name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-10">
                                                {{ date('d-M-Y', strtotime(Auth::user()->dateOfbirth)) }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{ Auth::user()->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10">{{ Auth::user()->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade {{ ($errors->any()||session("success")||session("confirm_password")) ? 'active show' : '' }} ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">

                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ route('password.change') }}" method="POST">
                                            @csrf
                                            @if (session("success"))
                                                <div class="alert alert-success">
                                                    {{ session("success") }}
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input id="old_password" type="password" name="old_password" value="{{ old('old_password') }}" class="form-control @if (session("old_password")) is-invalid @endif">
                                                @if (session("old_password"))
                                                    <div class="alert alert-danger mt-2">
                                                        {{ session("old_password") }}
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input id="new_password" type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}">
                                                @error('new_password')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input id="cnew_password" type="password" name="cnew_password" class="form-control @if (session(" confirm_password")) is-invalid @endif" value="{{ old('cnew_password') }}">
                                                @if (session("confirm_password"))
                                                    <div class="alert alert-danger mt-2">
                                                        {{ session("confirm_password") }}
                                                    </div>
                                                @endif
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->

                </div>
            </div>
        </div>

    </div>
</div>
<!-- /content -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Personal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update',Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div class="cal-icon">
                                    <input name="dateOfbirth" type="date" class="form-control"
                                        value="{{ date('m-d-Y', strtotime(Auth::user()->dateOfbirth)) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Email ID</label>
                                <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="form-title">
                                <span>Address</span>
                            </h5>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control"
                                    value="{{ Auth::user()->address }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea class="form-control" name="about_me" id="about_me" cols="30" rows="2">
                                    {{ Auth::user()->about_me }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->

<!-- Edit Photo Modal -->
<div class="modal fade" id="edit_photo" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Photo Change</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profilephoto.update',Auth::user()->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 col-sm-4">
                            <div class="modal_image">
                                <img class="rounded-circle w-100" id="image_id" alt="User Image"
                                    src="{{asset('uploads/profiles').'/'.Auth::user()->photo}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class="form-group justify-content-center d-flex">
                                <input class="upload_btn m-t-50" id="photo" type="file" name="new_profile_photo"
                                    onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Photo Modal -->

@endsection

@section("footer_script")
    <script type="text/javascript">

// old_password
// new_password
// cnew_password

        function old_password() {
            var old_password = document.getElementById("old_password");
            if (old_password.type === "password") {
                old_password.type = "text";
            } else {
                old_password.type = "password";
            }
        }
    </script>
@endsection
