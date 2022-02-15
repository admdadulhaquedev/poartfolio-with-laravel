@extends('layouts.backend.app')

@section("breadcrumb")
<div class="col-sm-12">
    <h3 class="page-title">CV Update</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('cv') }}">CV</a>
        </li>
        <li class="breadcrumb-item active">CV Update</li>
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
                    <a class="nav-link active" href="#generalsettings" data-toggle="tab">CV Update</a>
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
                                <h4 class="card-title">CV Update</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('cv.update') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Cv</label>
                                                <input name="cv" class="form-control" type="file">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update CV</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /General -->

        </div>
        <!-- /Tab Content -->

    </div>
</div>
<!-- /content -->
@endsection
