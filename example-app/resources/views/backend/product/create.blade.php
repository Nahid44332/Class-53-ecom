@extends('backend.master')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Add New Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
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
                <div class="col-md-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Input Product</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ url('/admin/product/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="name" class="form-label">Product Name*</label>
                                        <input type="text" class="form-control" id="name" name="name" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="sku_code" class="form-label">Product Code*</label>
                                        <input type="text" class="form-control" id="sku_code" name="sku_code" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="cat_id" class="form-label">Select Category*</label>
                                        <select class="form-control" name="cat_id" id="cat_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach ( $categories as $category )
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="sub_cat_id" class="form-label">Select SubCategory*</label>
                                        <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                            <option selected disabled>Select Sub Category</option>
                                          @foreach ($subcategories as $subcategory)
                                              <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="qty" class="form-label">Product Quantity*</label>
                                        <input type="number" class="form-control" id="qty" name="qty" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="buying_price" class="form-label">Product Buying Price*</label>
                                        <input type="number" class="form-control" id="buying_price" name="buying_price" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regular_price" class="form-label">Product Regular Price*</label>
                                        <input type="number" class="form-control" id="regular_price" name="regular_price" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="discount_price" class="form-label">Product Discount Price (Optional)</label>
                                        <input type="number" class="form-control" id="discount_price" name="discount_price" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="product_type" class="form-label">Select Product Type*</label>
                                        <select class="form-control" name="product_type" id="product_type">
                                            <option selected disabled>Select Product Type</option>
                                            <option value="hot">Hot Product</option>
                                            <option value="regular">Regular Product</option>
                                            <option value="new">New Arrioval</option>
                                            <option value="discount">Discount Product</option>
                                        </select>
                                    </div>
                                     <div class="col-12 mb-3">
                                        <label for="description" class="form-label">Product Discription*</label>
                                        <textarea name="description" id="description" class="form-control" required></textarea>
                                    </div>
                                     <div class="col-12 mb-3">
                                        <label for="product_policy" class="form-label">Product Policy*</label>
                                        <textarea name="product_policy" id="product_policy" class="form-control" required></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="image" name="image" required />
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
