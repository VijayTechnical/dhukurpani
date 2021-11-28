@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/css/fancybox.css') }}">
@endpush
<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-4.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $gallery_name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('gallery') }}">Gallery</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $gallery_name }}</li>
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
                @php
                    $images = explode(',', $gallery->images);
                @endphp
                @foreach ($images as $key => $image)
                    @if($key > 0)
                        <div class="col-lg-3 col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <a style="height: 350px;width:350px;" href="{{ asset('/storage/galleries') }}/{{ $image }}" data-fancybox="gallery" class="image">
                                        <img height="350" width="350" src="{{ asset('/storage/galleries') }}/{{ $image }}" alt="{{ $gallery->name }}" class="img-fluid">
                                    </a>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                    @endif
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->
</div>
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/plugins/fancybox/js/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/fancybox/js/custom.fancybox.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            $(function() {

                jQuery.noConflict();
                jQuery('.fancybox').fancybox();

            });
        }(jQuery));
    </script>
@endpush
