@extends('layouts.app')

@section('title', 'All Programs | Radiology Services')
@section('meta_description', 'Complete list of diagnostic imaging programs and services offered at our center.')
@section('content')

 <!-- start section -->
        <section class="one-fourth-screen sm-mb-50px bg-dark-gray"  data-parallax-background-ratio="0.5" style="background-image: url({{$program->banner_large_image_url}})"></section>
        <!-- end section -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 overlap-section text-center">
                        <div class="p-10 box-shadow-extra-large border-radius-4px bg-white text-center">
                            <a href="demo-consulting-news.html" class="btn btn-large btn-base-color btn-box-shadow fw-400 ps-20px pe-20px pt-5px pb-5px btn-round-edge-small mb-3 sm-mb-15px">{{$program->category->name}}</a>
                            <h3 class="alt-font text-dark-gray ls-minus-1px fw-600 mb-15px">{{$program->title}}</h3>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="pb-3 pt-3">
             <div class="row justify-content-center">
                    <div class="col-lg-9 dropcap-style-01" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <p class="mb-6">
                            {!! $program->description!!}
                        </p>
                        <a href="{{$program->program_url}}?ref=program_show" class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge mt-10px" style="" el="childs" staggervalue="100" easing="easeOutQuad">Enroll Now</a>
                    </div>
                </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="row justify-content-center mb-1">
                    <div class="col-lg-7 text-center">
                        <span class="fw-600 ls-1px fs-15 alt-font d-inline-block text-uppercase text-base-color">You may also like</span>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-2px">Related programs</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="blog-grid blog-wrapper grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>

                            @foreach($relatedPrograms as $related)
                                <li class="grid-item">
                                <div class="card border-0 border-radius-4px box-shadow-quadruple-large">
                                    <div class="blog-image">
                                        <a href="{{ $related->slug }}" class="d-block"><img style="min-height:244px;" src="{{ $related->banner_thumbnail_image_url }}" alt="" /></a>
                                    </div>
                                    <div class="card-body p-13 md-p-11">
                                        <a href="{{ $related->slug }}" class="card-title mb-15px alt-font fw-600 fs-20 text-dark-gray d-inline-block">{{ $related->title }}</a>
                                        <p>{{ Str::limit($related->short_description, 100)}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->



@endsection

