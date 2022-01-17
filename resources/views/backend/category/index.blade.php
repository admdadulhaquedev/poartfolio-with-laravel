@extends('layouts.backend.app')

@section('content')

<!-- Content -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Categories</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session("success_delete"))
                            <div class="alert alert-danger">
                                {{ session("success_delete") }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{asset('uploads/categories')}}/{{ $category->category_photo }}" alt="User Image"></a>
                                                    <a href="#">{{ $category->category_name }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $category->created_at->format('D/M/Y') }}</td>
                                            <td class="text-center">
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $key }}" class="check status" {{ ($category->status == 1)?"checked":"" }} value="{{ $category->id }}">
                                                    <label for="status_{{ $key }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light category_edit" data-toggle="modal" href="#edit_modal">
                                                        <input type="hidden" name="edit_category" value="{{ $category->id }}">
                                                        <i class="fe fe-pencil"></i>
                                                        Edit
                                                    </a>
                                                    <a data-toggle="modal" href="#delete_category" data-id="{{ $category->id }}" class="btn btn-sm bg-danger-light delete_category">
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
                            <form action="{{ route('category.update') }}" id="update_category" method="post" autocomplete="off" enctype="multipart/form-data" novalidate="novalidate" class="bv-form">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" value="" name="category_name" id="category_name">
                                    <input class="form-control" type="hidden" value="" name="category_id" id="category_id">
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input class="form-control" type="file" name="category_image" onchange="document.getElementById('category_image').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="form-group">
                                    <div class="avatar">
                                        <img id="category_image" class="avatar-img rounded" src=""  alt="">
                                    </div>
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
<div class="modal fade" id="delete_category" role="dialog" style="display: none;" aria-hidden="true">
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

        // For Ajax SetUp
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // For Ajax
        $('.category_edit').click(function () {
            var category_id = $(this).children('input[name="edit_category"]').val()
            $.ajax({
                type: 'GET',
                url: '/category/edit',
                data: {
                    category_id: category_id,
                },
                success: function (data) {
                    $('#category_name').val(data.category_name);
                    $('#category_id').val(data.id);
                    $('#category_image').attr('src', 'http://127.0.0.1:8000/uploads/categories/'+data.category_photo);
                    // $('#category_image').attr('src', window.URL+data.category_photo);
                }
            });

        })
        // For Delete
        $('a[data-toggle="modal"]').on('click', function () {
			var delete_categoryID = $(this).attr("data-id");

            var url = '{{ route("category.destroy", ":id") }}';
            url = url.replace(':id', delete_categoryID);

            $('.confirm_delete').append('<a class="btn btn-primary" href="'+url+'">Delete</a>');

		})

        // For Status Update
        $('.status').click(function () {
            var category_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '/category/status/update',
                data: {
                    category_id: category_id,
                },
                success: function (data) {
                    // $('#sub_category').html(data);
                    console.log(data);
                }
            });
        })


    });


</script>
@endsection
