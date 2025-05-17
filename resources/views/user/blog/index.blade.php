@extends('layout.user.main')

@section('title', 'Blogs')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="section accent-background">

        <div class="container">
            <div class="row gy-4 py-5">
                <div class="order-2 order-lg-1 d-flex flex-column justify-content-end align-items-center">
                    <h1>Techie's World Blogs</h1>
                    <p class="text-center ">Techie is a collection of blogs related to programming and AI.</p>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-programming">Programming</li>
                    <li data-filter=".filter-ai">AI</li>
                </ul><!-- End Portfolio Filters -->

                <form class="w-100" action="/blog" method="get" onsubmit="clearSearchQuery()">
                    <div class="input-group mb-3">
                        <input id="search" value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="e.g., programming, ai" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-secondary" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @if($publishedBlogs->isEmpty())
                        <div class="col-12 portfolio-item isotope-item">
                            <h1 class="text-uppercase text-center">We don’t have any blog posts yet! &#128546;</h1>
                        </div>
                    @else
                        @foreach ($publishedBlogs as $blog)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($blog->blog_category) }}">
                                <div class="portfolio-content h-100">
                                    <a href="{{route('user.blog-detail.index', $blog)}}" data-gallery="portfolio-gallery-app" class="glightbox">
                                        <img src="{{ $blog->blog_thumbnail ? asset($blog->blog_thumbnail) : asset('img/tech.jpg') }}"
                                             class="img-fluid" alt="{{ $blog->blog_title }}"
                                             style="height: 250px; width: 100%; object-fit: cover;"
                                        >
                                    </a>
                                    <div class="portfolio-info">
                                        <h4 class="text-capitalize"><a href="{{ route('user.blog-detail.index', ['blog' => $blog->id]) }}" title="More Details" >{{ $blog->blog_title }}</a></h4>
                                        <p>{!! Str::limit($blog->blog_caption, 80) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('search')) {

                urlParams.delete('search');

                window.history.replaceState({}, '', window.location.pathname);
            }
        };
    </script>

@endsection
