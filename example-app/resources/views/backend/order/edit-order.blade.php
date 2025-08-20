@extends('backend.master')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!--begin::Col-->
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Customer Info</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Invoice No*</label>
                                        <input type="text" class="form-control" value="XYZ-1" id="name"
                                            name="name" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Customer Name*</label>
                                        <input type="text" class="form-control" value="Developer" id="name"
                                            name="name" required />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Customer Phone*</label>
                                        <input type="text" class="form-control" value="018XXXXXXXX" id="name"
                                            name="name" required />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Delivery Charge*</label>
                                        <input type="text" class="form-control" value="80" id="name"
                                            name="name" required />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Customer Address*</label>
                                        <textarea class="form-control" name="address" id="address">Dhaka</textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label">Courier*</label>
                                        <select name="courier_name" class="form-control">
                                            <option selected disabled>Select Courier</option>
                                            <option value="Steadfast">Steadfast</option>
                                            <option value="Pathao">Pathao</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--end::Form-->
                        </div>
                        <!--end::Quick Example-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Product Info</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" value="Phone" id="name"
                                            name="name" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                        <input type="text" class="form-control" value="4" id="name"
                                            name="name" />
                                    </div>
                                     <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Product Color</label>
                                        <input type="text" class="form-control" value="Black" id="name"
                                            name="name" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Product Size</label>
                                        <input type="text" class="form-control" value="L, M" id="name"
                                            name="name" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Total Price</label>
                                        <input type="text" class="form-control" value="1200" id="name"
                                            name="name" />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <p class="form-lavel"><b>product Image</b></p>
                                        <img src="https://placehold.co/100x100" alt="">
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Order</button>
                            </div>
                            <!--end::Footer-->
                            <!--end::Form-->
                        </div>
                        <!--end::Quick Example-->
                    </div>
                </form>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
