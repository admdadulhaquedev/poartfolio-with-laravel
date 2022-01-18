@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Blog Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 blog-details">
                                <span class="course-title">
                                    {{ $post_details->mega_title }}
                                </span>
                                <div class="d-flex flex-wrap date-col">
                                    <span class="date">
                                        <i class="fas fa-calendar-check"></i>
                                        {{ $post_details->created_at->format('M d Y') }}
                                    </span>
                                    <span class="author">
                                        <i class="fe fe-user"></i>
                                        By {{ $post_details->relationtouser->name }}
                                    </span>
                                </div>
                                {{-- <div class="blog-details-img">
                                    <img class="img-fluid" src="{{ asset('backend') }}/assets/img/blog/blog-01.jpg" alt="Post Image">
                                </div> --}}
                                <div class="blog-content">
                                    {!! $post_details->post_description !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4>Share the post</h4>
                        <ul class="share-post">
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h4>About author</h4>
                        <div class="about-author pt-4 d-flex align-items-center">
                            <div class="left">
                                <img class="rounded-circle" src="{{ asset('uploads/profiles') }}/{{  $post_details->relationtouser->photo }}" width="120"
                                    alt="Ryan Taylor">
                            </div>
                            <div class="right">
                                <h5>{{ $post_details->relationtouser->name }}</h5>
                                <p>
                                    {{ $post_details->relationtouser->about_me }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
