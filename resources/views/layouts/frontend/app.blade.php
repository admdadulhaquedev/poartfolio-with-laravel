<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Personal Portfolio</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/magnific-popup.css') }}">

    <!-- CSS Base -->
    <link rel="stylesheet" class="theme-st" href="{{ asset('frontend/css/style.css') }}">

</head>

<body>
    <div class="header">

        <!-- <div class="right_logo">
			<a href="#" class="d-flex">
				<div class="logo">
					<img src="img/logo-K.png" alt="logo">
				</div>
				<div class="name">
					<h1>Amdadul Haque Melon</h1>
					<span>Web Application Developer</span>
				</div>
			</a>
		</div> -->

        <nav role='navigation' class="side_nave">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="{{ route('/') }}">
                        <li>Profile</li>
                    </a>
                    <a href="#protfolios">
                        <li>Protfolios</li>
                    </a>
                    <a href="#services">
                        <li>Services</li>
                    </a>
                    <a href="#contact_me">
                        <li>Contact</li>
                    </a>
                </ul>
            </div>
        </nav>

    </div>

    @yield("content")

    <!-- All Script -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @yield('footer_script')

</body>

</html>
