@extends('layout.user.main')

@section('title', 'Techie Blogs')

@section('content')

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section accent-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Better Read With Techie</h1>
                        <p>Techie is a collection of blogs related to programming and AI.</p>
                        <div class="d-flex">
                            <a href="{{url('/blog')}}" class="btn-get-started hover:text-dark">Start Reading</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Why us?</h3>
                        <p class="fst-italic">
                            Techie provides blogs related to technology, such as programming and AI. You can also share your knowledge with the Techie world — the best thing in 2025 !
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>You can read all the blogs that related to Technology.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>You can share your knowledge through a blog.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>You’ll find something new to learn on our platform.</span></li>
                        </ul>
                        <a href="{{url('/blog')}}" class="read-more"><span>Explore Blogs</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section accent-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{$userCount}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Users</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-6 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{$blogCount}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Blogs</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Features</h2>
                <p>We provide you with amazing features as shown below!</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4 justify-content-between">
                    <div class="features-image col-lg-5 order-lg-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100"><img src="assets/img/features.svg" class="img-fluid" alt=""></div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center">

                        <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-book flex-shrink-0"></i>
                            <div>
                                <h4>Read The Blogs</h4>
                                <p>You can read all the blogs posted by our users.</p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-pencil-square flex-shrink-0"></i>
                            <div>
                                <h4>Write The Blogs</h4>
                                <p>If you want to become one of our blog writers, you must have an account first.</p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-gear flex-shrink-0"></i>
                            <div>
                                <h4>Write with the best Text Editor</h4>
                                <p>We provide a beautiful text editor to help you create your own blog with a caption.</p>
                            </div>
                        </div><!-- End Features Item-->

                        <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-shield-lock flex-shrink-0"></i>
                            <div>
                                <h4>Publish or Private your Blogs</h4>
                                <p>Your blog can be published to the Techie world or kept private — it’s up to you.</p>
                            </div>
                        </div><!-- End Features Item-->

                    </div>
                </div>

            </div>

        </section><!-- /Features Section -->

    </main>

@endsection
