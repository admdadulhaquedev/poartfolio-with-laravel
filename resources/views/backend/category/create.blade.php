@extends('layouts.backend.app')

@section('content')

<!-- Content -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Add Categorie</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('home') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Categorie</li>
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
								<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="form-group">
										<label>Categorie Name</label>
                                        <input name="CategoryName" type="text" placeholder="Categorie Name" class="@error('CategoryName') is-invalid @enderror form-control">
									</div>

                                    <div class="form-group">
                                        <label>Category Photo</label>
                                        <input name="CategoryPhoto" class="@error('CategoryPhoto') is-invalid @enderror form-control" type="file">

                                        <small class="text-secondary">
                                            Recommended image size is
                                            <b>
                                                150px x 150px
                                            </b>
                                        </small>
                                    </div>


									<div class="form-group">
										<label class="display-block w-100">Categorie Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="CategorieStatus" value="1" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="CategorieStatus" value="2" type="radio">
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button type="submit" class="btn btn-primary btn-lg">Add Categorie</button>
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
