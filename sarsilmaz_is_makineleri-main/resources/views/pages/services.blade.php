@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> Hizmetlerimiz </h1>
                        <ul>
                            <li><a href="index.html"> <i class="fas fa-home"></i> Anasayfa</a></li>
                            <li> Hizmetlerimiz </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Service Section -->
    <div class="service-section style-two">
        <div class="container">
            <div class="row">
                @foreach($services as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service-box">
                            <div class="service-thumb">
                                <img class="img-fluid" style="max-height: 280px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="">
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
    <!-- End Service Section -->
@endsection
