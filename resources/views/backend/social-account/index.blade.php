@extends('layouts.backend.app')

@section('content')

<!-- Content -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Social Account</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Social Account</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
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
                                        <th>#</th>
                                        <th>Account Name</th>
                                        <th class="text-center">Icon</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_social_accounts as $key => $social_account)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ $social_account->profile_link }}" class="avatar avatar-sm mr-2">{{ $social_account->name }}</a>
                                                </h2>
                                            </td>

                                            <td class="text-center">
                                                <h2 class="table-avatar">
                                                    <a href="{{ $social_account->profile_link }}" class="avatar avatar-sm mr-2">
                                                        <i class="{{ $social_account->icon_class }}"></i>
                                                    </a>
                                                </h2>
                                            </td>

                                            <td class="text-center">
                                                <div class="status-toggle text-center">
                                                    <input type="checkbox" id="status_{{ $key }}" class="check status" {{ ($social_account->status == 1)?"checked":"" }} value="{{ $social_account->id }}">
                                                    <label for="status_{{ $key }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>

                                            <td class="text-right">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light social_edit" data-toggle="modal" href="#edit_modal">
                                                        <input type="hidden" name="edit_social" value="{{ $social_account->id }}">
                                                        <i class="fe fe-pencil"></i>
                                                        Edit
                                                    </a>
                                                    <a data-toggle="modal" href="#delete_social_account" data-id="{{ $social_account->id }}" class="btn btn-sm bg-danger-light delete_category">
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
<!-- Edit Model -->
<div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-content p-2">
                    <div class="modal-header border-0">
                        <h4 class="modal-title">Edit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('social.update') }}" id="update_social_account" method="post" autocomplete="off" enctype="multipart/form-data" novalidate="novalidate" class="bv-form">
                                @csrf
                                <div class="form-group">
                                    <label>Icon Name</label>
                                    <input class="form-control" type="text" value="" name="account_name" id="account_name">
                                    <input class="form-control" type="hidden" value="" name="account_id" id="account_id">
                                </div>
                                <div class="form-group">
                                    <label>Account Link</label>
                                    <input class="form-control" type="text" value="" name="account_link" id="account_link">
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Icon</label>
                                    <div class="col-lg-9">
                                        <select id="select2_" name="icon_class" class="select" onchange="document.getElementById('iconclass').className  = this.value">
                                            @foreach ($icon_list as $icon)
                                                <option value="fa {{ $icon->class }}">{{ $icon->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center" style="margin-top: 33px">
                                    <a id="icon">
                                        <i id="iconclass" class=""></i>
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Save Changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Model -->

<!-- Delete Model -->
<div class="modal fade" id="delete_social_account" role="dialog" style="display: none;" aria-hidden="true">
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

        $("#select2_").select2({
            // placeholder: "Select a programming language",
            allowClear: true
        });

        // For Ajax SetUp
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // For Ajax
        $('.social_edit').click(function () {
            var social_id = $(this).children('input[name="edit_social"]').val()
            $.ajax({
                type: 'GET',
                url: '/social/edit',
                data: {
                    social_id: social_id,
                },
                success: function (data) {
                    console.log(data)
                    $('#account_id').val(data.id);
                    $('#account_name').val(data.name);
                    $('#account_link').val(data.profile_link);
                    $('#iconclass').addClass(data.icon_class);
                    $('#select2_').html("<option value='"+data.icon_class+"'>"+data.name+"</option>");
                }
            });

        })

        // For Delete
        $('a[data-toggle="modal"]').on('click', function () {
			var delete_social_accountID = $(this).attr("data-id");

            var url = '{{ route("social.destroy", ":id") }}';
            url = url.replace(':id', delete_social_accountID);

            $('.confirm_delete').append('<a class="btn btn-primary" href="'+url+'">Delete</a>');

		})


        $('.status').click(function () {
            var social_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '/social/status/update',
                data: {
                    social_id: social_id,
                },
                success: function (data) {
                    console.log(data);
                }
            });
        })


    });


</script>
@endsection

