<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('event') }}">Events</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="events-area">
                @if ($event)
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="events-left">
                                <h3>{{ $event->title }}</h3>
                                <a href="javascript:void(0);"><span><i class="fa fa-calendar"></i> {{ $event->start_date }}  to  {{ $event->end_date }}</span></a>
                                <a href="javascript:void(0);"><span><i class="fa fa-clock-o"></i> {{ $event->time }}</span></a>
                                <a href="javascript:void(0);"><span><i class="fa fa-map-marker"></i> {{ $event->location }}</span></a>
                                <img style="width: 100%;height:500px;" src="{{ asset('/storage/events') }}/{{ $event->image }}"
                                    alt="{{ $event->title }}">
                                <p>{!! htmlspecialchars_decode($event->description) !!}</p>
                            </div> <!-- events left -->
                        </div>
                        <div class="col-lg-4">
                            <div class="events-right">
                                <div class="events-coundwon bg_cover" data-overlay="8"
                                    style="background-image: url(images/event/singel-event/coundown.jpg)">
                                    <div data-countdown="2020/03/12"></div>
                                    <div class="events-coundwon-btn pt-30">
                                        <a href="javascript:void(0);" class="main-btn">Participate</a>
                                    </div>
                                </div> <!-- events coundwon -->
                                @php
                                    $time = explode('-', $event->time);
                                    $end = array_pop($time);
                                    $start = implode('-', $time);
                                @endphp
                                <div class="events-address mt-30">
                                    <ul>
                                        <li>
                                            <div class="singel-address">
                                                <div class="icon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <div class="cont">
                                                    <h6>Start Time</h6>
                                                    <span>{{ $start }}</span>
                                                </div>
                                            </div> <!-- singel address -->
                                        </li>
                                        <li>
                                            <div class="singel-address">
                                                <div class="icon">
                                                    <i class="fa fa-bell-slash"></i>
                                                </div>
                                                <div class="cont">
                                                    <h6>Finish Time</h6>
                                                    <span>{{ $end }}</span>
                                                </div>
                                            </div> <!-- singel address -->
                                        </li>
                                        <li>
                                            <div class="singel-address">
                                                <div class="icon">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                                <div class="cont">
                                                    <h6>Address</h6>
                                                    <span>{{ $event->location }}</span>
                                                </div>
                                            </div> <!-- singel address -->
                                        </li>
                                    </ul>
                                    <div id="contact-map" class="mt-25"></div> <!-- Map -->
                                </div> <!-- events address -->
                            </div> <!-- events right -->
                        </div>
                    </div> <!-- row -->
                @endif
            </div> <!-- events-area -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
</div>
