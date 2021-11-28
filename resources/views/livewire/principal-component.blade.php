<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Principal Message</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Principal Message</li>
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
        @if ($principal)
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mt-50">
                            <h5>Principal Message</h5>
                            <h2>Hello,I am {{ $principal->name }}</h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>{!! htmlspecialchars_decode($principal->message) !!}</p>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-7">
                        <div class="about-image mt-50">
                            <img height="500" src="{{ asset('/storage/principals') }}/{{ $principal->image }}"
                                alt="{{ $principal->name }}">
                        </div> <!-- about imag -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        @endif
    </section>

    <!--====== ABOUT PART ENDS ======-->

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
