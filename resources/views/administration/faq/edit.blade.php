@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Update Faq'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Update Faq') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize">{{ __('Faqs') }}</li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.faq.index') }}">{{ __('All Faqs') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize">
        <a href="{{ route('administration.faq.show', ['faq' => $faq]) }}">{{ __('Show Details') }}</a>
    </li>
    <li class="breadcrumb-item text-capitalize active">{{ __('Edit faq') }}</li>
@endsection


@section('breadcrumb_buttons')
    <a href="{{ route('administration.faq.show', ['faq' => $faq]) }}" class="btn btn-outline-dark btn-outline-custom fw-bolder">
        <i class="feather icon-arrow-left"></i>
        <b>Back</b>
    </a>
@endsection


@section('content')


<!-- Start Row -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('administration.faq.update', ['faq' => $faq]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border m-b-30">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Update Faq</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{ $faq->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tennies" required/>
                                            @error('name')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="5" id="textarea_editor" class="form-control @error('note') is-invalid @enderror" placeholder="Note">{{ $faq->description }}</textarea>
                                            @error('description')
                                                <b class="text-danger"><i class="feather icon-info mr-1"></i>{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-outline-custom float-right">
                        <i class="feather icon-plus mr-1"></i>
                        <span class="text-bold">Update faq</span>
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
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>
    <!-- Wysiwig js -->
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Apply Select2 to the rounds input field
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea#textarea_editor",
                theme: "modern",
                height:320,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        });
    </script>
@endsection
