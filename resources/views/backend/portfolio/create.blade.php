@extends('layouts.backend.app')

@section('content')

<!-- Content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Portfolio</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Add details -->
                        <div class="row">
                            <div class="col-12 blog-details">
                                <form action="{{ route('portfolio.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                    @endif


                                    <div class="form-group">
                                        <label>Portfolio Title</label>
                                        <input name="title" class="form-control" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label>Portfolio Logo</label>
                                        <input name="portfolio_logo" class="form-control" type="file">
                                        <span>Photo Sizs: 350px X 350px</span>
                                    </div>


                                    <div class="form-group">
                                        <label>Portfolio Live Link</label>
                                        <input name="portfolio_link" class="form-control" type="text">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Portfolio Category</label>
                                                <select name="portfolio_category" id="drop_down"
                                                    class="select select2-hidden-accessible form-control">
                                                    <option>--Select a Country--</option>

                                                    @foreach ($allcategory as $caegory)
                                                    <option value="{{ $caegory->id }}">
                                                        {{ $caegory->category_name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <!-- End row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-5">
                                                <label class="display-block w-100">Active Status</label>
                                                <div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="portfolio_status" class="custom-control-input"
                                                            id="active" value="1" type="radio" checked="">
                                                        <label class="custom-control-label" for="active">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="portfolio_status" class="custom-control-input"
                                                            id="inactive" value="0" type="radio">
                                                        <label class="custom-control-label"
                                                            for="inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="m-t-20 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Publish Portfolio</button>
                                    </div>

                                </form>
                            </div>
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
<script>
    jQuery(document).ready(function () {




    });

</script>
@endsection
