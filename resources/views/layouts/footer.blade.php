 @php
    use App\Helpers\CacheHelper;
    $siteSettings = CacheHelper::getSiteSettings();
@endphp
 <!-- start footer -->
        <footer class="footer-light p-0 position-relative">
            <div id="particles-04" class="position-absolute h-100 top-0 left-0 z-index-minus-1 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 5,"density": {"enable": true,"value_area": 1000}},"color":{"value":["#b7b9be", "#dd6531"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 0.5,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"move": {"enable": true,"speed":2,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
            <div class="container">
                <div class="row justify-content-center pt-7 sm-pt-50px">
                    <!-- start footer column -->
                    <div class="col-7 col-lg-3 col-md-12 col-sm-6 text-md-center text-lg-start md-mb-30px">
                        <a href="demo-consulting.html" class="footer-logo mb-15px md-mb-20px d-inline-block"><img src="images/demo-consulting-logo-black.png" data-at2x="images/demo-consulting-logo-black@2x.png" alt=""></a>
                        <p class="mb-20px">{{ $siteSettings->footer_bio }}</p>
                        <div class="elements-social social-icon-style-02">
                            <ul class="medium-icon dark icon-with-animation">
                                <li><a class="facebook" href="{{ $siteSettings->facebook_profile }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a class="linkedin" href="{{ $siteSettings->linkedin_profile }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a class="twitter" href="{{ $siteSettings->twitter_profile }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-5 col-lg-2 offset-xl-1 col-md-3 col-sm-6 md-mb-30px">
                        <span class="alt-font d-block text-dark-gray fw-600 mb-10px fs-19">Quick Links</span>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('programs.index') }}">Programs</a></li>
                            <li><a href="{{route('contact.show')}}">Contact</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-4 col-sm-6 xs-mb-30px">
                        <span class="alt-font d-block text-dark-gray fw-600 mb-10px fs-19">More Info</span>
                        <ul>
                            <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <span class="alt-font d-block text-dark-gray fw-600 mb-10px fs-19">Get in touch</span>
                        <p class="mb-15px w-75 lg-w-85 sm-w-100">{{ $siteSettings->primary_address}}</p>
                        <p class="m-0"><span class="fw-600"><i class="feather icon-feather-phone-call text-dark-gray icon-small me-10px"></i></span><a href="tel:{{ $siteSettings->primary_contact}}">{{ $siteSettings->primary_contact}}</a></p>
                    </div>
                    <!-- end footer column -->
                </div>
                <div class="row justify-content-center align-items-center pt-5 sm-pt-30px">
                    <!-- start divider -->
                    <div class="col-12">
                        <div class="divider-style-03 divider-style-03-01 border-color-extra-medium-gray"></div>
                    </div>
                    <!-- end divider -->
                    <!-- start copyright -->
                    <div class="col-lg-6 pt-25px pb-25px md-pt-0 fs-16 last-paragraph-no-margin order-2 order-lg-1 text-center text-lg-start"><p>&copy; 2025 <a href="#" target="_blank" class="text-decoration-line-bottom text-dark-gray fw-500">Center for Radiology Education</a></p></div>
                    <!-- end copyright -->
                    <!-- start footer menu -->
                    <div class="col-lg-6 pt-25px pb-25px md-pb-5px fs-16 order-1 order-lg-2 text-center text-lg-end">
                        <a href="https://hyphun.com">Site By: Hyphun Technologies</a>
                    </div>
                    <!-- end footer menu -->
                </div>
            </div>
        </footer>
        <!-- end footer -->
         <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
          <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
          </a>
        </div>
        <!-- end scroll progress -->
