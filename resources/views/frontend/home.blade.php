@extends('layouts.app')
@section('title', $homePage?->meta_title ?? 'Advanced Radiology Services | Narnaund')
@section('meta_description', $homePage?->meta_description ?? 'State-of-the-art diagnostic imaging services in Narnaund, Haryana.')

@push('meta')

@endpush

@section('content')
        <!-- start section -->
        <section class="p-0 bg-dark-gray">
            <div class="swiper full-screen bg-dark-gray ipad-top-space-margin md-h-600px sm-h-500px swiper-number-pagination-style-02 magic-cursor light magic-cursor-vertical lg-no-parallax" data-slider-options='{ "slidesPerView": 1, "direction": "horizontal", "loop": true, "parallax": true, "speed": 1000, "pagination": { "el": ".swiper-number", "clickable": true }, "autoplay": { "delay": 40000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1199": { "direction": "vertical" }}, "effect": "slide" }' data-number-pagination="1">
                <div class="swiper-wrapper">

                    @if($sliders)
                        @forelse ($sliders as $slider)

                            <div class="swiper-slide overflow-hidden">
                        <div class="cover-background position-absolute top-0 start-0 w-100 h-100" data-swiper-parallax="500" style="background-image:url('{{asset($slider->image_url)}}');">
                            <div class="opacity-light bg-dark-gray"></div>
                            <div class="container h-100">
                                <div class="row align-items-center h-100 justify-content-center">
                                    <div class="col-md-10 position-relative text-white d-flex flex-column justify-content-center h-100 text-center">
                                        <div class="alt-font fs-110 xs-fs-80 lh-100 mb-5 xs-mb-35px ls-minus-4px xs-ls-minus-2px text-shadow-double-large transform-origin-right" data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                                            <span class="d-inline-block">{{$slider->title}}</span>
                                        </div>
                                        <div  data-anime='{  "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                            <a href="{{$slider->cta_url}}" class="btn btn-base-color btn-box-shadow btn-large btn-round-edge">{{$slider->cta_text}}</a>
                                        </div>
                                        <div data-anime='{ "opacity": [0, 1], "duration": 500, "delay": 1000, "easing": "easeOutQuad" }' class="fs-20 alt-font position-absolute lg-position-relative left-0px right-0px bottom-0 mb-8 lg-mt-40px lg-mb-0 sm-mt-25px w-100 text-shadow-double-large">{{$slider->subtitle}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        @empty
                        @endforelse
                    @endif



                </div>
                <!-- start slider pagination -->
                <div class="swiper-pagination container swiper-pagination-clickable swiper-pagination-bullets-right swiper-number"></div>
                <!-- end slider pagination -->
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="position-relative overflow-hidden">
            <div id="particles-01" data-particle="true" data-particle-options='{"particles": {"number": {"value": 5,"density": {"enable": true,"value_area": 1000}},"color":{"value":["#b7b9be", "#dd6531"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 0.5,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"move": {"enable": true,"speed":2,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}' class="position-absolute h-100 top-0 left-0 z-index-minus-1"></div>
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center" data-anime='{ "el": "childs", "rotateZ": [5, 0], "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 mb-50px sm-mb-40px">
                        <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <img src="{{asset('assets/images/icon-01.webp')}}" alt=""/>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-600 mb-5px fs-20">{{$introBoxes->get(0)->title}}</span>
                                <p class="w-90 md-w-100">{{$introBoxes->get(0)->description}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 mb-50px sm-mb-40px">
                        <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <img src="{{asset('assets/images/icon-02.webp')}}" alt=""/>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-600 mb-5px fs-20">{{$introBoxes->get(1)->title}}</span>
                                <p class="w-90 md-w-100">{{$introBoxes->get(1)->description}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-01 mb-50px sm-mb-40px">
                        <div class="feature-box feature-box-left-icon last-paragraph-no-margin">
                            <div class="feature-box-icon">
                                <img src="{{asset('assets/images/icon-03.webp')}}" alt=""/>
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-600 mb-5px fs-20">{{$introBoxes->get(2)->title}}</span>
                                <p class="w-90 md-w-100">{{$introBoxes->get(2)->description}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                </div>

            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="bg-gradient-very-light-gray ps-7 pe-7 xxl-ps-3 xxl-pe-3 xs-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-5 col-lg-7 col-md-8 text-center" data-anime='{ "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <span class="fw-600 ls-1px fs-16 alt-font d-inline-block text-uppercase mb-5px text-base-color">Cutting Age Programs</span>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-2px">Radiology Programs</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-xl-4 row-cols-md-2 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        @if($programs)
                            @forelse($programs as $program)
                                 <div class="col interactive-banner-style-05 lg-mb-30px position-relative z-index-1">
                        <div class="atropos" data-atropos data-atropos-perspective="1450">
                            <a href="{{route('programs.show',$program->slug)}}" class="position-absolute z-index-1 top-0px left-0px h-100 w-100"></a>
                            <div class="atropos-scale">
                                <div class="atropos-rotate">
                                    <div class="atropos-inner">
                                        <figure class="m-0 hover-box border-radius-4px overflow-hidden position-relative" data-atropos-offset="3">
                                            <img class="w-100" src="{{asset($program->banner_thumbnail_image_url)}}" alt="" />
                                            <figcaption class="d-flex flex-column align-items-start justify-content-center position-absolute left-0px top-0px w-100 h-100 z-index-1 p-15 xl-p-12 last-paragraph-no-margin">
                                                <div class="mb-auto bg-base-color fw-500 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-13">{{$program->category->name}}</div>
                                                <span class="alt-font text-white fw-500 fs-26 sm-lh-26 xs-lh-28 sm-mb-5px">{{$program->title}}</span>
                                                <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-gray-light-dark-transparent z-index-minus-1 opacity-9"></div>
                                                <div class="box-overlay bg-gradient-gray-light-dark-transparent z-index-minus-1"></div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @empty
                            @endforelse
                        @endif


                </div>
            </div>
        </section>


        <!-- start section -->
        <section class="position-relative">
            <div id="particles-03" data-particle="true" data-particle-options='{"particles": {"number": {"value": 5,"density": {"enable": true,"value_area": 1000}},"color":{"value":["#b7b9be", "#dd6531"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 0.5,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"move": {"enable": true,"speed":2,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}' class="position-absolute h-100 top-0 left-0 z-index-minus-1"></div>
            <div class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-7 text-center" data-anime='{  "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <span class="fw-600 ls-1px fs-16 alt-font mb-5px d-inline-block text-uppercase text-base-color">Meet our people</span>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-2px">Radiology experts</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 800, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                @forelse($teams as $team)


                    <!-- start team member item -->
                    <div class="col text-center team-style-05 md-mb-40px">
                        <div class="position-relative border-radius-4px overflow-hidden mb-30px last-paragraph-no-margin">
                            <img src="{{asset($team->image_url)}}" alt="" />
                            <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-40px lg-p-30px team-content bg-gradient-dark-orange-transparent">
                                <div class="social-icon fs-20">
                                    <a href="{{$team->facebook_profile_url}}" target="_blank" class="text-white"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="{{$team->linkedin_profile_url}}" target="_blank" class="text-white"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="{{$team->twitter_profile_url}}" target="_blank" class="text-white"><i class="fa-brands fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="alt-font fw-600 text-dark-gray lh-22 fs-18">{{$team->name}}</div>
                        <span>{{$team->designation}}</span>
                    </div>



                @empty
                @endforelse
                </div>

            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="pt-4 pb-4 cover-background" style="background-image:url('{{asset('assets/images/bottom-cta-bg.jpg')}}');">
            <div class="opacity-extra-medium bg-gradient-black-dark-orange"></div>
            <div class="container position-relative">
                <div class="row align-items-center justify-content-center text-start text-sm-center text-lg-start">
                    <div class="col-xl-5 col-lg-6 col-md-7 md-mb-25px">
                        <h2 class="alt-font text-white fw-500 mb-0 cd-headline zoom fancy-text-style-4 text-shadow-double-large ls-minus-1px">Let's discuss your
                            <span data-fancy-text='{ "effect": "rotate", "string": ["Journey", "Opportunity", "Career","Profession","Credential"] }'></span>
                        </h2>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 offset-xl-1 icon-with-text-style-08">
                        <div class="feature-box feature-box-left-icon-middle text-start">
                            <div class="feature-box-icon feature-box-icon-rounded w-110px h-110px xs-w-80px xs-h-80px rounded-circle bg-base-color me-20px xs-me-15px">
                                <i class="line-icon-Handshake icon-extra-large text-white lh-100"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin xs-mt-15px xs-mb-15px">
                                <span class="fs-24 lh-32 xs-fs-22 xs-lh-32 text-white">Looking for collaboration? <a href="mailto:info@yourdomain.com" class="text-decoration-line-bottom text-white fw-500">{{$siteSetting->primary_contact}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection

@push('scripts')
@endpush
