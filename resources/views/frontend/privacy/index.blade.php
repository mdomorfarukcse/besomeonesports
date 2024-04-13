@extends('layouts.frontend.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Privacy Policy'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        / Custom CSS Here /
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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Privacy Policy') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Privacy Policy') }}</li>
@endsection

@section('content')

    <!-- Start row -->
    <section class="float-start w-100 body-part sub-headh-bask pt-0">
        <div class="contact-page d-inline-block w-100">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 g-5">
                    <div class="col-md-12">
                        <div class="privacy">
                            <h2><strong>PRIVACY POLICY</strong></h2>

                            <p>Privacy Policy ("Policy") is for Be Someone Sports, located in Friendswood, Texas 77546,
                            and outlines how we collect, use, and protect your personal information. By using our website,
                            you agree to the terms of this Policy.</p> 

                            <h3><strong>COLLECTION OF YOUR PERSONAL INFORMATION</strong></h3>

                            <p>We collect personal information such as your name, email address, home or work address,
                            telephone number, and demographic information (e.g., zip code, age, gender, preferences,
                            sport_of_interests) when you interact with our website. Additionally, we automatically collect
                            information about your computer hardware and software, including your IP address, browser type,
                            domain names, access times, and referring website addresses. This data helps us operate our
                            service, maintain its quality, and analyze usage statistics.</p>

                            <p>Please note that if you voluntarily disclose personally identifiable information on our public
                            message boards, it may be collected and used by others. We are not responsible for your private
                            online communications.</p>

                            <p>We encourage you to review the privacy policies of websites linked from our site, as we are not
                            responsible for their practices.</p>

                            <h3><strong>USE OF YOUR PERSONAL INFORMATION</strong></h3>

                            <p>We use your personal information to operate our website and provide requested services. We may
                            also use your information to inform you about our products, services, or conduct surveys to
                            gather your opinions about our services.</p>

                            <p>We may share your information with trusted partners for purposes such as statistical analysis,
                            email communication, customer support, or deliveries. These partners are obligated to maintain
                            the confidentiality of your information.</p>

                            <p>We track website and page visits to determine popular services and provide customized content
                            and advertising to users interested in specific topics.</p>

                            <p>We will disclose your personal information if required by law or when we believe it is necessary
                            to protect our rights, property, or the safety of our users or the public.</p>

                            <h3><strong>USE OF COOKIES</strong></h3>

                            <p>We use cookies to enhance your online experience. Cookies are text files placed on your
                            computer's hard disk by a web server. They are used to save your preferences and information to
                            simplify future visits. You can choose to accept or decline cookies, although declining them may
                            limit your access to interactive features on our website.</p>

                            <h3><strong>SECURITY OF YOUR PERSONAL INFORMATION</strong></h3>

                            <p>We take measures to secure your personal information from unauthorized access, use, or
                            disclosure. Personal information is stored on secure servers and transmitted using encryption
                            protocols when necessary.</p>

                            <h3><strong>CHANGES TO THIS POLICY</strong></h3>

                            <p>We may update this Policy to reflect company and customer feedback. Please check this Policy
                            periodically for updates. Your continued use of our website after changes are made constitutes
                            acceptance of the updated Policy.</p>

                            <h3><strong>CONTACT INFORMATION</strong></h3>

                            <p>If you believe we have not adhered to this Policy or have questions about our privacy practices,
                            please contact us at Info@BeSomeoneSports.com.</p>

                            <h3><strong>Texas Residents</strong></h3>

                            <p>Texas residents have certain rights, including the right to request information about personal
                            information shared with third parties for direct marketing purposes. To make such a request or
                            request the removal of content or information posted on our website, please contact us at
                            Info@BeSomeoneSports.com.</p>
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
