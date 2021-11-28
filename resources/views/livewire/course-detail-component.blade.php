<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-4.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $course_title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('course') }}">Courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $course_title }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES SINGEl PART START ======-->

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            @if ($course)
                <div class="row">
                    <div class="col-lg-8">
                        <div class="corses-singel-left mt-30">
                            <div class="title">
                                <h3>{{ $course->title }}</h3>
                            </div> <!-- title -->
                            <div class="course-terms">
                                <ul>
                                    @if($course->teachers->count() > 0)
                                        <li>
                                            <div class="teacher-name">
                                                @foreach ($course->teachers as $key => $teacher)
                                                    @if ($key == 0)
                                                        <div class="thum">
                                                            <img height="50" width="50"
                                                                src="{{ asset('/storage/teachers') }}/{{ $teacher->image }}"
                                                                alt="{{ $teacher->name }}">
                                                        </div>
                                                        <div class="name">
                                                            <span>Teacher</span>
                                                            <h6>{{ $teacher->name }}</h6>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </li>
                                    @endif
                                    <li>
                                        <div class="course-category">
                                            <span>Level</span>
                                            <h6>{{ $course->level->name }} </h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="review">
                                            <span>Review</span>
                                            <ul>
                                                <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-star"></i></a>
                                                </li>
                                                <li class="rating">(20 Reviws)</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- course terms -->

                            <div class="corses-singel-image pt-50">
                                <img height="500" src="{{ asset('/storage/courses') }}/{{ $course->image }}"
                                    alt="{{ $course->title }}">
                            </div> <!-- corses singel image -->

                            <div class="corses-tab mt-30">
                                <ul class="nav nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="teacher-tab" data-toggle="tab" href="#teacher" role="tab"
                                            aria-controls="teacher" aria-selected="false">Teacher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                            aria-controls="reviews" aria-selected="false">Reviews</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="overview-description">
                                            <div class="singel-description pt-40">
                                                <p>{!! htmlspecialchars_decode($course->description) !!}</p>
                                            </div>
                                        </div> <!-- overview description -->
                                    </div>
                                    <div class="tab-pane fade" id="teacher" role="tabpanel"
                                        aria-labelledby="teacher-tab">
                                        <div class="curriculam-cont">
                                            <div class="title">
                                                <h6>Teachers related to this course:</h6>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($course->teachers as $key => $teacher)
                                                    <div class="card">
                                                        <div class="card-header" id="heading{{ $key }}">
                                                            <a href="#" data-toggle="collapse"
                                                                data-target="#collapse{{ $key }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse{{ $key }}">
                                                                <ul>
                                                                    <li><i class="fa fa-user"></i></li>
                                                                    <li><span
                                                                            class="lecture">{{ $key + 1 }}</span>
                                                                    </li>
                                                                    <li><span
                                                                            class="head">{{ $teacher->name }}</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="time d-none d-md-block">
                                                                            <i class="fa fa-book"></i>
                                                                            <span>{{ $teacher->post }}</span>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </a>
                                                        </div>

                                                        <div id="collapse{{ $key }}"
                                                            class="collapse @if ($key == 0) show @endif"
                                                            aria-labelledby="heading{{ $key }}"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p>{!! htmlspecialchars_decode($teacher->short_description) !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- curriculam cont -->
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel"
                                        aria-labelledby="reviews-tab">
                                        {{-- <div class="reviews-cont">
                                            <div class="title">
                                                <h6>Student Reviews</h6>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div class="singel-reviews">
                                                        <div class="reviews-author">
                                                            <div class="author-thum">
                                                                <img src="images/review/r-1.jpg" alt="Reviews">
                                                            </div>
                                                            <div class="author-name">
                                                                <h6>Bobby Aktar</h6>
                                                                <span>April 03, 2019</span>
                                                            </div>
                                                        </div>
                                                        <div class="reviews-description pt-20">
                                                            <p>There are many variations of passages of Lorem Ipsum
                                                                available, but the majority have suffered alteration in some
                                                                form, by injected humour, or randomised words which.</p>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <span>/ 5 Star</span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- singel reviews -->
                                                </li>
                                                <li>
                                                    <div class="singel-reviews">
                                                        <div class="reviews-author">
                                                            <div class="author-thum">
                                                                <img src="images/review/r-2.jpg" alt="Reviews">
                                                            </div>
                                                            <div class="author-name">
                                                                <h6>Humayun Ahmed</h6>
                                                                <span>April 13, 2019</span>
                                                            </div>
                                                        </div>
                                                        <div class="reviews-description pt-20">
                                                            <p>There are many variations of passages of Lorem Ipsum
                                                                available, but the majority have suffered alteration in some
                                                                form, by injected humour, or randomised words which.</p>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <span>/ 5 Star</span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- singel reviews -->
                                                </li>
                                                <li>
                                                    <div class="singel-reviews">
                                                        <div class="reviews-author">
                                                            <div class="author-thum">
                                                                <img src="images/review/r-3.jpg" alt="Reviews">
                                                            </div>
                                                            <div class="author-name">
                                                                <h6>Tania Aktar</h6>
                                                                <span>April 20, 2019</span>
                                                            </div>
                                                        </div>
                                                        <div class="reviews-description pt-20">
                                                            <p>There are many variations of passages of Lorem Ipsum
                                                                available, but the majority have suffered alteration in some
                                                                form, by injected humour, or randomised words which.</p>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <span>/ 5 Star</span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- singel reviews -->
                                                </li>
                                            </ul>
                                            <div class="title pt-15">
                                                <h6>Leave A Comment</h6>
                                            </div>
                                            <div class="reviews-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-singel">
                                                                <input type="text" placeholder="Fast name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-singel">
                                                                <input type="text" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-singel">
                                                                <div class="rate-wrapper">
                                                                    <div class="rate-label">Your Rating:</div>
                                                                    <div class="rate">
                                                                        <div class="rate-item"><i
                                                                                class="fa fa-star"
                                                                                aria-hidden="true"></i></div>
                                                                        <div class="rate-item"><i
                                                                                class="fa fa-star"
                                                                                aria-hidden="true"></i></div>
                                                                        <div class="rate-item"><i
                                                                                class="fa fa-star"
                                                                                aria-hidden="true"></i></div>
                                                                        <div class="rate-item"><i
                                                                                class="fa fa-star"
                                                                                aria-hidden="true"></i></div>
                                                                        <div class="rate-item"><i
                                                                                class="fa fa-star"
                                                                                aria-hidden="true"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-singel">
                                                                <textarea placeholder="Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-singel">
                                                                <button type="button" class="main-btn">Post
                                                                    Comment</button>
                                                            </div>
                                                        </div>
                                                    </div> <!-- row -->
                                                </form>
                                            </div>
                                        </div> <!-- reviews cont --> --}}
                                    </div>
                                </div> <!-- tab content -->
                            </div>
                        </div> <!-- corses singel left -->

                    </div>
                    <div class="col-lg-4">
                        <div class="saidbar">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="saidbar-search mt-30">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <button type="button"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div> <!-- saidbar search -->
                                    <div class="categories mt-30">
                                        <h4>Levels</h4>
                                        @if ($levels->count() > 0)
                                            <ul>
                                                @foreach ($levels as $key => $level)
                                                    <li><a
                                                            href="{{ route('course', ['level_slug' => $level->slug]) }}">{{ $level->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No levels found</p>
                                        @endif
                                    </div>
                                </div> <!-- categories -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="saidbar-post mt-30">
                                        <h4>Related Courses</h4>
                                        <ul>
                                            @if ($related_courses->count() > 0)
                                                @foreach ($related_courses as $key => $related_course)
                                                    <li>
                                                        <a
                                                            href="{{ route('course.detail', ['course_slug' => $related_course->slug]) }}">
                                                            <div class="singel-post">
                                                                <div class="thum">
                                                                    <img style="height:70px;width:100px;"
                                                                        src="{{ asset('/storage/courses') }}/{{ $related_course->image }}"
                                                                        alt="{{ $related_course->title }}">
                                                                </div>
                                                                <div class="cont">
                                                                    <h6>{{ $related_course->title }}</h6>
                                                                    <span>{{ $related_course->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div> <!-- singel post -->
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <p>No releted courses found</p>
                                            @endif
                                        </ul>
                                    </div> <!-- saidbar post -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- saidbar -->
                    </div>
                </div> <!-- row -->
            @endif
        </div> <!-- container -->
    </section>

    <!--====== COURSES SINGEl PART ENDS ======-->
</div>
