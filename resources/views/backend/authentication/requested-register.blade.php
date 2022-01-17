@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Requested Register</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Requested Register</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        @if (session("success_delete"))
                            <div class="alert alert-success">
                                {{ session("success_delete") }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($register_riguested_profile as $profile)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="https://www.gravatar.com/'{{ md5($profile->email) }}'.php" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="https://www.gravatar.com/avatar/{{ md5($profile->email) }}" alt="User Image">
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $profile->email }}
                                            </td>
                                            <td>
                                                @if ($profile->email_verified_at)
                                                    Varified
                                                @else
                                                    Panding
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a data-id="{{ $profile->id }}" data-toggle="modal" href="#register_riguested_profile_delete" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<div class="modal fade" id="register_riguested_profile_delete" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="form-content p-2 text-center">
                    <h4 class="modal-title">Delete</h4>
                    <p class="mb-4">Are you sure want to delete?</p>
                    <div class="d-inline confirm_delete">
                        <!-- Append Link -->
                        <!-- /Append Link -->
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Model -->

@endsection

@section("footer_script")
<script type="text/javascript">

    jQuery(document).ready(function () {

    // For Delete
    $('a[data-toggle="modal"]').on('click', function () {
        var dregister_riguested_profileID = $(this).attr("data-id");

        var url = '{{ route("registerrequested.destroy", ":id") }}';
        url = url.replace(':id', dregister_riguested_profileID);

        $('.confirm_delete').append('<a class="btn btn-primary" href="'+url+'">Delete</a>');

    })
});


</script>
@endsection
