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
                            <h2>*PRIVACY POLICY*</h2>

                            <p>Privacy Policy ("Policy") is for Be Someone Sports, located in Friendswood, Texas 77546,
                            and outlines how we collect, use, and protect your personal information. By using our website,
                            you agree to the terms of this Policy.</p> 

                            <h3>*COLLECTION OF YOUR PERSONAL INFORMATION*</h3>

                            <p>We collect personal information such as your name, email address, home or work address,
                            telephone number, and demographic information (e.g., zip code, age, gender, preferences,
                            interests) when you interact with our website. Additionally, we automatically collect
                            information about your computer hardware and software, including your IP address, browser type,
                            domain names, access times, and referring website addresses. This data helps us operate our
                            service, maintain its quality, and analyze usage statistics.</p>

                            <p>Please note that if you voluntarily disclose personally identifiable information on our public
                            message boards, it may be collected and used by others. We are not responsible for your private
                            online communications.</p>

                            <p>We encourage you to review the privacy policies of websites linked from our site, as we are not
                            responsible for their practices.</p>

                            <h3>*USE OF YOUR PERSONAL INFORMATION*</h3>

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

                            <h3>*USE OF COOKIES*</h3>

                            <p>We use cookies to enhance your online experience. Cookies are text files placed on your
                            computer's hard disk by a web server. They are used to save your preferences and information to
                            simplify future visits. You can choose to accept or decline cookies, although declining them may
                            limit your access to interactive features on our website.</p>

                            <h3>*SECURITY OF YOUR PERSONAL INFORMATION*</h3>

                            <p>We take measures to secure your personal information from unauthorized access, use, or
                            disclosure. Personal information is stored on secure servers and transmitted using encryption
                            protocols when necessary.</p>

                            <h3>*CHANGES TO THIS POLICY*</h3>

                            <p>We may update this Policy to reflect company and customer feedback. Please check this Policy
                            periodically for updates. Your continued use of our website after changes are made constitutes
                            acceptance of the updated Policy.</p>

                            <h3>*CONTACT INFORMATION*</h3>

                            <p>If you believe we have not adhered to this Policy or have questions about our privacy practices,
                            please contact us at Info@BeSomeoneSports.com.</p>

                            <h3>*Texas Residents*</h3>

                            <p>Texas residents have certain rights, including the right to request information about personal
                            information shared with third parties for direct marketing purposes. To make such a request or
                            request the removal of content or information posted on our website, please contact us at
                            Info@BeSomeoneSports.com.</p>
                        </div>
                    </div>
                </div>

                <div class="location-div01 d-inline-block w-100">
                    <div class="mindle-heading text-center">
                        <h5>Map</h5>
                        <h1>Office <span> Location </span></h1>
                    </div>
                    <span class="bgi-text light-tsext01"> Map </span>

                    <iframe class="w-100 mt-5"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d444897.3091659081!2d-95.2459789!3d29.4065695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640859fbe88c531%3A0x32451695f313c938!2sBe%20Someone%20Sports-%20Youth%20Sports%20%7C%20Youth%20Basketball%20%7C%20Youth%20Volleyball%20%7C%20AAU%20Tournaments!5e0!3m2!1sen!2sbd!4v1691411696578!5m2!1sen!2sbd"
                        height="450" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
