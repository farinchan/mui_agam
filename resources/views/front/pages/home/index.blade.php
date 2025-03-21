@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">


    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <style>
        .title-banner {
            font-size: 50px;
            font-weight: bold;
            color: #fff;
        }

        .text-banner {
            font-size: 20px;
            color: #fff;
        }

        .image-banner {
            height: 900px;
            width: 100%;
            object-fit: cover;
            background: #333;
        }

        /* .carousel-caption{
                                                                    background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
                                                                } */
        .carousel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.673) 0%, rgba(0, 0, 0, 0.274) 100%);
            z-index: 1;

        }

        .carousel-inner {
            border-radius: 0 0 10px 10px;
        }

        .about a {
            color: #3c5e4d;
        }

        .latest-events {
            display: inline-block;
            max-width: 340px;
            margin-bottom: 30px;
        }

        .events-date {
            float: left;
            height: 84px;
            width: 95px;
            font-size: 13px;
            font-weight: 500;
            border-radius: 10px;
            margin-right: 20px;
            background-color: #fff;
        }

        .relative-position {
            position: relative;
        }

        .gradient-bdr {
            z-index: -1;
            width: 100%;
            height: 100%;
            position: absolute;
            border-radius: 10px;
            -webkit-transform: scale(1.06);
            -ms-transform: scale(1.06);
            transform: scale(1.06);
            background: -o-linear-gradient(69deg, #319276, #08652F);
            background: linear-gradient(21deg, #319276, #08652F);
            background: -webkit-linear-gradient(69deg, #319276, #08652F);
        }

        .events-date span {
            font-size: 50px;
            padding-top: 8px;
            color: #333333;
            line-height: 1;
            display: block;
        }

        .event-text {
            overflow: hidden;
        }

        .latest-title {
            font-size: 18px;
            color: #333333;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <main>
        <div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($banner_list as $banner)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img class="image-banner" src="{{ $banner->getImage() }}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="title-banner">
                                    <a href="{{ $banner->url }}" class="text-white">
                                        {{ $banner->title }}
                                    </a>
                                </h5>
                                <p class="text-banner">
                                    {{ $banner->subtitle }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="row mt-5">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{ Storage::url($news->first()->thumbnail) }}" height="400px"
                                        style="object-fit: cover;" alt="">

                                    <div class="trend-top-cap">
                                        <span>{{ $news->first()->category->name }}</span>
                                        <ul class="blog-info-link">
                                            <li><a class="text-white" href="#"><i class="fa fa-user"></i>
                                                    {{ $news->first()->user->name }}</a></li>
                                            <li><a class="text-white" href="#"><i class="fa fa-comments"></i>
                                                    {{ $news->first()->comments->count() }}
                                                    Komentar</a></li>
                                            <li><a class="text-white" href="#"><i class="fa fa-eye"></i>
                                                    {{ $news->first()->viewers->count() }}
                                                    Kali Dilihat</a>
                                            </li>
                                        </ul>
                                        <h2><a class="mr-5" href="{{ route('news.detail', $news->first()->slug) }}">
                                                {{ $news->first()->title }}
                                            </a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($news as $key => $item)
                                        @if ($key != 0)
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img src="{{ Storage::url($item->thumbnail) }}" width="100%"
                                                            height="150px" style="object-fit: cover;" alt="">
                                                    </div>

                                                    <div class="trend-bottom-cap">
                                                        <span class="color1"> {{ $item->category->name }}</span>
                                                        <ul class="blog-info-link">
                                                            {{-- <li><a class="text-white" href="#"><i class="fa fa-user"></i> {{ $item->user->name }}</a></li> --}}
                                                            <li><a href="#"><i class="fa fa-comments"></i>
                                                                    {{ $item->comments->count() }}
                                                                    Komentar</a></li>
                                                            <li><a href="#"><i class="fa fa-eye"></i>
                                                                    {{ $item->viewers->count() }}
                                                                    Kali Dilihat</a>
                                                            </li>
                                                        </ul>
                                                        <h4><a href="{{ route('news.detail', $item->slug) }}">
                                                                {{ Str::limit($item->title, 60) }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <h2 class="mb-5"
                                style="font-size: 24px; font-weight: bold; color: #333; position: relative; display: inline-block;">
                                Fatwa MUI
                                <span
                                    style="display: block; width: 50px; height: 3px; background-color: #08652F; position: absolute; bottom: -15px; left: 0;"></span>
                            </h2>
                            {{-- <hr> --}}
                            @foreach ($fatwas as $fatwa)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img ">
                                        <img src="{{ Storage::url($fatwa->thumbnail)  }}"
                                            alt="" style="height: 70px; width: 70px; object-fit: cover;">
                                    </div>

                                    <div class="trand-right-cap">
                                        {{-- <span class="color4">fatwa</span> --}}
                                        <div style="font-size: 12px; color: #333;">
                                            {{ $fatwa->created_at->diffForHumans() }} </div>
                                        <h4 style=" font-size: 16px;"><a
                                                href="{{ route('news.detail', $fatwa->slug) }}">
                                                {{ Str::limit($fatwa->title, 80) }}
                                            </a></h4>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->


        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">

                    <div class="row mt-5">

                        <div class="col-lg-8">
                            <h2
                                style="font-size: 24px; font-weight: bold; color: #333; position: relative; display: inline-block;">
                                Agenda
                                <span
                                    style="display: block; width: 50px; height: 3px; background-color: #08652F; position: absolute; bottom: -15px; left: 0;"></span>
                            </h2>

                            {{-- <hr> --}}

                            <div class="row mt-5">
                                @foreach ($events as $event)
                                    <div class="col-md-6">
                                        <div class="latest-events">
                                            <div class="latest-event-item">
                                                <div class="events-date  relative-position text-center">
                                                    <div class="gradient-bdr"></div>
                                                    <span
                                                        class="event-date bold-font">{{ Carbon\Carbon::parse($event->start)->format('d') }}</span>
                                                    {{ Carbon\Carbon::parse($event->start)->format('M Y') }}
                                                </div>
                                                <div class="event-text">
                                                    <h3 class="latest-title bold-font">
                                                        <a style="color: #333;" href="{{ route('event.detail', $event->slug) }}"
                                                            onmouseover="this.style.color='#08652F'"
                                                            onmouseout="this.style.color='#333'">
                                                            {{ $event->title }}
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- <div class="text-right">
                                <a class="text-info " href="">
                                    Lihat Selengkapnya >
                                </a>
                            </div> --}}
                        </div>
                        <div class="col-lg-4">
                            <h2
                                style="font-size: 24px; font-weight: bold; color: #333; position: relative; display: inline-block;" class="mb-5">
                                Pengumuman
                                <span
                                    style="display: block; width: 50px; height: 3px; background-color: #08652F; position: absolute; bottom: -15px; left: 0;"></span>
                            </h2>
                            {{-- <hr> --}}
                            @foreach ($pengumumans as $pengumuman)
                                <div class="trand-right-single d-flex">
                                    {{-- <div class="trand-right-img ">
                                        <img src="{{ $pengumuman->image ? Storage::url($pengumuman->image) : 'https://file.iainpare.ac.id/wp-content/uploads/2019/07/pengumuman.png' }}"
                                            alt="" style="height: 70px; width: 70px; object-fit: cover;">
                                    </div> --}}

                                    <div class="trand-right-cap" style="padding-left: 0;">
                                        {{-- <span class="color4">Pengumuman</span> --}}
                                        <div style="font-size: 12px; color: #333;">
                                            {{ $pengumuman->created_at->diffForHumans() }} </div>
                                        <h4 style=" font-size: 16px;"><a
                                                href="{{ route('pengumuman.detail', $pengumuman->slug) }}">
                                                {{ Str::limit($pengumuman->title, 80) }}
                                            </a></h4>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="text-right">
                                <a class="text-info " href="">
                                    Lihat Selengkapnya >
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <h1 style="color: #08652F; font-weight: bold;" class="text-center mb-5">
                    Kata Sambutan <br>
                    Majelis Ulama Indonesia (MUI) Kab. Agam
                </h1>
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $welcome_speech?->getImage() ?? '-' }}" alt="" style="height: 400px;"
                                class="img-fluid">
                        </div>
                        <div class="col-md-8 mt-sm-20">

                            <h2 style="color: #08652F; font-size: 26px;" class="mt-2">
                                {{ $welcome_speech?->name ?? '-' }}</h2>
                            <div class="mt-3 about">
                                <p>
                                    Assalamu’alaikum Warahmatullahi Wabarakatuh,
                                </p>
                                <p>
                                    {{ Str::limit(strip_tags($welcome_speech?->content ?? '-'), 500, '...') }}
                                </p>
                                <a href="{{ route("welcome.speech") }}" class="button rounded-0 primary-bg text-white  btn_1 boxed-btn"
                                    type="submit">Lihat selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!-- Kajian Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Kajian</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">

                                {{-- <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Lifestyle</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Travel</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab"
                                                href="#nav-last" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Fashion</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab"
                                                href="#nav-nav-Sport" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Sports</a>
                                            <a class="nav-item nav-link" id="nav-technology" data-toggle="tab"
                                                href="#nav-techno" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Technology</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($kajians as $kajian)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{ Storage::url($kajian->thumbnail) }}"
                                                                alt="" height="230px" style="object-fit: cover;">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color3">Ustadz {{ $kajian->user->name }}</span>
                                                            <ul class="blog-info-link">
                                                                {{-- <li><a class="text-white" href="#"><i class="fa fa-user"></i> {{ $kajian->user->name }}</a></li> --}}
                                                                <li><a href="#"><i class="fa fa-comments"></i>
                                                                        {{ $kajian->kajianComment->count() }}
                                                                        Komentar</a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-eye"></i>
                                                                        {{ $kajian->kajianViewer->count() }}
                                                                        Kali Dilihat</a>
                                                                </li>

                                                            </ul>
                                                            <h4><a href="{{ route('kajian.detail', $kajian->slug) }}">
                                                                    {{ Str::limit($kajian->title, 60) }}
                                                                </a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                                <div class="text-right">
                                    <a href="{{ route('kajian') }}" class="text-info">Lihat Selengkapnya >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Ikuti Kami</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                @if ($setting_web->facebook)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->facebook }}"><img
                                                    src="{{ asset('front/img/news/icon-fb.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Facebook</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->instagram)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->instagram }}"><img
                                                    src="{{ asset('front/img/news/icon-ins.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Instagram</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->twitter)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->twitter }}"><img
                                                    src="{{ asset('front/img/news/icon-tw.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Twitter</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->youtube)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->youtube }}"><img
                                                    src="{{ asset('front/img/news/icon-yo.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Youtube</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Subscribe</h4>
                                <form action="{{ route('subscribe') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'"
                                            placeholder="Enter email" required="">
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </section>
        <!-- Kajian End -->

        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Galeri MUI</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">

                                @foreach ($list_album as $album)
                                    <div class="weekly-single ">
                                        <div class="weekly-img ">
                                            <img src="{{ $album->getThumbnail() }}" alt=""
                                                style="height: 350px; width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="weekly-caption">
                                            {{-- <span class="color1">Travel</span> --}}
                                            <h4><a href="{{ route('gallery.detail', $album->slug) }}">{{ $album->title }}</a></h4>
                                            <p style="margin-top: -10px; margin-bottom: 0;">
                                                {{ $album->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($list_album->count() < 4)
                                    @for ($i = 0; $i < 4 - $list_album->count(); $i++)
                                        <div class="weekly-single ">
                                        </div>
                                    @endfor
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->


        <!--   Instagram start -->
        {{-- <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <div class="row">
                        <div class="tagembed-widget" style="width:100%;height:100%" data-widget-id="2159172"
                            data-tags="false" view-url="https://widget.tagembed.com/2159172"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Instagram -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="border-radius: 20px; border: none;">
                                <div class="card-body p-5">
                                    <h5 class="card-title mb-5" style="font-weight: bold; color: #333;">Hubungi Kami</h5>
                                    <form method="POST" action="{{ route('message') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" placeholder="Nama Lengkap"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Nama Lengkap'" required=""
                                                            class="single-input">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="email" placeholder="Email"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Email'" required=""
                                                            class="single-input">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" name="subject" placeholder="Subjek"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Subjek'" required=""
                                                        class="single-input">
                                                </div>
                                                <div class="mb-3">
                                                    <textarea name="message" class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Message'" required="" style="height: 200px;"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>

                                            <div class="col-md-5">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14217.899744230352!2d100.38151331598215!3d-0.3014266340436995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5389cf1e72cab%3A0xbb5d0a65083a1cbb!2sPanti%20Asuhan%20Aisyiah%20Putra!5e0!3m2!1sid!2sid!4v1725587482668!5m2!1sid!2sid"
                                                    height="450" style="border:0; width: 100%; border-radius: 20px;"
                                                    allowfullscreen="" loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

    </main>
@endsection
@section('scripts')
    <script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script>
    <script>
        $.ajax({
            url: "https://api.myquran.com/v2/sholat/jadwal/0119/2024/1",
            type: "GET",
            success: function(response) {
                let data = response.data.jadwal;
                console.log(data);

                let html = '';
                data.forEach((item, index) => {
                    html += `
                        <tr>
                            <td>${item.tanggal}</td>
                            <td>${item.subuh}</td>
                            <td>${item.dzuhur}</td>
                            <td>${item.ashar}</td>
                            <td>${item.maghrib}</td>
                            <td>${item.isya}</td>
                        </tr>
                    `;
                });
                $('#jadwal-sholat-bulan-ini').html(html);
            },
            error: function(xhr) {
                console.log(xhr);
            },
        });
        $.ajax({
            url: "https://api.myquran.com/v2/sholat/jadwal/0119/2024/1/1",
            type: "GET",
            success: function(response) {
                let data = response.data.jadwal;
                console.log(data);

                let html = '';
                html += `
                        <tr>
                            <td>${data.subuh}</td>
                            <td>${data.dzuhur}</td>
                            <td>${data.ashar}</td>
                            <td>${data.maghrib}</td>
                            <td>${data.isya}</td>
                        </tr>
                    `;
                $('#jadwal-sholat-hari-ini').html(html);
            },
            error: function(xhr) {
                console.log(xhr);
            },
        });
    </script>
    <script>
        $.ajax({
            url: "{{ route('visit.ajax') }}",
            type: "GET",
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    </script>
@endsection
