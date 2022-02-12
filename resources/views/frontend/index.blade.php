@extends('layouts.frontend.app')

@section('content')
	<!-- Main Page -->
	<div class="page" id="">
		<!-- Container -->
		<section class="container">

			<!-- Personal Informatio -->
			<div class="personal_info_section" id="parsonal_info">
				<div class="row mt-100">
					<!-- Information Block -->
					<div class="col-lg-12 col-sm-12">
						<div class="info">
							<div class="row">
								<div class="col-lg-3 col-sm-4">
									<div class="photo">
										<img alt="" src="{{ asset('uploads/frontend/img') }}/{{ Auth::user()->photo }}">
									</div>
								</div>
								<div class="col-lg-9 col-sm-8">
									<div class="about_me">
										<h2>I am Amdadul Haque Melon<br>& Web Application Developer.</h2>
										<p>
											I demonstrate excellent skills in communication and collaboration. Most
											of
											all I am committed to achieving my targets
										</p>
									</div>
									<div>
										I am <span class="hmw-available">Available</span>
										&nbsp; on
										<a target="_blank" class="upwork_btn" href="https://www.upwork.com/share?url=https://www.upwork.com/freelancers/~01d189ad8440c5dcdd" target="_blank">Upwork</a>
									</div>
								</div>

								<div class="col-lg-9 col-sm-4 d-flex">

                                    @foreach ($social_accounts as $social_account)
                                        <!-- Icon Info -->
                                        <div class="info-icon">
                                            <a target="_blank" href="{{ $social_account->profile_link }}">
                                                <i class="{{ $social_account->icon_class }}"></i>
                                            </a>
                                        </div>
                                    @endforeach

								</div>
								<div class="col-lg-3 col-sm-8 pt-50">
									<a href="{{ asset('uploads/cv/amdadulhaquemelon-cv.pdf') }}" download class="btn-st">Download CV</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- / Personal Informatio -->

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
                            @foreach ($portfolios as $portfolio)
                                <!-- Portfolio Item -->
                                <div class="item col-lg-4 col-sm-6">
                                    <figure>
                                        <img alt="Project Logo" src="{{asset('uploads/potfollios/logos')}}/{{ $portfolio->logo }}">
                                        <figcaption>
                                            <h3>{{ $portfolio->title }}</h3>
                                            <p>Graphic</p>
                                            <a class="video-link" href="{{ route('singleportfolio', $portfolio->slug) }}"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- / Portfolio Item -->
                            @endforeach

							{{-- <!-- Portfolio Item -->
							<div class="item col-lg-4 col-sm-6 brand">
								<figure>
									<img alt="" src="{{asset('uploads/frontend')}}/img/portfolio/img-3.jpg">
									<figcaption>
										<h3>Project Name</h3>
										<p>Graphic</p>
                                        <i class="fas fa-video"></i>
										<a class="video-link" href="{{ route('singleportfolio', 2) }}"></a>
									</figcaption>
								</figure>
							</div>
							<!-- / Portfolio Item --> --}}


						</div>
						<!-- / Portfolio Items -->

						<!-- All View Button -->
						<div class="row mt-100 mb-90">
							<div class="col-lg-12 col-sm-12 text-center">
								<a href="{{ route('allportfolios') }}" class="btn-st">VIEW MORE</a>
							</div>
						</div>
						<!-- / All View Button -->

					</div>
				</div>
			</div>
			<!-- / Pritfolio Section -->

			<!-- Service Section -->
			<div class="service_section" id="services">
				<div class="row mt-100">

					<!-- Header Block -->
					<div class="col-md-12">
						<div class="header-box mb-50">
							<h3>What I Love Doing</h3>
						</div>
					</div>

					<!-- Service Item -->
					<div class="col-lg-6 col-sm-6">
						<div class="service box-1 mb-40">
							<i class="fas fa-desktop"></i>
							<h4>Responsive Web Design</h4>
							<p>
								Making Cross Platform Responsive Website Template. Interactive & Pixel Perfect
								Design
							</p>
						</div>
					</div>

					<!-- Service Item -->
					<div class="col-lg-6 col-sm-6">
						<div class="service box-2 mb-40">
							<i class="fas fa-cogs"></i>
							<h4>Web Development</h4>
							<p>
								Creating any kind of Web Application. Its most powerful and Secure. Also Super
								faster.
							</p>
						</div>
					</div>

					<!-- Service Item -->
					<div class="col-lg-6 col-sm-6">
						<div class="service box-2 mb-40">
							<i class="fas fa-mobile-alt"></i>
							<h4>Bug Fixing</h4>
							<p>
								Fixing HTML, CSS , Responsive, PHP, Laravel
							</p>
						</div>
					</div>

					<!-- Service Item -->
					<div class="col-lg-6 col-sm-6">
						<div class="service box-1 mb-40">
							<i class="fas fa-medkit"></i>
							<h4>Quick Support</h4>
							<p>
								Non stop Web Design, Web Application, Server and project Support
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- / Service Section -->

			<!-- Contact Section -->
			<div class="contact_section" id="contact_me">
				<!-- Form Start -->
				<div class="row mt-100">
					<div class="col-lg-12 col-sm-12">
						<div class="header-box mb-50">
							<h3>Send Me Message</h3>
						</div>
						<div class="contact-form ">

							<form action="{{ route('inboxemail.recived') }}" method="post" class="contact-valid" id="contact-form">
								@csrf
                                <div class="row">
									<div class="col-lg-6 col-sm-12">
										<input type="text" name="name" id="name" class="form-control"
											placeholder="Name *">
									</div>
									<div class="col-lg-6 col-sm-12">
										<input type="email" name="email" id="email" class="form-control"
											placeholder="Email *">
									</div>
									<div class="col-lg-12 col-sm-12">
										<textarea class="form-control" name="note" id="note"
											placeholder="Your Message"></textarea>
									</div>
									<div class="col-lg-12 col-sm-12 text-center">
										<button type="submit" class="btn-st">Send Message</button>
										<div id="loader">
											<i class="fas fa-sync"></i>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12">
										<div class="error-messages">
											<div id="success">
												<i class="far fa-check-circle"></i>Thank you, your
												message has been sent.
											</div>
											<div id="error">
												<i class="far fa-times-circle"></i>Error occurred
												while sending email. Please try again later.
											</div>
										</div>
									</div>
								</div>
							</form>


						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="contact-info">
					<div class="row">
						<div class="col-lg-4 col-sm-12 info">
							<i class="fas fa-paper-plane"></i>
                            <p>{{ $contuct_info->email }}</p>
							<span>Email</span>
						</div>
						<div class="col-lg-4 col-sm-12 info">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>{{ $contuct_info->address }}</p>
							<span>Addres</span>
						</div>
						<div class="col-lg-4 col-sm-12 info">
                            <i class="fas fa-phone"></i>
                            <p>{{ $contuct_info->phone }}</p>
							<span>Phone</span>
						</div>
					</div>
				</div>
			</div>
			<!-- / Contact Section -->

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
