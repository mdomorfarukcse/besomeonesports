@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Product'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Tagsinput css -->
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .product-id .input-group-text {
        border: 0px solid #d4d8de;
        background: #f7faff;
        color: #111;
        padding-right: 0;
        font-weight: bold;
    }
    .product-id .input-group .form-control[readonly] {
        padding-left: 0;
    }

    /* Image Upload */
    .file-area {
        width: 100%;
        position: relative;
    }
    .file-area input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        cursor: pointer;
    }
    .file-area .file-dummy {
        width: 100%;
        padding: 30px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px dashed rgba(255, 255, 255, 0.2);
        text-align: center;
        transition: background 0.3s ease-in-out;
    }
    .file-area .file-dummy .success {
        display: none;
    }
    .file-area:hover .file-dummy {
        background: rgba(255, 255, 255, 0.1);
    }

    .file-area input[type="file"]:valid + .file-dummy .success {
        display: inline-block;
    }
    .file-area input[type="file"]:valid + .file-dummy .default {
        display: none;
    }
    .file-uploader {
		padding: 30px 30px 50px;
		height: 30px;
		background: #f0f0ff;
		cursor: pointer;
	}
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Update Product') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Shop') }}</li>
    <li class="breadcrumb-item text-capitalize">{{ __('Products') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.shop.product.index') }}">{{ __('All Products') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.shop.product.show', ['product' => $product]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Update Product') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.shop.product.show', ['product' => $product]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection



@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.shop.product.update', ['product' => $product]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card border m-b-30">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Update Product</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-image-upload form-group">
                                <label for="images">Upload New Product Images</label>
                                <input type="file" accept="image/jpeg,image/png,image/gif" multiple id="images" name="images[]" class="form-control file-uploader" placeholder="Ex: Upload Images">
                                @error('images[]')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="categories[]">Categories <span class="required">*</span></label>
                            <select class="select2-multi-select form-control @error('categories[]') is-invalid @enderror" name="categories[]" multiple="multiple" required>
                                <option value="" disabled>Select Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($product->categories->contains('id', $category->id))>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categories[]')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Product Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Be Someone Sports Hoodie Fire & Ice" required/>
                            @error('name')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="colors">Colors <span class="required">*</span></label>
                            <select name="colors[]" id="colors" class="form-control @error('colors') is-invalid @enderror" multiple="multiple">
                                @foreach (json_decode($product->colors) as $selectedColor)
                                    <option value="{{ $selectedColor }}" selected>{{ $selectedColor }}</option>
                                @endforeach
                            </select>
                            @error('colors')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sizes">Sizes <span class="required">*</span></label>
                            <select name="sizes[]" id="sizes" class="form-control @error('sizes') is-invalid @enderror" multiple="multiple">
                                @foreach (json_decode($product->sizes) as $selectedSize)
                                    <option value="{{ $selectedSize }}" selected>{{ $selectedSize }}</option>
                                @endforeach
                            </select>
                            @error('sizes')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="quantity">Quantity <span class="required">*</span></label>
                            <input type="number" min="0" step="1" name="quantity" value="{{ $product->quantity }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="200" required/>
                            @error('quantity')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="purchase_price">Purchase Price <span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="purchase_price" value="{{ $product->purchase_price }}" class="form-control @error('purchase_price') is-invalid @enderror" placeholder="199" required/>
                                @error('purchase_price')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="price">Selling Price <span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="price" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror" placeholder="599" required/>
                                @error('price')
                                    <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status <span class="required">*</span></label>
                            <select class="select2-single form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="" disabled>Select Status</option>
                                <option value="Active" @selected($product->status === 'Active')>Active</option>
                                <option value="Inactive" @selected($product->status === 'Inactive')>Inactive</option>
                            </select>
                            @error('status')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description <span class="required">*</span></label>
                            <textarea name="description" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="Description">{!! $product->description !!}</textarea>
                            @error('description')
                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update Product</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- End Row -->
@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <!-- Tagsinput js -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script> 
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Apply Select2 to the colors input field
        $(document).ready(function() {
            $('#colors').select2({
                tags: true, // Allow creating new tags
                tokenSeparators: [','], // Allow multiple tags separated by commas
            });
            $('#sizes').select2({
                tags: true, // Allow creating new tags
                tokenSeparators: [','], // Allow multiple tags separated by commas
            });
        });
    </script>
@endsection
