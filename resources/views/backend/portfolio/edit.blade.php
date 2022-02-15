@extends('layouts.backend.app')

@section('content')

<!-- Content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Post</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Post</li>
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
                                <form action="{{ route('portfolio.update') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                    @endif


                                    <input name="id" class="slug-input form-control" type="hidden" value="{{ $portfolio_details->id }}">
                                    <div class="form-group">
                                        <label>Portfolio Title</label>
                                        <input name="portfolio_title" class="slug-input form-control" type="text" value="{{ $portfolio_details->title }}">
                                    </div>


                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Website Header Logo</label>
                                                <input name="portfolio_logo" class="form-control" type="file" onchange="document.getElementById('portfolio_logo').src = window.URL.createObjectURL(this.files[0])">

                                                <small class="text-secondary">
                                                    Recommended image size is <b>150px x 150px</b>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="">
                                                    <div class="logo-image mb-0 text-center">
                                                        <a href="#">
                                                            <img id="portfolio_logo" class="logo" src="{{asset('uploads/portfolios/logos')}}/{{ $portfolio_details->logo }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Portfolio Category</label>
                                                <select name="portfolio_category" id="drop_down" class="select select2-hidden-accessible form-control">
                                                    <option value="{{ $portfolio_details->category_id }}">{{ CategorybyID($portfolio_details->category_id)->category_name }}</option>

                                                    @foreach ($allcategory as $caegory)
                                                    <option value="{{ $caegory->id }}">
                                                        {{ $caegory->category_name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tag Name Start-->
                                    <div class="form-group">
                                        <label for="input">Project Link</label>
                                        <input name="project_link" value="{{ $portfolio_details->project_link }}" type="text" class="form-control" >
                                    </div>
                                    <!-- Tag Name Start-->

                                    <!-- End row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-5">
                                                <label class="display-block w-100">Active Status</label>
                                                <div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="portfolio_status" class="custom-control-input"
                                                            id="active" value="1" type="radio" {{ ($portfolio_details->status == 1)?"checked":"" }}>
                                                        <label class="custom-control-label" for="active">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="portfolio_status" class="custom-control-input"
                                                            id="inactive" value="0" type="radio" {{ ($portfolio_details->status == 1)?"":"checked" }}>
                                                        <label class="custom-control-label"
                                                            for="inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="m-t-20 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Update Portfolio</button>
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

        // For Ajax
        // $('#drop_down').change(function () {
        //     var category_id = $(this).val();
        //     $("#sub_category").attr('disabled', false)
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: 'POST',
        //         url: '/get/subcategory',
        //         data: {
        //             category_id: category_id
        //         },
        //         success: function (data) {
        //             $('#sub_category').html(data);
        //         }
        //     });
        // })


        // Tag
        $('#tags_name').tagsinput({
            trimValue: true,
            confirmKeys: [13, 44, 32],
            focusClass: 'my-focus-class'
        });

        $('.bootstrap-tagsinput input').on('focus', function () {
            $(this).closest('.bootstrap-tagsinput').addClass('has-focus');
        }).on('blur', function () {
            $(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
        });


    });

</script>
@endsection
