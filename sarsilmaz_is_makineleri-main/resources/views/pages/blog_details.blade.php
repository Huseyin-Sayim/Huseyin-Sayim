@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> Blog</h1>
                        <ul>
                            <li><a class="background" href="index.html"> <i class="fas fa-home"></i> Anasayfa</a></li>
                            <li><a href="blog.html"> Blog Detay</a></li>
                            <li>{{ $blog->blog_title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Blog Section -->
    <div class="blogs-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row blogs-pr">
                        <div class="col-lg-12">
                            <div class="single-blog-dtls-box">
                                <div class="blog-thumb">
                                    <img src="assets/images/resource/blogs1.jpg" alt="">
                                    <div class="meta-blog">
                                        <a href="#">
                                            @php
                                                $date = date('d-m-Y', strtotime($blog->created_at));
                                                echo $date;
                                            @endphp
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-content">


                                    <h2 class="blog-title"><a href="blog-details.html">{{ $blog->blog_title }}</a></h2>

                                    <div>
                                        {!! $blog->blog_text !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pl-0 pr-0">

                    <div class="widget-sidebar-box">
                        <h4 class="sidebar-title upp"> Son Gönderiler </h4>
                        <!-- widget recent post -->
                        @foreach($blogs as $item)

                            <div class="widget-recent-post d-flex">
                                <div class="rpost-thumb">
                                    <a href="{{ route("blogs.detail", [$item->id]) }}"><img style="width: 70px; height: 70px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="post thumb"></a>
                                </div>
                                <div class="rpost-content">
                                    <div class="rpost-title">
                                        <h4><a href="{{ route("blogs.detail", [$item->id]) }}"> {{ $item->blog_title }} </a></h4>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->

@endsection
