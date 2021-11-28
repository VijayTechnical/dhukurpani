<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-1.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $notice_title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('notice') }}">Notice</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $notice_title }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if($notice)
                    <div class="blog-details mt-30">
                        <div class="cont">
                            <h3>{{ $notice->title }}</h3>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="fa fa-calendar"></i>{{ $notice->created_at->diffForHumans()  }}</a></li>
                            </ul>
                            <p>{!! htmlspecialchars_decode($notice->description) !!} </p>
                            <a href="javascript:void(0);" wire:click="download({{ $notice->id }})" class="main-btn mt-5">Download</a>
                        </div> <!-- cont -->
                        <div class="thum">
                            <object style="height:300px;width:100%;" data="{{ asset('/storage/notices') }}/{{ $notice->pdf }}"></object>
                        </div>
                    </div> <!-- blog details -->
                    @else
                    <h1 class="text-center text-black">No notice detail found.</h1>
                    @endif
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->
</div>
