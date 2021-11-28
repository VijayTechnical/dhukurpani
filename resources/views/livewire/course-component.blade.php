<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-4.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                            <h2>Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES PART START ======-->

    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid"
                                    role="tab" aria-controls="courses-grid" aria-selected="true"><i
                                        class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab"
                                    aria-controls="courses-list" aria-selected="false"><i
                                        class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showning {{ $courses->count() }} 0f {{ $paginate }} Results
                            </li>
                        </ul> <!-- nav -->

                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search" wire:model="searchTerm">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="courses-grid" role="tabpanel"
                    aria-labelledby="courses-grid-tab">
                    @if ($courses->count() > 0)
                        <div class="row">
                            @foreach ($courses as $key => $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img height="250" src="{{ asset('/storage/courses') }}/{{ $course->image }}"
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
                                            <a
                                                href="{{ route('course.detail', ['course_slug' => $course->slug]) }}">
                                                <h4>{{ $course->title }}</h4>
                                            </a>
                                            <div class="course-teacher">
                                                @foreach ($course->teachers as $key => $teacher)
                                                    @if ($key == 0)
                                                        <div class="thum">
                                                            <a href="{{ route('teacher.detail',['teacher_slug'=>$teacher->slug]) }}"><img
                                                                    src="{{ asset('/storage/teachers') }}/{{ $teacher->image }}"
                                                                    alt="{{ $teacher->name }}"></a>
                                                        </div>
                                                        <div class="name">
                                                            <a href="{{ route('teacher.detail',['teacher_slug'=>$teacher->slug]) }}">
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
                        </div> <!-- row -->
                    @else
                        <p class="text-black text-center mt-5">No courses found for {{ $level_name }} level.</p>
                    @endif
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            {{ $courses->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav> <!-- courses pagination -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->
</div>
