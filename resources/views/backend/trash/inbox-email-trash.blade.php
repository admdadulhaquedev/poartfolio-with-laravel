@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Deleted Message</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Deleted Received Email</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        @if (session("success_delete"))
                            <div class="alert alert-danger">
                                {{ session("success_delete") }}
                            </div>
                        @endif
                        @if (session("success_undo"))
                            <div class="alert alert-success">
                                {{ session("success_undo") }}
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
                                <tbody>
                                    @foreach ($only_trash_inboxemail as $inbox_email)

                                        <tr>
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
                                                    <a href="{{ route('inboxEmail.restore',$inbox_email->id) }}" class="btn btn-sm bg-info-light">
                                                        <i class="fa fa-trash-undo"></i>
                                                        Undo
                                                   </a>
                                                    <a data-id="{{ $inbox_email->id }}" data-toggle="modal" href="#delete" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i>
                                                        Delete Forever
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
<div class="modal fade" id="delete" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="form-content p-2 text-center">
                    <h4 class="modal-title">Delete Forever</h4>
                    <p class="mb-4">Are you sure want to delete Forever?</p>
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
        var deleteID = $(this).attr("data-id");

        var url = '{{ route("inboxEmail.forcedelete", ":id") }}';
        url = url.replace(':id', deleteID);

        $('.confirm_delete').append('<a class="btn btn-primary" href="'+url+'">Delete</a>');

    })

});


</script>
@endsection
