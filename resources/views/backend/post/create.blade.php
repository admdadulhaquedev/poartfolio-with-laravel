@extends('layouts.backend.app')

@section('content')

<!-- Content -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Post</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add Post</li>
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
                                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                    @endif


                                    <div class="form-group">
                                        <label>Post Mega Title</label>
                                        <input name="post_title" class="slug-input form-control" type="text">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Post Category</label>
                                                <select name="post_category" id="drop_down"
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
                                        <div class="col-md-6">
                                            {{-- <div class="form-group">
                                                <label>Post Sub Category</label>
                                                <select name="post_sub_category" disabled id="sub_category"
                                                    class="select select2-hidden-accessible form-control">
                                                    <option>
                                                        --Please Select Main Category First--
                                                    </option>
                                                </select>
                                            </div> --}}
                                        </div>
                                    </div>



                                    <!-- Summernote end -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="header-title m-b-30">Default Editor</h4>
                                                <textarea name="post_description" class="summernote">
                                                    <h3>Hello Summernote</h3>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Summernote end -->


                                    <!-- Tag Name Start-->
                                    <div class="form-group">
                                        <label for="input">Tag Name</label>
                                        <input data-role="tagsinput" type="text" id="tags_name" name="tags_name" class="form-control" placeholder="">
                                        <small class="form-text text-muted">
                                            Separate keywords with a comma, space bar,
                                            or enter key
                                        </small>
                                    </div>
                                    <!-- Tag Name Start-->

                                    <!-- End row -->
                                    <div class="row">
                                        @if (Auth::user()->role == 1)
                                        <div class="col-md-6">
                                            <div class="form-group mt-5">
                                                <label class="display-block w-100">Active Status</label>
                                                <div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="post_status" class="custom-control-input"
                                                            id="active" value="1" type="radio" checked="">
                                                        <label class="custom-control-label" for="active">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="post_status" class="custom-control-input"
                                                            id="inactive" value="0" type="radio">
                                                        <label class="custom-control-label"
                                                            for="inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-md-6">
                                            <div class="form-group mt-5">
                                                <label class="display-block w-100">Fetuer Status</label>
                                                <div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="fetuer_status" class="custom-control-input"
                                                            id="fetuer_active" value="1" type="radio">
                                                        <label class="custom-control-label"
                                                            for="fetuer_active">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input name="fetuer_status" class="custom-control-input"
                                                            id="fetuer_inactive" value="0" type="radio" checked="">
                                                        <label class="custom-control-label"
                                                            for="fetuer_inactive">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-t-20 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Publish Post</button>
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
