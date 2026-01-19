@extends('layouts.app')
@section('title','Photo Gallery | Radiology Services')
@section('content')
 <!-- start section -->
         <section class="sm-mb-50px bg-dark-gray"  data-parallax-background-ratio="0.5" style="background-image: url({{asset('assets/images/radiology_about_bg.jpg')}}); height:350px; background-size: contain !important;"></section>
        <!-- end section -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 overlap-section text-center">
                        <div class="p-10 box-shadow-extra-large border-radius-4px bg-white text-center">
                            <h3 class="alt-font text-dark-gray ls-minus-1px fw-600 mb-15px">Photo Gallery</h3>

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
                        @if(empty($files))
    <div class="text-center py-5">
      <p class="text-muted">No images found</p>
    </div>
  @else
    <div class="row g-3">
      @foreach($files as $index => $file)
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
          <div class="card h-100">
            <a href="{{ $file }}" data-lightbox="image-{{$index}}" data-title="{{ basename($file) }}"><img
              src="{{ $file }}"
              class="card-img-top"
              style="height: 180px; object-fit: cover;"
              alt="{{ basename($file) }}"
              loading="lazy"
            ></a>


          </div>
        </div>
      @endforeach
    </div>
  @endif
                    </div>
                </div>
        </section>
        <!-- end section -->
@endsection
@push('scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js"></script>

    <script>
        lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'alwaysShowNavOnTouchDevices':true,
        'fitImagesInViewport':true
        })
    </script>
@endpush

