<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-4.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Video Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
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
                            <li class="nav-item">Showning {{ $videos->count() }} 0f {{ $paginate }} Results
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
            @if ($videos->count() > 0)
                <div class="row">
                    @foreach ($videos as $key => $video)
                        <div class="col-lg-3 col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <img height="500"
                                        src="{{ asset('/storage/videos') }}/{{ $video->image }}"
                                        alt="{{ $video->name }}" class="img-fluid">
                                    <a class="btn btn-primary" style="position:absolute; bottom: 90px; right:120px;"
                                        href="{{ $video->video }}" data-fancybox="gallery">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                    @endforeach
                </div> <!-- row -->
            @else
                <p class="text-center text-black mt-20">No videos found</p>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            {{ $videos->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav> <!-- courses pagination -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->
</div>
