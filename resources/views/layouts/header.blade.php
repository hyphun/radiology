@php
    use App\Helpers\CacheHelper;
    $navPages = CacheHelper::getNavigationPages()->where('show_in_nav', true);
    $navPrograms = CacheHelper::getNavigationPrograms();
    $siteSettings = CacheHelper::getSiteSettings();
@endphp
        <header class="header-with-topbar">
            <!-- start header top bar -->
            <div class="header-top-bar top-bar-light bg-white disable-fixed md-border-bottom border-color-transparent-dark-very-light">
                <div class="container-fluid">
                    <div class="row h-45px align-items-center m-0">
                        <div class="col-md-6 text-center text-md-start">
                            <div class="fs-14 text-dark-gray">Our consulting experts waiting for you! <a href="{{route('contact.show')}}" class="text-base-color fw-500 text-decoration-line-bottom">Contact now</a></div>
                        </div>
                        <div class="col-6 text-end d-none d-md-flex">
                            <div class="widget fs-14 me-30px md-me-0"><a href="tel:02228899900" class="text-dark-gray"><i class="feather icon-feather-phone-call text-base-color"></i> {{$siteSettings->primary_contact}}</a></div>
                            <div class="widget fs-14 text-dark-gray d-none d-lg-inline-block"><i class="feather icon-feather-map-pin text-base-color"></i> {{$siteSettings->primary_address}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header top bar -->
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-transparent bg-transparent border-bottom border-color-transparent-white-light disable-fixed">
                <div class="container-fluid">
                    <div class="col-auto col-lg-2 me-auto">
                        <a class="navbar-brand" href="demo-consulting.html">
                            <img src="{{ asset('uploads/'.$siteSettings->site_logo) }}" data-at2x="{{ asset('uploads/'.$siteSettings->site_logo) }}" alt="" class="default-logo">
                            <img src="{{ asset('uploads/'.$siteSettings->site_logo_dark) }}" data-at2x="{{ asset('uploads/'.$siteSettings->site_logo_dark) }}" alt="" class="alt-logo">
                            <img src="{{ asset('uploads/'.$siteSettings->site_logo_mobile) }}" data-at2x="{{ asset('uploads/'.$siteSettings->site_logo_mobile) }}" alt="" class="mobile-logo">
                        </a>
                    </div>
                    <div class="col-auto col-lg-8 menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav alt-font">
                                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                                <li class="nav-item dropdown simple-dropdown">
                                    <a class="nav-link" href="{{ route('programs.index') }}">Programs</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                         @foreach($navPrograms['programs'] as $program)
                                            <li>
                                                <a href="{{ route('programs.show', $program->slug) }}">
                                                    {{ $program->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                        @if($navPrograms['total'] > count($navPrograms['programs']))
                                            <li>
                                                <a href="{{ route('programs.index') }}">
                                                    View All Programs
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="{{ route('contact.show') }}" class="nav-link">Contact</a></li>
                                <li class="nav-item dropdown simple-dropdown">
                                    <a class="nav-link" href="javascript://">More</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                         @foreach($navPages as $page)
                                            <li>
                                                <a href="{{ route('pages.show', $page->slug) }}">
                                                    {{ $page->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </nav>

        </header>
        <!-- end header -->
