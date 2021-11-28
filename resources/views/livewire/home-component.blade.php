@push('styles')
    <style>
        #mask {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #26262c;
            display: none;
        }

        #boxes .window {
            position: fixed;
            left: 0;
            top: 0;
            width: 440px;
            height: 850px;
            display: none;
            z-index: 9999;
            padding: 20px;
            transform: translate(-0%, -50%);
            border-radius: 5px;
            text-align: center;
        }

        #boxes #dialog {
            width: 450px;
            height: auto;
            padding: 10px 10px 10px 10px;
            background-color: #ffffff;
            font-size: 15pt;
        }

        .agree:hover {
            background-color: #D1D1D1;
        }

        .popupoption:hover {
            background-color: #D1D1D1;
            color: green;
        }

        @media screen and (max-width: 420px) {
            #boxes .window {
                width: 100%;
                transform: translate(0%, 0%);
                position: absolute;
            }

            #boxes #dialog {
                width: 70%;
                padding: 5px;
            }

            #boxes #dialog .popup-image {
                height: 500px;
            }
        }

        .popupoption2:hover {
            color: red;
        }

    </style>
@endpush
<div>

    <!--====== SLIDER PART START ======-->

    <section id="slider-part" class="slider-active">
        @if ($sliders->count() > 0)
            @foreach ($sliders as $key => $slider)
                <div class="single-slider bg_cover pt-100"
                    style="background-image: url({{ asset('/storage/sliders') }}/{{ $slider->image }})"
                    data-overlay="4">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-9">
                                <div class="slider-cont">
                                    <h1 data-animation="bounceInLeft" data-delay="1s">{{ $slider->title }}</h1>
                                    <p data-animation="fadeInUp" data-delay="1.3s">{{ $slider->subtitle }}</p>
                                    <ul>
                                        <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn"
                                                href="{{ route('about') }}">Read More</a></li>
                                        <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2"
                                                href="{{ route('course') }}">Get Started</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single slider -->
            @endforeach
        @else
            <h1 class="text-center text-black">No sliders found</h1>
        @endif
    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->

    <section id="category-part">
        <div class="container">
            <div class="category pt-40 pb-80">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-text pt-40">
                            <h2>One of the best school to learn everything</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slied mt-40">
                            <div class="col-lg-4">
                                <a href="javascript:void(0);">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="{{ asset('assets/images/all-icon/ctg-1.png') }}" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Science</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="javascript:void(0);">
                                    <span class="singel-category text-center color-2">
                                        <span class="icon">
                                            <img src="{{ asset('assets/images/all-icon/ctg-2.png') }}" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Commerce</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="javascript:void(0);">
                                    <span class="singel-category text-center color-3">
                                        <span class="icon">
                                            <img src="{{ asset('assets/images/all-icon/ctg-3.png') }}" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Education</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="javascript:void(0);">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img height="80" src="{{ asset('assets/images/all-icon/ctg-4.png') }}"
                                                alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Arts</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                        </div> <!-- category slied -->
                    </div>
                </div> <!-- row -->
            </div> <!-- category -->
        </div> <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about-part" class="pt-65">
        @if ($about)
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mt-50">
                            <h5>About us</h5>
                            <h2>Welcome to {{ $about->name }}</h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>{{ $about->short_description }}</p>
                            <p>{!! htmlspecialchars_decode(\Illuminate\Support\Str::limit($about->description, 200)) !!}</p>
                            <a href="{{ route('about') }}" class="main-btn mt-55">Learn More</a>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-event mt-50">
                            <div class="event-title">
                                <h3>Upcoming events</h3>
                            </div> <!-- event title -->
                            <ul>
                                @if ($events->count() > 0)
                                    @foreach ($events as $key => $event)
                                        <li>
                                            <div class="singel-event">
                                                <span><i class="fa fa-calendar"></i> {{ $event->start_date }} to
                                                    {{ $event->end_date }}</span>
                                                <a href="{{ route('event.detail', ['event_slug' => $event->slug]) }}">
                                                    <h4>{{ $event->title }}</h4>
                                                </a>
                                                <span><i class="fa fa-clock-o"></i> {{ $event->time }}</span>
                                                <span><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p class="text-black">No upcoming events found</p>
                                @endif
                            </ul>
                        </div> <!-- about event -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="about-bg">
                <img height="550" src="{{ asset('/storage/abouts') }}/{{ $about->image }}"
                    alt="{{ $about->name }}">
            </div>
        @endif
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== APPLY PART START ======-->

    <section id="apply-aprt" class="pb-120">
        <div class="container">
            <div class="apply">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="apply-cont apply-color-1">
                            <h3>Admission open for (Class-XI) @if ($current_year) {{ $current_year }} @endif</h3>
                            <p>Online registration for (Class-XI) has been opened for year @if ($current_year) {{ $current_year }} @endif,
                                we will like to welcome you all to Shree Dhukurpani Secondary School.
                                Thank you and have a wonderful career ahead.
                            </p>
                            <a href="{{ route('admission', ['admission_slug' => '+2']) }}" class="main-btn">Apply
                                Now</a>
                        </div> <!-- apply cont -->
                    </div>
                    <div class="col-lg-6">
                        <div class="apply-cont apply-color-2">
                            <h3>Admission open for (Class-I to Class-IX) @if ($current_year) {{ $current_year + 1 }} @endif</h3>
                            <p>Online registration for (Class-I to Class-IX) has been opened for year
                                @if ($current_year) {{ $current_year + 1 }} @endif,
                                we will like to welcome you all to Shree Dhukurpani Secondary School.
                                Thank you and have a wonderful career ahead.
                            </p>
                            <a href="{{ route('admission', ['admission_slug' => 'school']) }}"
                                class="main-btn">Apply Now</a>
                        </div> <!-- apply cont -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== APPLY PART ENDS ======-->

    <!--====== COURSE PART START ======-->

    <section id="course-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-45">
                        <h5>Our course</h5>
                        <h2>Featured courses </h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row course-slied mt-30">
                @if ($courses->count() > 0)
                    @foreach ($courses as $key => $course)
                        <div class="col-lg-4">
                            <div class="singel-course">
                                <div class="thum">
                                    <div class="image">
                                        <img height="250"
                                            src="{{ asset('/storage/courses') }}/{{ $course->image }}"
                                            alt="{{ $course->title }}">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span>
                                    <br>
                                    <a href="{{ route('course.detail', ['course_slug' => $course->slug]) }}">
                                        <h4>{{ $course->title }}</h4>
                                    </a>
                                    <div class="course-teacher">
                                        @foreach ($course->teachers as $key => $teacher)
                                            @if ($key == 0)
                                                <div class="thum">
                                                    <a
                                                        href="{{ route('teacher.detail', ['teacher_slug' => $teacher->slug]) }}"><img
                                                            src="{{ asset('/storage/teachers') }}/{{ $teacher->image }}"
                                                            alt="{{ $teacher->name }}"></a>
                                                </div>
                                                <div class="name">
                                                    <a
                                                        href="{{ route('teacher.detail', ['teacher_slug' => $teacher->slug]) }}">
                                                        <h6>{{ $teacher->name }}</h6>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="admin">
                                            <ul>
                                                <li><a href="javascript:void(0);"><i
                                                            class="fa fa-user"></i><span>{{ $course->students }}</span></a>
                                                </li>
                                                <li><a href="javascript:void(0);"><i
                                                            class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    @endforeach
                @else
                    <p class="text-black">No courses found</p>
                @endif
            </div> <!-- course slied -->
        </div> <!-- container -->
    </section>

    <!--====== COURSE PART ENDS ======-->

    <!--====== VIDEO FEATURE PART START ======-->
    @if ($videos->count() > 0)
        @foreach ($videos as $key => $video)
            <section id="video-feature" class="bg_cover pt-60 pb-110"
                style="background-image: url({{ asset('/storage/videos') }}/{{ $video->image }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="video text-lg-left text-center pt-50">
                                <a href="{{ $video->video }}" data-fancybox="gallery"><i
                                        class="fa fa-play"></i></a>
                            </div> <!-- row -->
                        </div>
                        <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                            <div class="feature pt-50">
                                <div class="feature-title">
                                    <h3>Our Facilities</h3>
                                </div>
                                @if ($facilities->count() > 0)
                                    <ul>
                                        @foreach ($facilities as $key => $facility)
                                            <li>
                                                <div class="singel-feature">
                                                    <div class="icon">
                                                        <img height="80" width="70"
                                                            src="{{ asset('/storage/facilities') }}/{{ $facility->image }}"
                                                            alt="{{ $facility->name }}">
                                                    </div>
                                                    <div class="cont">
                                                        <h4>{{ $facility->name }}</h4>
                                                        <p>{{ \Illuminate\Support\Str::limit($facility->description, 95) }}
                                                        </p>
                                                    </div>
                                                </div> <!-- singel feature -->
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-black">No facilities found</p>
                                @endif
                            </div> <!-- feature -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                <div class="feature-bg"></div> <!-- feature bg -->
            </section>
        @endforeach
    @else
        <p class="text-black text-center">No latest video found</p>
    @endif

    <!--====== VIDEO FEATURE PART ENDS ======-->

    <!--====== Principal PART START ======-->

    <section id="about-page" class="pt-70 pb-110">
        @if ($principal)
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title mt-50">
                            <h5>Principal's Message</h5>
                            <h2>{{ $principal->name }}</h2>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>{!! htmlspecialchars_decode($principal->message) !!}</p>
                        </div>
                    </div> <!-- about cont -->
                    <div class="col-lg-6">
                        <div class="about-image mt-50">
                            <img height="500" src="{{ asset('/storage/principals') }}/{{ $principal->image }}"
                                alt="{{ $principal->name }}">
                        </div> <!-- about imag -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        @endif
    </section>

    <!--====== Principal PART ENDS ======-->

    <!--====== PUBLICATION PART START ======-->

    <section id="publication-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="section-title pb-60">
                        <h5>Latest Notices</h5>
                        <h2>From The Notices </h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            @if ($notices->count() > 0)
                <div class="row course-slied justify-content-center">
                    @foreach ($notices as $key => $notice)
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="singel-publication mt-30">
                                <div class="cont">
                                    <div class="name">
                                        <a href="{{ route('notice.detail', ['notice_slug' => $notice->slug]) }}">
                                            <h6>{{ $notice->title }} </h6>
                                        </a>
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            {{ $notice->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="button text-right">
                                        <a href="{{ route('notice.detail', ['notice_slug' => $notice->slug]) }}"
                                            class="main-btn">View</a>
                                    </div>
                                </div>
                            </div> <!-- singel publication -->
                        </div>
                    @endforeach
                </div> <!-- row -->
            @else
                <p>No recent notices found.</p>
            @endif
        </div> <!-- container -->
    </section>

    <!--====== PUBLICATION PART ENDS ======-->


    <!--====== TEASTIMONIAL PART START ======-->

    <section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8"
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

    <!--====== NEWS PART START ======-->

    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5>Latest Blogs</h5>
                        <h2>From the Blogs</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            @if ($blogs->count() > 0)
                <div class="row">
                    @foreach ($blogs as $key => $blog)
                        @if ($key == 0)
                            <div class="col-lg-6">
                                <div class="singel-news mt-30">
                                    <div class="news-thum pb-25">
                                        <img height="400" src="{{ asset('/storage/blogs') }}/{{ $blog->image }}"
                                            alt="{{ $blog->title }}">
                                    </div>
                                    <div class="news-cont">
                                        <ul>
                                            <li><a href="javascript:void(0);"><i
                                                        class="fa fa-calendar"></i>{{ $blog->created_at->toDateString() }}
                                                </a></li>
                                            <li><a href="javascript:void(0);"> <span>By</span>
                                                    {{ $blog->author->name }}</a></li>
                                        </ul>
                                        <a href="{{ route('blog.detail', ['blog_slug' => $blog->slug]) }}">
                                            <h3>{{ $blog->title }}</h3>
                                        </a>
                                        <p>{{ $blog->subtitle }}</p>
                                    </div>
                                </div> <!-- singel news -->
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div class="singel-news news-list">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="news-thum mt-30">
                                                <img height="130"
                                                    src="{{ asset('/storage/blogs') }}/{{ $blog->image }}"
                                                    alt="{{ $blog->title }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="news-cont mt-30">
                                                <ul>
                                                    <li><a href="javascript:void(0);"><i
                                                                class="fa fa-calendar"></i>{{ $blog->created_at->toDateString() }}
                                                        </a></li>
                                                    <li><a href="javascript:void(0);"> <span>By</span>
                                                            {{ $blog->author->name }}</a></li>
                                                </ul>
                                                <a href="{{ route('blog.detail', ['blog_slug' => $blog->slug]) }}">
                                                    <h3>{{ $blog->title }}</h3>
                                                </a>
                                                <p>{{ \Illuminate\Support\Str::limit($blog->subtitle, 90) }}</p>
                                            </div>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- singel news -->
                            </div>
                        @endif
                    @endforeach
                </div> <!-- row -->
            @else
                <p class="text-black">No recent blogs found</p>
            @endif
        </div> <!-- container -->
    </section>

    <!--====== NEWS PART ENDS ======-->

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

    <!-- Popup Part -->
    @if ($popup)
        <div id="boxes">
            <div style="top: 50%; left: 50%; display: none;" id="dialog" class="window">
                <div id="san">
                    <a href="#" class="close agree">
                        <i class="fa fa-close" src="{{ asset('assets/images/close.png') }}"
                            style="float:right; margin-right: -25px; margin-top: -20px;"></i>
                    </a>
                    <img class="popup-image" src="{{ asset('/storage/popups') }}/{{ $popup->image }}" width="450">
                </div>
            </div>
            <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;"
                id="mask"></div>
        </div>
    @endif
    <!-- Popup Part End -->
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            var id = '#dialog';
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();
            $('#mask').css({
                'width': maskWidth,
                'height': maskHeight
            });
            $('#mask').fadeIn(500);
            $('#mask').fadeTo("slow", 0.9);
            var winH = $(window).height();
            var winW = $(window).width();
            $(id).css('top', winH / 2 - $(id).height() / 2);
            $(id).css('left', winW / 2 - $(id).width() / 2);
            $(id).fadeIn(2000);
            $('.window .close').click(function(e) {
                e.preventDefault();
                $('#mask').hide();
                $('.window').hide();
            });
            $('#mask').click(function() {
                $(this).hide();
                $('.window').hide();
            });

        });
    </script>
@endpush
