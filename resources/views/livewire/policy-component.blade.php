<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Privacy-Policy</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Privacy-Policy</li>
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
        @if ($policy)
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title mt-50">
                            <h5>Privacy Policy</h5>
                        </div> <!-- section title -->
                        <div class="about-cont">
                            <p>{!! htmlspecialchars_decode($policy->description) !!}</p>
                        </div>
                    </div> <!-- about cont -->
                </div> <!-- row -->
            </div> <!-- container -->
        @endif
    </section>

    <!--====== ABOUT PART ENDS ======-->
</div>
