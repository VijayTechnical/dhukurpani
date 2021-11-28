<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
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
                            <li class="nav-item">Showning {{ $teachers->count() }} 0f {{ $paginate }} Results
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
            @if ($teachers->count() > 0)
            <div class="row">
                    @foreach ($teachers as $key => $teacher)
                        <div class="col-lg-3 col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <img height="350" width="350" src="{{ asset('/storage/teachers') }}/{{ $teacher->image }}" alt="Teachers">
                                </div>
                                <div class="cont">
                                    <a href="{{ route('teacher.detail',['teacher_slug'=>$teacher->slug]) }}">
                                        <h6>{{ $teacher->name }}</h6>
                                    </a>
                                    <span>{{ $teacher->post }}</span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                    @endforeach
            </div> <!-- row -->
            @else
            <p class="text-center text-black-500 mt-20">No Teachers Found</p>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            {{ $teachers->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav> <!-- courses pagination -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->
</div>
