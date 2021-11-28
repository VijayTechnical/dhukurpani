<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about-page" class="pt-70 pb-110">
        @if ($about)
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mt-50">
                            <h5>About us</h5>
                            <h2>Welcome to {{ $about->name }}</h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>{!! htmlspecialchars_decode($about->description) !!}</p>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-7">
                        <div class="about-image mt-50">
                            <img height="600" src="{{ asset('/storage/abouts') }}/{{ $about->image }}"
                                alt="{{ $about->name }}">
                        </div> <!-- about imag -->
                    </div>
                </div> <!-- row -->
                <div class="about-items pt-60">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30">
                                <span>01</span>
                                <h4>Why Choose us</h4>
                                <p>{{ $about->feature }}</p>
                            </div> <!-- about singel -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30">
                                <span>02</span>
                                <h4>Our Mission</h4>
                                <p>{{ $about->mission }}</p>
                            </div> <!-- about singel -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="about-singel-items mt-30">
                                <span>03</span>
                                <h4>Our vision</h4>
                                <p>{{ $about->vision }}</p>
                            </div> <!-- about singel -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- about items -->
            </div> <!-- container -->
        @endif
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== COUNTER PART START ======-->

    <div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-1.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">1,000</span>+</span>
                        <p>Total Students</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">100</span>+</span>
                        <p>Total Courses</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">30</span>+</span>
                        <p>Total Teachers</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">39,000</span>+</span>
                        <p>Global Teachers</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== COUNTER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Featured Teachers</h5>
                        <h2>Meet Our teachers</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            @if ($teachers->count() > 0)
                <div class="row">
                    @foreach ($teachers as $key => $teacher)
                        <div class="col-lg-3 col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <img height="300" src="{{ asset('/storage/teachers') }}/{{ $teacher->image }}"
                                        alt="{{ $teacher->name }}">
                                </div>
                                <div class="cont">
                                    <a href="{{ route('teacher.detail', ['teacher_slug' => $teacher->slug]) }}">
                                        <h6>{{ $teacher->name }}</h6>
                                    </a>
                                    <span>{{ $teacher->post }}</span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                    @endforeach
                </div> <!-- row -->
            @else
                <p class="text-center text-black">No teachers found</p>
            @endif
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->

    <!--====== TEASTIMONIAL PART START ======-->

    <section id="testimonial" class="bg_cover pt-115 pb-120" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>Testimonial</h5>
                        <h2>What they say</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            @if ($testimonials->count() > 0)
                <div class="row testimonial-slied mt-40">
                    @foreach ($testimonials as $key => $testimonial)
                        <div class="col-lg-6">
                            <div class="singel-testimonial">
                                <div class="testimonial-thum">
                                    <img height="120" width="100"
                                        src="{{ asset('/storage/users') }}/{{ $testimonial->user->profile_photo_path }}"
                                        alt="{{ $testimonial->user->name }}">
                                    <div class="quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonial-cont">
                                    <p>{{ $testimonial->message }}</p>
                                    <h6>{{ $testimonial->user->name }}</h6>
                                    <span>Student</span>
                                </div>
                            </div> <!-- singel testimonial -->
                        </div>
                    @endforeach
                </div> <!-- testimonial slied -->
            @else
                <p class="text-center text-black mt-10">No testimonials yet found.</p>
            @endif
        </div> <!-- container -->
    </section>

    <!--====== TEASTIMONIAL PART ENDS ======-->

    <!--====== PATNAR LOGO PART START ======-->

    <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
        <div class="container">
            @if ($brands->count() > 0)
                <div class="row patnar-slied">
                    @foreach ($brands as $key => $brand)
                        <div class="col-lg-12">
                            <div class="singel-patnar text-center mt-40">
                                <img src="{{ asset('/storage/brands') }}/{{ $brand->image }}"
                                    alt="{{ $brand->name }}">
                            </div>
                        </div>
                    @endforeach
                </div> <!-- row -->
            @else
                <p class="text-black text-center">No partner logo found.</p>
            @endif
        </div> <!-- container -->
    </div>

    <!--====== PATNAR LOGO PART ENDS ======-->
</div>
