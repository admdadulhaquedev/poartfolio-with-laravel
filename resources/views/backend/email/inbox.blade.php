@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Inbox</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Received Email</li>
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
                                        <th>Received Time</th>
                                        <th>Message</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <style>
                                    .bg-read{
                                        background: #f7f7f7;
                                    }
                                </style>
                                <tbody>
                                    @foreach ($inbox_emails as $inbox_email)

                                        <tr class="{{ ($inbox_email->read_at == 'un_read') ? 'bg-read' : '' }}">
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="https://www.gravatar.com/'{{ md5($inbox_email->email) }}'.php" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="https://www.gravatar.com/avatar/{{ md5($inbox_email->email) }}" alt="User Image">
                                                    </a>
                                                    <a>{{ $inbox_email->name }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $inbox_email->email }}</td>
                                            <td>
                                                {{ $inbox_email->created_at->format('d M y') }}
                                                <span class="text-primary d-block">
                                                    {{ $inbox_email->created_at->format('h:m:s') }}
                                                </span>
                                            </td>
                                            <td class="text">
                                                {{ $inbox_email->messages }}
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" href="{{ route('single.email',$inbox_email->id) }}">
                                                        <i class="fe fe-eye"></i>
                                                        View
                                                    </a>
                                                    <a data-id="{{ $inbox_email->id }}" data-toggle="modal" href="#inbox_message_delete"class="btn btn-sm bg-danger-light">
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
<div class="modal fade" id="inbox_message_delete" role="dialog" style="display: none;" aria-hidden="true">
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
        var inbox_message_deleteID = $(this).attr("data-id");

        var url = '{{ route("inboxemail.destroy", ":id") }}';
        url = url.replace(':id', inbox_message_deleteID);

        $('.confirm_delete').append('<a class="btn btn-primary" href="'+url+'">Delete</a>');

    })

});


</script>
@endsection
