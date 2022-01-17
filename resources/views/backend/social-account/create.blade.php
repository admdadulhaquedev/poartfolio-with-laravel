@extends('layouts.backend.app')

@section('content')

<!-- Content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Sub-Categorie</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Sub-Categorie</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-8 d-flex">
                <div class="card w-100">
                    <div class="card-body">

                        <!-- Add details -->
                        <div class="blog-details">
                            <form action="{{ route('social.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input name="account_name" class="form-control" type="text">
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="col-form-label">Select Incon</label>
                                            <div>
                                                <select id="select2_" name="icon_class" class="form-control"  onchange="document.getElementById('iconclass').className  = this.value">
                                                    <option>-- Select --</option>
                                                    @foreach ($icon_list as $icon)
                                                        <option value="fa {{ $icon->class }}">{{ $icon->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-0 text-center" style="margin-top: 33px">
                                            <a id="icon">
                                                <i id="iconclass" class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Account Link</label>
                                    <input name="account_link" class="form-control" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="display-block w-100">Account Status</label>
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input name="account_status" class="custom-control-input" id="active"
                                                value="1" type="radio" checked="">
                                            <label class="custom-control-label" for="active">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input name="account_status" class="custom-control-input" id="inactive"
                                                value="2" type="radio">
                                            <label class="custom-control-label" for="inactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Account Categorie</button>
                                </div>

                            </form>
                        </div>
                        <!-- /Add details -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Content -->

@endsection

@section("footer_script")
    <script type="text/javascript">
        $("#select2_").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
    </script>
@endsection
