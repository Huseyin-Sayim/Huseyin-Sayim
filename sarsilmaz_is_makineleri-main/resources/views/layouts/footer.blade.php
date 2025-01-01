<!--==================================================-->
<!-- Start Hendre Footer Section  -->
<!--==================================================-->

<div class="footer-section py-5">
    <div class="container">
        <div class="row footer-bg">
            <div class="col-lg-3 col-md-6">
                <div class="widget widgets-company-info">
                    <div class="dreamhub-logo">
                        <a class="logo_thumb" href="index.html" title="dreamhub">
                            <img class="img-fluid" src="{{ asset('admin/images/logo_sarsilmaz.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="company-info-desc">
                       <p>
                           İş makineleriniz için güvenilir çözümler sunuyoruz. Tamir, bakım, onarım, yedek parça temini, hidrolik sistem onarımı ve forklift kiralama hizmetlerimizle her zaman yanınızdayız.
                       </p>
                    </div>
                    <div class="follow-company-icon">
                        @foreach($phone as $item)
                            <span class="d-block text-light mb-1"> <i class="fas fa-phone-square-alt fs-5"></i> {{ $item->value }} </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pl-40">
                <div class="widget widget-nav-menu">
                    <h4 class="widget-title">Hizmetlerimiz</h4>
                    <div class="menu-quick-link-content">
                        <ul class="footer-menu">
                            @foreach($services as $item)
                                <li><a href="{{ route('services.details', [$item->id]) }}"> {{ $item->service_title }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-nav-menu">
                    <h4 class="widget-title"> Sayfalar </h4>
                    <div class="menu-quick-link-content">
                        <ul class="footer-menu">
                            <li><a href="{{ route("about") }}"> Hakkımızda </a></li>
                            <li><a href="{{ route("blogs") }}"> Blog </a></li>
                            <li><a href="{{ route("front.gallery") }}"> Blog </a></li>
                            <li><a href="{{ route("contact") }}"> İletişim </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pr-0">
                <div class="menu-quick-link-contact">
                    <!-- widget title -->
                    <h4 class="widget-title"> Çalışma Saatleri </h4>
                    <!-- company contact info -->
                    <div class="company-work-hour">
                        <ul>
                            <li>Pzrt. - Cuma <span class="table-text">8.00 - 18.00</span></li>
                            <li>Saturday <span>9.00 - 17:00</span></li>
                            <li class="table-brb">Pazar <span>Kapalı</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-bottom-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                        <p>Copyright © {{date("Y")}} <span><a class="text-danger"  target="_blank" href="https://metgesoft.com">Metgesoft</a></span>. Tüm hakları saklıdır.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-menu text-right">
                    <ul>
                       {{-- <li><a href="#">Terms Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!-- End Hendre Footer Section  -->
<!--==================================================-->

<!--==================================================-->
<!-- Start scrollup section Section -->
<!--==================================================-->
<!-- scrollup section -->
<div class="scroll-area">
    <div class="top-wrap">
        <div class="go-top-btn-wraper">
            <div class="go-top go-top-button">
                <i class="bi bi-chevron-double-up"></i>
                <i class="bi bi-chevron-double-up"></i>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- Start scrollup section Section -->
<!--==================================================-->

<script src="{{ asset('assets/js/vendor/jquery-3.6.2.min.js') }}"></script>

<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

<script src="{{ asset('assets/js/wow.js') }}"></script>

<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

<script src="{{ asset('venobox/venobox.js') }}"></script>

<script src="{{ asset('assets/js/animated-text.js') }}"></script>

<script src="{{ asset('venobox/venobox.min.js') }}"></script>

<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>

<script src="{{ asset('assets/js/jquery.scrollUp.js') }}"></script>

<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

<script src="{{ asset('assets/js/theme.js') }}"></script>

</body>

</html>
