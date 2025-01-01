@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> İletişim </h1>
                        <ul>
                            <li><a href="index.html"> <i class="fas fa-home"></i> Anasayfa</a></li>
                            <li> İletişim </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Maps Section -->
    <div class="map-section">
        <div class="container">
            <div class="row map-bg">
                <div class="col-lg-12">
                    <iframe src="{{ $maps[0]->value }}" width="1320" height="552" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Maps Section -->

    <!-- Contact Form -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     {{--   <div class="hendre-section-title padding-lg">
                            <h1>İletişim <span>Form</span></h1>
                        </div>--}}
                </div>
            </div>
          {{--  <div class="row">
                <div class="col-lg-12">
                    <div class="contact_from_box">
                        <form id="contact_form" action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form" >
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-box mb-30">
                                                <input type="text" name="name"  placeholder="Name:">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-box mb-30">
                                                <input type="text" name="name"  placeholder="Email:">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-box mb-30">
                                                <input type="text" name="name"  placeholder="Subject:">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-box">
                                                <input type="text" name="name"  placeholder="Phone Number:">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="contact-form">
                                    <button type="submit"> Contact Us <i class="bi bi-arrow-right"></i> </button>
                                </div>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <!-- /Contact Form -->
@endsection
