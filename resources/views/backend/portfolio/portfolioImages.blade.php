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
                                <form action="{{ route('portfolioimages.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                    @endif


                                    <div class="form-group">
                                        <label>Select Portfolio</label>
                                        <select name="portfolio_id" id="select2_" class="select select2-hidden-accessible form-control">
                                            <option>--Select a Country--</option>

                                            @foreach ($portfolios as $portfolio)
                                                <option value="{{ $portfolio->id }}">
                                                    {{ $portfolio->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Images Title</label>
                                        <input name="images_title" class="form-control" type="text">
                                        <span>One Word Please</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Portfolio Images</label>
                                        <input name="portfolio_images[]" multiple class="form-control" type="file">
                                        <span>Photo Sizs: 350px X 350px</span>
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
    <script type="text/javascript">
        $("#select2_").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
    </script>
@endsection
