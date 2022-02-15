@extends('layouts.frontend.app')

@section('content')
	<!-- Main Page -->
	<div class="page" id="">
		<!-- Container -->
		<section class="container">


            <!-- Service Section -->
			<div class="service_section" id="services">
				<div class="row mt-100">

					<!-- Header Block -->
					<div class="col-md-12">
						<div class="mb-25 text-center">
							<img src="{{ asset('uploads/settings/footer-logo.png') }}" alt="">
						</div>
					</div>


				</div>
			</div>
			<!-- / Service Section -->


            <!-- Service Section -->
			<div class="service_section" id="services">
				<div class="row mt-100">

					<!-- Header Block -->
					<div class="col-md-12">
						<div class="mb-25 text-left">
							<h5 class="mb-2">Blog</h5>
							<h2>News Portal</h2>
						</div>
					</div>


				</div>
			</div>
			<!-- / Service Section -->

			<!-- Pritfolio Section -->
			<div class="protfolio_section">
				<div class="row">
					<div class="col-12">

						<!-- Portfolio Items -->
						<div class="row mt-10 mb-100 portfolio-items">

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6">
								<figure>
                                    <img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-1.jpg">
									<figcaption>
										<h3>Project Name</h3>
                                        <a data-group="1" class="galleryItem image-link" href="{{asset('uploads/frontend')}}/img/portfolio/img-1.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-2.jpg">
									<figcaption>
										<h3>Project Name</h3>
                                        <a data-group="1" class="galleryItem image-link" href="{{asset('uploads/frontend')}}/img/portfolio/img-2.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-3.jpg">
									<figcaption>
										<h3>Project Name</h3>
                                        <a data-group="1" class="galleryItem image-link" href="{{asset('uploads/frontend')}}/img/portfolio/img-2.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

						</div>
						<!-- / Portfolio Items -->


					</div>
				</div>
                <div class="row">
                    <div class="col-12 d-flex">
                        <h4 class="mr-1">Visit Here</h4>
                        <a href="">
                             <h4>Per care Lover</h4>
                        </a>
                    </div>
                </div>
			</div>
			<!-- / Pritfolio Section -->


		</section>
		<!-- / Container -->


		<!-- Footer Section -->
		<footer id="footer" class="footer">
			<a href="#" class="back-to-top active" title="Back Top Top">
				<i class="fa fa-chevron-up"></i>
			</a>
			<div class="container footer_content">

				<div class="row">
					<div class="col-lg-10 text-left">
						<!-- Copyright -->
						<div class="copyright">
							<p>© Copyright 2021 <a href="#">Amdadul Haque</a>. All Rights Reserved | Developed By <a
									href="#">Amdadul Haque</a>.</p>
						</div>
						<!-- End Copyrightxa -->
					</div>


					<div class="col-lg-2 text-right">
						<div class="logo">
							<a href="index-2.html">
								<img src="{{asset('uploads/frontend')}}/img/logo-white.png" alt="Logo">
							</a>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!-- / Footer Section -->



	</div>
	<!-- / Main Page -->
@endsection
