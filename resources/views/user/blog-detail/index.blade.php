@extends('layout.user.main')

@section('title', 'Blog Details')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
            <div class="container position-relative">
                <h1 class="text-capitalize">{{ $blog->blog_title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{url('/blog')}}">Blogs</a></li>
                        <li class="current">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <div class="container" data-aos="fade-up">

                <div class="portfolio-details-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                          "loop": true,
                          "speed": 600,
                          "autoplay": {
                            "delay": 5000
                          },
                          "slidesPerView": "auto",
                          "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                          },
                          "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                          }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide" style="height: 300px; overflow: hidden;">
                            <img
                                src="{{ asset($blog->blog_thumbnail) }}"
                                alt="{{ $blog->blog_title }}"
                                style="height: 100%; width: 100%; object-fit: contain; border-radius: 8px;"
                                class="img-thumbnail"
                            >
                        </div>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2 class="text-capitalize">{{ $blog->blog_title }}</h2>
                            <p>
                                {!! $blog->blog_caption !!}
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="portfolio-info">
                            <h3>Blog information</h3>
                            <ul>
                                <li><strong>Category</strong> {{$blog->blog_category}}</li>
                                <li class="text-uppercase"><strong>Author</strong> {{$blog->author->username}}</li>
                                <li><strong>Post date</strong> {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Portfolio Details Section -->

    </main>
@endsection
