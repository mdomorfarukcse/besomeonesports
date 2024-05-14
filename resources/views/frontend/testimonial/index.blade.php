@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Testimonials'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        /* Custom CSS Here */
        .privacy p {
            margin-top: 10px;
        }

        .privacy h2,
        .privacy h3 {
            margin-bottom: 25px;
            margin-top: 25px;
        }

        .privacy {
            line-height: 22px;
        }
        .body-part{
            background: linear-gradient(112.1deg, rgb(32, 38, 57) 11.4%, rgb(57 70 113) 70.2%);
        }
        .sub-headh-bask .mindle-heading h1 {
            color: #fff;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Testimonials') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Testimonials') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part sub-headh-bask pt-0">
        <div class="contact-page d-inline-block w-100">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 g-5">
                    <div class="col-md-12">
                        <div class="privacy">
                            <div class="mindle-heading text-center mb-3">
                                <h5>Feedback</h5>
                                <h1>Client <span> *Testimonials* </span></h1>
                            </div>
                            <iframe
                                id="iframe-015"
                                frameborder="0"
                                sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-presentation allow-top-navigation"
                                src='javascript: window.frameElement.getAttribute("srcdoc");'
                                srcdoc='<script>window.onmessage = function(event) {event.source.postMessage({iframeId: event.data, scrollHeight: document.body.getBoundingClientRect().height || document.body.scrollHeight}, event.origin);};</script><body style=&apos;margin: 0&apos;><div class="nj-badge" ></div>
                            <script type="text/javascript" src="https://cdn.nicejob.co/js/sdk.min.js?id=6577517013499904" defer></script>

                            <div class="nj-stories" ></div>
                            <script type="text/javascript" src="https://cdn.nicejob.co/js/sdk.min.js?id=6577517013499904" defer></script>
                            </body>'
                                style="width: 100%; overflow: visible; transition: height 1.5s ease 0s; height: 1626px;"
                            ></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
