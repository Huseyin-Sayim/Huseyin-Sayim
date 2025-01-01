@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-12">
					<div class="breatcam-content">
						<h1> Hizmet Detayları </h1>
						<ul>
							<li><a class="background" href="index.html"> <i class="fas fa-home"></i> Anasayfa </a></li>
							<li><a href="service.html"> Hizmetler </a></li>
							<li> {{ $service->service_title  }} </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Service Details Section  -->
    <div class="service-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-12 pr-0 pl-0 responsive">

					<div class="widget-sidebar-box">
						<h4 class="sidebar-title">Diğer Hizmetlerimiz</h4>
						<ul class="sidebar-menu">
                            @foreach ($services as $item)
                                @if($item->id != $service->id)
							        <li><a class="" href="{{ route('services.details', [$item->id]) }}"> <i class="bi bi-check-lg"></i> {{ $item->service_title }} </a></li>
                                @endif
                            @endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-9 col-md-12">
					<div class="service-dtls-all-items">
						<div class="service-thumb">
							<img style="width: 100%; height: 400px; object-fit: contain;" src="{{ asset($image[0]->media_url) }}" alt="">
						</div>
						<div class="service-dtls-content">
							<h2 class="service-title">{{ $service->service_title }}</h2>
							<p class="service-dtls-desc">
                                {!! $service->service_description !!}
                            </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- End Service Details Section  -->
@endsection
