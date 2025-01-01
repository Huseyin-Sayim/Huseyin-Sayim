@extends("layouts.front")

@section("content")
    <div class="breatcam-section style-two d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="breatcam-content">
                        <h1> Bloglar </h1>
                        <ul>
                            <li><a href="index.html"> <i class="fas fa-home"></i> Anasayfa</a></li>
                            <li> Blog </li>
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
                        @foreach($all_blogs as $item)

                            <div class="col-lg-12">
                                <div class="single-blog-box">
                                    <div class="blog-thumb">
                                        <img style="width: 850px; height: 460px; object-fit: cover" src="{{ asset($item->media_url) }}" alt="">
                                        <div class="meta-blog">
                                            <a href="{{ route("blogs.detail", [$item->id]) }}">
                                                @php
                                                    $date = date('d-m-Y', strtotime($item->created_at));
                                                    echo $date;
                                                @endphp
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blog-title"><a href="{{ route("blogs.detail", [$item->id]) }}">{{ $item->blog_title }}</a></h2>
                                        {!! $item->blog_text  !!}
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 pl-0 pr-0 responsive">
                    <div class="sidebar-widget">
                        <form action="#" method="get">
                            <input type="text" class="src-input-box" placeholder="Search Here" name="s" value=""
                                   title="src-input-box">
                            <button class="subscribe-btn" type="submit">
                                <span><i class="bi bi-search"></i></span>
                            </button>
                        </form>
                    </div>
                    <div class="widget-sidebar-box">
                        <h4 class="sidebar-title upp">Son Gönderiler </h4>

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
