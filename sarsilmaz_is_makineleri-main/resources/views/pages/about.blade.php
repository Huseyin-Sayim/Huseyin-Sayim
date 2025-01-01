@extends("layouts.front")

@section("content")
    <div class="breatcam-section d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> Hakkımızda </h1>
                        <ul>
                            <li><a href="index.html"> <i class="fas fa-home"></i> Ansayfa</a></li>
                            <li> Hakkımızda </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start About Section -->
    <div class="about-section upp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-right-thumb">
                        <img src="{{ asset('assets/images/srslmz/hakkimizda.jpg') }}" alt="">
                        <div class="about-counter">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="hendre-section-title">
                        <h4>{{ $about[0]->name }}</h4>
                        <h1 class="text-capitalize">her türlü ağır iş makinesi bakım ve onarım<span> hizmetlerini sunmaktayız</span></h1>
                        <p>
                            {{ $about[0]->value }}
                        </p>
                    </div>
                    <div class="about-items">
                        <div class="about-icon">
                            <img src="assets/images/resource/about-icn.png" alt="">
                        </div>
                        <div class="about-item-content">
                            <h2 class="about-item-title">Güvenilir Hizmet</h2>
                            <p class="about-discription">İş makineleriniz için kaliteli, hızlı ve güvenilir çözümler sunarak verimliliğinizi artırıyoruz.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="about-item-list">
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Tüm tamir ve bakım işlemlerinde yüksek müşteri memnuniyeti sağlıyoruz.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Teknolojik altyapımız sayesinde hızlı ve etkili çözümler sunuyoruz.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="about-item-list">
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i>İş gücünüzün kesintiye uğramaması için esnek ve kapsamlı hizmetler sunuyoruz.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End About Section -->

    <div class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-counter-box">
                        <div class="counter-icon">
                            <img src="assets/images/resource/cntr-icon.png" alt="">
                        </div>
                        <div class="counter-content">
                            <h3 class="counter-title">1-</h3>
                            <span class="counter-text2">Teklif Oluşturma</span>
                        </div>
                        <div class="cntr-shape">
                            <img src="assets/images/resource/cntr-shap.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-counter-box">
                        <div class="counter-icon">
                            <img src="assets/images/resource/cntr-icon.png" alt="">
                        </div>
                        <div class="counter-content">
{{--                            <h3 class="counter"></h3>--}}
                            <h3 class="counter1">2-</h3>
                            <span class="counter-text2">Tamir ve Bakım</span>
                        </div>
                        <div class="cntr-shape">
                            <img src="assets/images/resource/cntr-shap.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-counter-box">
                        <div class="counter-icon">
                            <img src="assets/images/resource/cntr-icon2.png" alt="">
                        </div>
                        <div class="counter-content">
{{--                            <h3 class="counter"></h3>--}}
                            <h3 class="counter1">3-</h3>
                            <span class="counter-text2">100% Müşteri Memnuniyeti</span>
                        </div>
                        <div class="cntr-shape">
                            <img src="assets/images/resource/cntr-shap.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Testimonial Section  -->
    <div class="testimonial-section style-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hendre-section-title  padding-lg">
                        <h4> Yorumlar </h4>
                        <h1 class="sections"> Müşteri <span>Görüşlerimiz</span> </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testi-list2 owl-carousel">
                    <div class="col-lg-12">
                        <div class="teastimonial-single-box2">
                            <div class="people">
                                <img style="width: 76px;" src="{{ asset('assets/images/customer.png') }}" alt="">
                            </div>
                            <div class="people-info">
                                <h4 class="people-name">Müştreri</h4>
{{--                                <span class="user-sector">IT Manager</span>--}}
                                <div class="testi-icon2">
                                    <i class="bi bi-quote"></i>
                                </div>
                            </div>
                            <div class="testi-content">
                                <p class="testi-desc">Makinemizdeki hidrolik arızayı hızlıca tespit edip çözdüler. Yedek parça temini de çok hızlıydı. Harika bir ekip</p>
                                <div class="testi-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testi-shp">
                                <img src="assets/images/resource/dot-1.png" alt="">
                                <img class="dots" src="assets/images/resource/dot-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="teastimonial-single-box2">
                            <div class="people">
                                <img style="width: 76px;" src="{{ asset('assets/images/customer.png') }}" alt="">
                            </div>
                            <div class="people-info">
                                <h4 class="people-name">Müşteri</h4>
                                <div class="testi-icon2">
                                    <i class="bi bi-quote"></i>
                                </div>
                            </div>
                            <div class="testi-content">
                                <p class="testi-desc">Greyderimizin bakımını düzenli olarak burada yaptırıyoruz. Hem uygun fiyatlı hem de çok profesyonel bir hizmet sunuyorlar.</p>
                                <div class="testi-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testi-shp">
                                <img src="assets/images/resource/dot-1.png" alt="">
                                <img class="dots" src="assets/images/resource/dot-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="teastimonial-single-box2">
                            <div class="people">
                                <img style="width: 76px;" src="{{ asset('assets/images/customer.png') }}" alt="">
                            </div>
                            <div class="people-info">
                                <h4 class="people-name">Müşteri</h4>
                                <div class="testi-icon2">
                                    <i class="bi bi-quote"></i>
                                </div>
                            </div>
                            <div class="testi-content">
                                <p class="testi-desc">Forklift kiralama hizmetleri sayesinde işlerimizi aksatmadan devam ettirdik. Güvenilir ve ekonomik bir çözüm..</p>
                                <div class="testi-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testi-shp">
                                <img src="assets/images/resource/dot-1.png" alt="">
                                <img class="dots" src="assets/images/resource/dot-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="teastimonial-single-box2">
                            <div class="people">
                                <img style="width: 76px;" src="{{ asset('assets/images/customer.png') }}" alt="">
                            </div>
                            <div class="people-info">
                                <h4 class="people-name">Müşteri</h4>
                                <div class="testi-icon2">
                                    <i class="bi bi-quote"></i>
                                </div>
                            </div>
                            <div class="testi-content">
                                <p class="testi-desc">Transpalet tamiri için başvurduk ve sonuçtan çok memnun kaldık. İş makineleri konusunda gerçekten uzmandan hizmet almak güzel.</p>
                                <div class="testi-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testi-shp">
                                <img src="assets/images/resource/dot-1.png" alt="">
                                <img class="dots" src="assets/images/resource/dot-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Section  -->


@endsection
