<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>FAQ'S</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">FAQ'S</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->


    <!--====== FAQ SINGEl PART START ======-->

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>Frequently Asked Questions</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <div class="curriculam-cont">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="heading1">
                                            <a href="#" data-toggle="collapse" data-target="#collapse1"
                                                aria-expanded="true" aria-controls="collapse1">
                                                <ul>
                                                    <li><i class="fa fa-question-circle"></i></li>
                                                    <li><span class="lecture">1</span></li>
                                                    <li><span class="head">loram ipsum</span></li>
                                                    <li>
                                                        <span class="time d-none d-md-block">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>{{ $current_year }}</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </a>
                                        </div>

                                        <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque
                                                    pariatur
                                                    expedita eius, explicabo magni eligendi suscipit architecto eveniet
                                                    molestias, nemo neque quos ab odio, quia eos quis laboriosam quae
                                                    beatae.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading2">
                                            <a href="#" data-toggle="collapse" data-target="#collapse2"
                                                aria-expanded="true" aria-controls="collapse2">
                                                <ul>
                                                    <li><i class="fa fa-question-circle"></i></li>
                                                    <li><span class="lecture">2</span></li>
                                                    <li><span class="head">loram ipsum</span></li>
                                                    <li>
                                                        <span class="time d-none d-md-block">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>{{ $current_year }}</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </a>
                                        </div>

                                        <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque
                                                    pariatur
                                                    expedita eius, explicabo magni eligendi suscipit architecto eveniet
                                                    molestias, nemo neque quos ab odio, quia eos quis laboriosam quae
                                                    beatae.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- FAQ terms -->
                    </div> <!-- FAQ singel left -->

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FQA PART ENDS ======-->
</div>
