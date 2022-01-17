@extends('layouts.frontend.app')

@section('content')
	<!-- Main Page -->
	<div class="page" id="">
		<!-- Container -->
		<section class="container">


			<!-- Pritfolio Section -->
			<div class="protfolio_section" id="protfolios">
				<div class="row mt-100">
					<div class="col-12">

						<!-- Portfolio Filter -->
						<div class="row mt-100">
							<div class="col-lg-12 col-sm-12 portfolio-filter">
								<ul>
									<li class="active" data-filter="*">All</li>
									<li data-filter=".design">Blog</li>
									<li data-filter=".graphic">PSD to HTML</li>
									<li data-filter=".brand">Web Aplication</li>
								</ul>
							</div>
						</div>
						<!-- / Portfolio Filter -->

						<!-- Portfolio Items -->
						<div class="row mt-100 mb-100 portfolio-items">

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-1.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Graphic</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-1.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 design">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-2.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Design</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-2.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 brand">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-3.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Graphic</p><i class="fas fa-video"></i>
										<a class="video-link" href="https://www.youtube.com/watch?v=k_okcNVZqqI"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 graphic">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-4.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Design</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-4.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 design">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-5.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Design</p><i class="fas fa-video"></i>
										<a class="video-link" href="https://www.youtube.com/watch?v=k_okcNVZqqI"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 brand">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-6.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Brand</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-6.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 graphic">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-7.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Brand</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-7.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 design">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-8.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Brand</p><i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-8.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

							<!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 brand">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-9.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Graphic</p>
                                        <i class="fas fa-image"></i>
										<a class="image-link" href="img/portfolio/img-9.jpg"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item -->

						</div>
						<!-- / Portfolio Items -->


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
						<!-- End Copyright -->
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
