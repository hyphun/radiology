@extends('layouts.app')

@section('title', 'All Programs | Radiology Services')
@section('meta_description', 'Complete list of diagnostic imaging programs and services offered at our center.')

@section('content')
 <!-- start page title -->
        <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin xs-py-0" data-parallax-background-ratio="0.5" style="background-image: url({{ asset('assets/images/programs-banner.jpg') }});">
            <div class="opacity-light bg-dark-gray"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center small-screen">
                    <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-small" data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <h2 class="mb-0 text-white alt-font ls-minus-2px text-shadow-double-large fw-500">Our Programs</h2>
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


        <section class="bg-very-light-gray" id="down-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <ul class="blog-grid blog-wrapper grid-loading grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-double-extra-large" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>

                            @foreach($Programs as $program)
                                <li class="grid-item">

                                    <div class="card border-0 border-radius-4px box-shadow-medium box-shadow-extra-large-hover">
                                    <div class="blog-image">
                                        <a href="{{route('programs.show',$program->slug) }}" class="d-block"><img src="{{$program->banner_thumbnail_image_url}}" alt="{{ $program->title }}" /></a>
                                    </div>
                                    <div class="card-body p-13 md-p-11">
                                        <a href="{{route('programs.show',$program->slug) }}" class="card-title mb-15px alt-font fw-600 fs-20 text-dark-gray d-inline-block">{{ $program->title }}</a>
                                        <p>{{Str::limit($program->short_description, 200)}}</p>
                                        <div class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-16">
                                            <div class="me-auto">
                                                <span class="blog-date d-inline-block">{{$program->category->name}}</span>
                                            </div>
                                            <div class="like-count fs-15 fw-600">
                                                <a href="demo-consulting-blog-single-modern.html"><i class="fa-regular fa-heart text-base-color"></i><span class="text-dark-gray align-middle">65</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0" data-anime='{ "translate": [0, 0], "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>

                            @if(!$Programs->onFirstPage())
                            <li class="page-item {{ $Programs->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $Programs->previousPageUrl() }}"
                                {{ $Programs->onFirstPage() ? 'aria-disabled="true"' : '' }}>
                                    <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
                                    <span class="d-none d-sm-inline">Previous</span>
                                </a>
                            </li>
                            @endif
                            @if($Programs->lastPage() > 1)
                                @php
                                    $start = max(1, $Programs->currentPage() - 2);
                                    $end = min($Programs->lastPage(), $Programs->currentPage() + 2);
                                @endphp

                                @if($start > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $Programs->url(1) }}">1</a>
                                    </li>
                                    @if($start > 2)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $Programs->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $Programs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Last page (if not visible) --}}
                                @if($end < $Programs->lastPage())
                                    @if($end < $Programs->lastPage() - 1)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $Programs->url($Programs->lastPage()) }}">{{ $Programs->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif

                            @if($Programs->hasMorePages())
                            <li class="page-item {{ $Programs->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $Programs->nextPageUrl() }}"
                                {{ $Programs->hasMorePages() ? '' : 'aria-disabled="true"' }}>
                                    <span class="d-none d-sm-inline">Next</span>
                                    <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
@endsection
