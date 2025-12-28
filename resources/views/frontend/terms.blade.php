@extends('layouts.app')
@section('title', $page->title . ' | Radiology Services')
@section('content')
 <!-- start section -->
        <section class="sm-mb-50px bg-dark-gray"  data-parallax-background-ratio="0.5" style="background-image: url({{$page->banner_image_url}}); height:350px; background-size: contain !important;"></section>
        <!-- end section -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 overlap-section text-center">
                        <div class="p-10 box-shadow-extra-large border-radius-4px bg-white text-center">
                            <h3 class="alt-font text-dark-gray ls-minus-1px fw-600 mb-15px">{{$page->title}}</h3>

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
                            {!! $page->content!!}
                        </p>
                    </div>
                </div>
        </section>
        <!-- end section -->
@endsection

