<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ Settings()->website_name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/img/favicon.png">
        <!-- Summernote css -->
    <link href="{{ asset('backend') }}/assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('backend') }}/assets/img/logo.png" alt="Logo">
                </a>
                <a href="{{ route('home') }}" class="logo logo-small">
                    <img src="{{ asset('backend') }}/assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>


            <ul class="nav user-menu">
                @if (Auth::user()->role == 1)
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="badge badge-pill">{{ count(Notifications()) }}</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">

                                @foreach (Notifications() as $Notification)

                                <!-- Notification Loop -->
                                <li class="notification-message">
                                    <a href="#" class="pt-1">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">You Received</span>
                                                    Message form
                                                    <span class="noti-title">{{ $Notification->email }}</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">
                                                        {{ \Carbon\Carbon::parse($Notification->created_at)->diffForHumans() }}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="">
                                                <a href="{{ route('single.email', $Notification->id) }}">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    </a>


                                </li>
                                <!-- /Notification Loop -->
                                @endforeach

                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="{{ route('email.index') }}">View all Messages</a>
                        </div>
                    </div>
                </li>
                @endif

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('uploads/profiles') }}/{{ auth()->user()->photo }}" width="31" alt="Ryan Taylor">
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('uploads/profiles') }}/{{ auth()->user()->photo }}" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p class="text-muted mb-0">
                                    @if (Auth::user()->role == 1)
                                        Administrator
                                    @else
                                        Sub Admin
                                    @endif
                                </p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('settings.index') }}">Settings</a>
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>

            </ul>

        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <!-- DASHBOARD -->
                        <li class="menu-title">
                            <span>
                                <i class="fe fe-home"></i>
                            </span>
                        </li>
                        <li class="{{ (Request::route()->getName() == 'home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- /DASHBOARD -->


                        <!-- PROFILE -->
                        <li class="{{ (Request::route()->getName() == 'profile.index') ? 'active' : '' }}">
                            <a href="{{ route('profile.index') }}">
                                <span>My Profile</span>
                            </a>
                        </li>
                        <!-- /PROFILE -->

                        <!-- SETTINGS -->
                        <!-- Only for Administrator -->
                        @if (Auth::user()->role == 1)
                        <li class="{{ (Request::route()->getName() == 'settings.index') ? 'active' : '' }}">
                            <a href="{{ route('settings.index') }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <!-- /SETTINGS -->

                        <!-- AUTHANTICATION -->
                        {{-- <li class="submenu ">
                            <a class="{{ ((Request::route()->getName() == 'register') || (Request::route()->getName() == 'register.requested')) ? 'active' : '' }}" href="#">
                                <span> Authentication </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'register') ? 'active' : '' }}" href="{{ route('register') }}"> Register </a>
                                </li>
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'register.requested') ? 'active' : '' }}" href="{{ route('register.requested') }}"> Requested Register </a>
                                </li>
                            </ul>
                        </li> --}}
                        <!-- /AUTHANTICATION -->

                        @endif
                        <!-- /Only for Administrator -->

                        <li class="menu-title">
                            <span>
                                <i class="fe fe-document"></i>
                                Pages
                            </span>
                        </li>

                        <!-- CATEGORY -->
                        <!-- Only for Administrator -->
                        @if (Auth::user()->role == 1)
                        <li class="submenu">
                            <a class="{{ ((Request::route()->getName() == 'category.index')||(Request::route()->getName() == 'category.create')) ? 'active' : '' }}" href="#">
                                <span>Categories</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li>
                                    <a class="{{ (Request::route()->getName() == 'category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">Categories</a>
                                </li>
                                <li>
                                    <a class="{{ (Request::route()->getName() == 'category.create') ? 'active' : '' }}" href="{{ route('category.create') }}">Add Category</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                         <!-- /Only for Administrator -->
                        <!-- /CATEGORY -->

                        <!-- EMAIL -->
                        <!-- Only for Administrator -->
                        @if (Auth::user()->role == 1)
                            <li class="submenu">
                                <a class="{{ ((Request::route()->getName() == 'email.index')) ? 'active' : '' }}" href="#">
                                    <span>Email</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ (Request::route()->getName() == 'email.index') ? 'active' : '' }}" href="{{ route('email.index') }}">Inbox</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <!-- /Only for Administrator -->
                        <!-- /EMAIL -->


                        <!-- CV -->
                            <li class="submenu">
                                <a class="{{ ((Request::route()->getName() == 'cv')) ? 'active' : '' }}" href="#">
                                    <span>CV</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ (Request::route()->getName() == 'cv') ? 'active' : '' }}" href="{{ route('cv') }}">CV Update</a>
                                    </li>
                                </ul>
                            </li>
                        <!-- /CV -->

                        <!-- POST -->
                        <li class="submenu">
                            <a class="{{ ((Request::route()->getName() == 'portfolio.index')||(Request::route()->getName() == 'portfolio.create')) ? 'active' : '' }}" href="#">
                                <span>Portfolio</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li>
                                    <a class="{{ (Request::route()->getName() == 'portfolio.create') ? 'active' : '' }}" href="{{ route('portfolio.create') }}"> Add Portfolio </a>
                                </li>

                                <li>
                                    <a class="{{ (Request::route()->getName() == 'portfolioimages.create') ? 'active' : '' }}" href="{{ route('portfolioimages.create') }}"> Add Portfolio Images </a>
                                </li>

                                <!-- Only for Administrator -->
                                <li>
                                    <a class="{{ (Request::route()->getName() == 'portfolio.index') ? 'active' : '' }}" href="{{ route('portfolio.index') }}"> All Portfolio</a>
                                </li>
                                <!-- /Only for Administrator -->

                            </ul>
                        </li>
                        <!-- /POST -->


                        <!-- CONTUCT -->
                        <!-- Only for Administrator -->
                        @if (Auth::user()->role == 1)
                        <li class="submenu">
                            <a class="{{ ((Request::route()->getName() == 'contactinfo.index')||(Request::route()->getName() == 'social.index')||(Request::route()->getName() == 'social.create')) ? 'active' : '' }}" href="#">
                                <span>Contuct</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'contactinfo.index') ? 'active' : '' }}" href="{{ route('contactinfo.index') }}">Contuct Info</a>
                                </li>
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'social.index') ? 'active' : '' }}" href="{{ route('social.index') }}">Social Account's </a>
                                </li>
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'social.create') ? 'active' : '' }}" href="{{ route('social.create') }}">Add Social Account's </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!-- Only for Administrator -->
                        <!-- /CONTUCT -->


                        <!-- TRASH -->
                        <li class="menu-title">
                            <span>
                                <i class="fe fe-trash"></i>
                                Trash
                            </span>
                        </li>

                        <li class="submenu">
                            <a class="{{ ((Request::route()->getName() == 'requestedRegister.trash')||(Request::route()->getName() == 'category.trash')||(Request::route()->getName() == 'inboxEmail.trash')||(Request::route()->getName() == 'portfolio.trash')||(Request::route()->getName() == 'socialLink.trash')||(Request::route()->getName() == 'add.trash')) ? 'active' : '' }}" href="#">
                                <span>Trash</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">

                                @if (Auth::user()->role == 1)
                                    <li class="">
                                        <a class="{{ (Request::route()->getName() == 'requestedRegister.trash') ? 'active' : '' }}" href="{{ route('requestedRegister.trash') }}">Requested User</a>
                                    </li>
                                    <li class="">
                                        <a class="{{ (Request::route()->getName() == 'category.trash') ? 'active' : '' }}" href="{{ route('category.trash') }}">Category</a>
                                    </li>
                                    <li class="">
                                        <a class="{{ (Request::route()->getName() == 'socialLink.trash') ? 'active' : '' }}" href="{{ route('socialLink.trash') }}">Social Account's </a>
                                    </li>
                                    <li class="">
                                        <a class="{{ (Request::route()->getName() == 'inboxEmail.trash') ? 'active' : '' }}" href="{{ route('inboxEmail.trash') }}">Email</a>
                                    </li>
                                @endif
                                <li class="">
                                    <a class="{{ (Request::route()->getName() == 'portfolio.trash') ? 'active' : '' }}" href="{{ route('portfolio.trash') }}">Portfolio</a>
                                </li>

                            </ul>
                        </li>
                        <!-- /TRASH -->

                    </ul>
                </div>
            </div>
        </div>

        @yield("content")

        <script src="{{ asset('backend') }}/assets/js/jquery-3.2.1.min.js"></script>

        <script src="{{ asset('backend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/bootstrap.min.js"></script>

        <script src="{{ asset('backend') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!--Summernote js-->
        <script src="{{ asset('backend') }}/assets/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/form-validation.js"></script>
        <script src="{{ asset('backend/assets/plugins/tagsinput/bootstrap-tagsinput.min.js') }}"></script>

        <script src="{{ asset('backend') }}/assets/js/jquery.maskedinput.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/mask.js"></script>

        <script src="{{ asset('backend') }}/assets/plugins/select2/js/select2.min.js"></script>

        <script src="{{ asset('backend') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/datatables.min.js"></script>

        <script src="{{ asset('backend') }}/assets/js/script.js"></script>

        @yield('footer_script')

</body>

</html>
