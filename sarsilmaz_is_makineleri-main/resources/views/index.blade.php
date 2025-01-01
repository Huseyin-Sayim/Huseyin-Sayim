@extends("layouts.front")

@section("content")
    <!-- Start Hero Section  -->
    <div class="hero-list owl-carousel">
        <div class="hero-section d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="sero-content">
                            <h1> %100 Memnuniyet </h1>
                            <h1> Yüksek Kalite </h1>
                            <h1> <span> Sarsılmaz </span>İş Makineleri </h1>

                            <div class="hero-button">
                                <a href="about.html"> Teklif Al <i class="bi bi-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section  -->

    <!-- Start Feature Section  -->
    <div class="feature-section">
        <div class="container-fluid">
            <div class="row feature-bg align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="hendre-section-title padding-lg">
                        <h4>Profesyonel Rehberlik</h4>
                        <h1>Güncel Bilgiler ve  <span>İpuçları</span></h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-contact-info">
                        <div class="feature-ctn-icon">
                            <img src="assets/images/resource/icon.png" alt="">
                        </div>
                        <div class="feature-contact">
                            @foreach($phone as $item)
                                <h2 class="feature-phone-number">{{ $item->value }}</h2>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach($blogs as $item)
                    <div class="col-lg-4 col-md-6 ">
                        <div class="feature-single-box">
                            <div class="feature-thumb">
                                <img style="width: 100%; height: 400px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="">
                                <div class="feature-icon">
                                    <img src="assets/images/resource/feature1.png" alt="">
                                    <a class="feature-icon2" href="{{ route("blogs.detail", [$item->id]) }}"><i class="bi bi-arrow-right"></i></a>
                                </div>
                                <div class="feature-content">
                                    <h2>{{ $item->blog_title }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="feature-shape">
                    <img src="assets/images/resource/feature-shape.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature Section  -->

    <!-- Start About Section  -->
    <div class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-right-thumb">
                        <img src="{{ asset('assets/images/srslmz/hakkimizda.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="hendre-section-title">
                        <h2 style="color: #da242b;">{{ $about[0]->name }}</h2>
                        <p>
                            {{ $about[0]->value }}
                        </p>
                    </div>
                    <div class="hendre-button">
                        <a href="{{ route('about') }}">Hakkımızda Daha Fazlası <i class="bi bi-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Section  -->

    <!-- Start Service Section  -->
    <div class="service-top-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hendre-section-title white padding-lg">
                        <h2 class="text-danger">Hizmetlerimiz</h2>
                        <h1>İş Makineler Ve</h1>
                        <h1 class="sections">Daha <span>Fazlası</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-section">
        <div class="container">
            <div class="row service-bg">
                <div class="service-list owl-carousel">
                    @foreach($services as $item)
                        <div class="col-lg-12">
                            <div class="single-service-box">
                                <div class="service-thumb">
                                    <img style="width: 100%; height: 400px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="">
                                </div>
                                <div class="service-content">
                                    <div class="service-icon">
                                        <img src="assets/images/resource/service-icn1.png" alt="">
                                    </div>
                                    <h3 class="service-title">{{ $item->service_title }}</h3>
                                    <p class="service-desc">{{ $item->service_intro_text }}</p>
                                    <a class="hendre-button" href="{{ route("services.details", [$item->id]) }}">Daha Fazla <i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section  -->

    <!-- Start Why Choose  Section  -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hendre-section-title text-center padding-lg">
                        <h4> Neden Bizi Seçmelisiniz ? </h4>
                        <h1> Bizi Seçmeniz İçin Bazı Nedenler</h1>
                        <h3> <span style="color: #da242b">Sarsılmaz İş Makineleri</span> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab  -->
                    <div class="tab">

                        <div class="tab_content">

                            <!-- / tabs_item -->

                            <div class="tabs_item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="tab-thumb">
                                            <img src="{{ asset('assets/images/srslmz/hakkimizda.jpg') }}" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 tab-right">
                                        <div class="hendre-section-title">
                                            <h4> Neden Bizi Seçmelisiniz ? </h4>
                                            <h1> Profesyonel<span> Hizmet </span> </h1>
                                            <h1 class="sections">Memnuniyet Garantisi</h1>
                                            <p>
                                                {{ $why_choose[0]->value }}
                                            </p>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-9 col-md-9">
                                                <div class="about-item-list">
                                                    <ul>
                                                        <li><i class="bi bi-check-circle-fill"></i> Tüm tamir ve bakım işlemlerinde yüksek müşteri memnuniyeti sağlıyoruz.</li>
                                                        <li><i class="bi bi-check-circle-fill"></i> Teknolojik altyapımız sayesinde hızlı ve etkili çözümler sunuyoruz.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hendre-button">
                                            <a href="{{ route('about') }}">Daha Fazla <i class="bi bi-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End tab -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose  Section  -->

    <!-- Start Process Section  -->
    <div class="process-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hendre-section-title white text-center padding-lg">
                        <h4> İş Süreci </h4>
                        <h1>İs Sürecini <span>Takip Ediyoruz</span> </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-process-box">
                        <div class="process-thumb">
                            <img src="assets/images/resource/process1.png" alt="">
                            <div class="process-number">
                                <span>01</span>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="process-title">Talep ve İnceleme</h4>
                            <p class="process-desc">İhtiyacınızı bize iletmenizin ardından uzman ekibimiz makinelerinizi detaylıca inceleyerek arıza tespiti yapar ve çözüm önerileri sunar./p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-process-box">
                        <div class="process-thumb">
                            <img src="assets/images/resource/process2.png" alt="">
                            <div class="process-number">
                                <span>02</span>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="process-title">Teklif ve Onay</h4>
                            <p class="process-desc">Yapılacak işlemler için şeffaf bir maliyet ve zaman planlaması hazırlar, onayınızı alırız.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-process-box">
                        <div class="process-thumb">
                            <img src="assets/images/resource/process3.png" alt="">
                            <div class="process-number">
                                <span>03</span>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="process-title">Tamir ve Bakım</h4>
                            <p class="process-desc">Belirlenen işlemleri, kaliteli yedek parçalar ve profesyonel işçilikle hızlıca gerçekleştiririz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-process-box">
                        <div class="process-thumb">
                            <img src="assets/images/resource/process4.png" alt="">
                            <div class="process-number">
                                <span>04</span>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="process-title">Teslim ve Takip</h4>
                            <p class="process-desc">İşlem sonrası makinelerinizi teslim eder, performans takibi ve destek hizmetleriyle yanınızda oluruz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Process Section  -->

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

    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hendre-section-title text-center padding-lg">
                        <h4> Blogumuz </h4>
                        <h1> Bazı Blog  <span>Yazılarımız</span> </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-box">
                            <div class="blog-thumb">
                                <img style="width: 100%; height: 400px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title"><a href="{{ route("blogs.detail", [$item->id]) }}" class="fs-5">{!! $item->blog_title !!}</a></h2>
                                <div class="blog-btn">
                                    <a href="{{ route("blogs.detail", [$item->id]) }}">Daha Fazla <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Blog Section -->

@endsection

