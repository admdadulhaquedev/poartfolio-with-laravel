@extends('layouts.backend.app')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="invoice-container">
            <div class="row">
                <div class="col-sm-6 m-b-20">
                    <img alt="Logo" class="inv-logo img-fluid" src="{{ asset('uploads/settings') }}/{{ Settings()->header_logo }}">
                </div>
                <div class="col-sm-6 m-b-20">
                    <div class="invoice-details">
                        <h3 class="text-uppercase">{{ Settings()->website_name }}</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Date: <span>{{ Settings()->created_at->format('M d Y') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-10 col-lg-10 col-xl-10 m-b-20">
                    <h4>Contact Details
                        <a class="edit-link ml-2" data-toggle="modal" href="#edit_contact_details">
                            <i class="fa fa-edit mr-1"></i>
                            Edit
                        </a>
                    </h4>
                    <ul class="list-unstyled invoice-payment-details mb-0">
                        <li>Email: <span>{{ ContactInfo()->email }}</span></li>
                        <li>Phone: <span>{{ ContactInfo()->phone }}</span></li>
                        <li>WhatsApp: <span>{{ ContactInfo()->whatsApp }}</span></li>
                        <li>Address: <span>{{ ContactInfo()->address }}</span></li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="invoice-info">
                    <h5>Other information</h5>
                    <p class="text-muted mb-0">
                        {{ ContactInfo()->contact_info_text }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Edit Details Modal -->
<div class="modal fade" id="edit_contact_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contactinfo.update', ContactInfo()->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="{{ ContactInfo()->email }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" value="{{ ContactInfo()->phone }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input name="whatsApp" type="text" class="form-control" value="{{ ContactInfo()->whatsApp }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="form-title">
                                <span>Address</span>
                            </h5>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="1">
                                    {{ ContactInfo()->address }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Other information</label>
                                <textarea class="form-control" name="contact_info_text" id="contact_info_text" cols="30" rows="2">
                                    {{ ContactInfo()->contact_info_text }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->



@endsection
