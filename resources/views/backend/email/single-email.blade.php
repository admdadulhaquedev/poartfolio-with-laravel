@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Single Email</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Email Details</li>
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
                                <div class="d-flex flex-wrap date-col">
                                    <span class="date">
                                        <i class="fas fa-calendar-check"></i>
                                        Received Time : {{ $email_details->created_at->format('d M y') }}
                                    </span>
                                    <span class="author">
                                        <i class="fe fe-user"></i>
                                        By {{ $email_details->name }}
                                    </span>
                                </div>
                                <div class="blog-content ml-4">
                                    {{ $email_details->messages }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4>Reply Email</h4>
                        <ul class="share-post">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <style>
                            .font-50{
                                font-size: 50px;
                            }
                        </style>
                        <h4>About author</h4>
                        <div class="about-author pt-4 d-flex align-items-center">
                            <div class="left font-50 text-center">
                                <i class="fe fe-user"></i>
                            </div>
                            <div class="right">
                                <h5>Name: {{ $email_details->name }}</h5>
                                <h5>Phone: {{ $email_details->phone }}t</h5>
                                <h5>Email: {{ $email_details->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
