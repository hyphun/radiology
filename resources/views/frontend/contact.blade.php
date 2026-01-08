@extends('layouts.app')
@section('title', 'Contact Us | Radiology Services')
@section('content')
 <!-- start page title -->
        <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin xs-py-0" data-parallax-background-ratio="0.5" style="background-image: url({{ asset('assets/images/contact-bg.jpg') }});">
            <div class="opacity-light bg-dark-gray"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center small-screen">
                    <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-small" data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <h1 class="mb-5px alt-font text-white fw-400"><span class="opacity-6">Love to hear from you</span></h1>
                        <h2 class="mb-0 text-white alt-font ls-minus-2px text-shadow-double-large fw-500">Contact us</h2>
                    </div>
                    <div class="down-section text-center" data-anime='{ "translateY": [100, 0], "opacity": [0,1], "easing": "easeOutQuad" }'>
                        <a href="#down-section" class="section-link">
                            <div class="fs-30 sm-fs-32 text-white">
                                <i class="bi bi-mouse"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        @php
            use App\Helpers\CacheHelper;
            $siteSettings = CacheHelper::getSiteSettings();
        @endphp
        <section id="down-section">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 sm-mb-40px">
                        <div class="feature-box last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Geo2-Love icon-extra-large text-base-color mb-25px"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Our office</span>
                                <p>{!!$siteSettings->address!!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 sm-mb-40px">
                        <div class="feature-box last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Headset icon-extra-large text-base-color mb-25px"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Call Us</span>
                                <div class="w-100 d-block">
                                    {!!$siteSettings->phone!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04">
                        <div class="feature-box last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <i class="line-icon-Mail-Read icon-extra-large text-base-color mb-25px"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">E-mail Us</span>
                                <div class="w-100 d-block">
                                    {!!$siteSettings->email!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="p-0" id="location" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 p-0">
                        <div id="map" class="map">

                            {!! $siteSettings->map_embed_code !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center mb-2" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <span class="fw-600 ls-1px fs-16 alt-font d-inline-block text-uppercase mb-5px text-base-color">Feel free to get in touch!</span>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-2px">How we can help you?</h2>
                    </div>
                </div>
                <div class="row row-cols-md-1 justify-content-center" data-anime='{ "translateY": [100, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                    <div class="col-xl-9 col-lg-11">
                        <!-- start contact form -->
                        <form action="{{ route('contact.submit') }}" method="post" class="row contact-form-style-02">
                            @csrf
                            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" style="display: none">
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <div class="col-md-6 mb-30px">
                                <input class="box-shadow-quadruple-large input-name form-control required" type="text" name="name" value="{{ old('name') }}" placeholder="Your name*" required />
                                @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-30px">
                                <input class="box-shadow-quadruple-large form-control required" required type="email" name="email" value="{{ old('email') }}" placeholder="Your email address*" />
                                @error('email') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-30px">
                                <input class="box-shadow-quadruple-large form-control required" type="tel" required name="phone" value="{{ old('phone') }}" placeholder="Your phone" />
                                @error('phone') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-30px">
                                <input class="box-shadow-quadruple-large form-control required" type="text" required name="subject" value="{{ old('subject') }}" placeholder="Your subject" />
                                @error('subject') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror

                            </div>
                            <div class="col-md-12 mb-30px">
                                <textarea required class="box-shadow-quadruple-large form-control required" cols="40" rows="4" name="message" value="{{ old('message') }}" placeholder="Your message"></textarea>
                                @error('message') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-7 last-paragraph-no-margin">
                                <p class="text-center text-md-start fs-16">We are committed to protecting your privacy. We will never collect information about you without your explicit consent.</p>
                            </div>
                            <div class="col-md-5 text-center text-md-end sm-mt-20px">
                                <input type="hidden" name="redirect" value="">
                                <input class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge submit" type="submit">
                                @error('recaptcha_token') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror


                            </div>
                            <div class="col-12">
                                <div class="form-results mt-20px">
                                    @if(session('success'))
                                        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!-- end contact form -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
         <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha.site_key') }}"></script>
        <script>
        grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('app.recaptcha.site_key') }}').then(function(token) {
            document.getElementById('recaptcha_token').value = token;
        });
    })
    </script>
    <style>
        .text-red-600{color:red;}
        .text-green-800{color:green;}
        .map iframe {
            width: 100%;
            max-width: 100%;
        }
    </style>
@endsection


