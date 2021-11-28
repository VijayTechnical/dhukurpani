<div>
    <footer id="footer-part">
        @if($about)
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('/storage/logos') }}/{{ $about->logo2 }}" alt="Logo2"></a>
                            </div>
                            <p>{{ $about->short_description }}</p>
                            <ul class="mt-20">
                                <li><a href="{{ $about->facebook }}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $about->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $about->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $about->instagram }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="{{ route('home') }}"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="{{ route('about') }}"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="{{ route('course') }}"><i class="fa fa-angle-right"></i>Courses</a></li>
                                <li><a href="{{ route('blog') }}"><i class="fa fa-angle-right"></i>Blogs</a></li>
                                <li><a href="{{ route('event') }}"><i class="fa fa-angle-right"></i>Events</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('gallery') }}"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                <li><a href="{{ route('video') }}"><i class="fa fa-angle-right"></i>Videos</a></li>
                                <li><a href="{{ route('teacher') }}"><i class="fa fa-angle-right"></i>Teachers</a></li>
                                <li><a href="{{ route('admission',['admission_slug'=>'school']) }}"><i class="fa fa-angle-right"></i>Admission</a></li>
                                <li><a href="{{ route('notice') }}"><i class="fa fa-angle-right"></i>Notices</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="{{ route('faq') }}"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="{{ route('policy') }}"><i class="fa fa-angle-right"></i>Privacy &amp; Policy </a></li>
                                <li><a href="{{ route('policy') }}"><i class="fa fa-angle-right"></i>Terms &amp; Conditions </a></li>
                                <li><a href="{{ route('calendar') }}"><i class="fa fa-angle-right"></i>Calendar</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fa fa-angle-right"></i>Contact</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>{{ $about->location }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>{{ $about->phone }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="cont">
                                        <p>{{ $about->email }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        @endif

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright text-md-left text-center pt-15">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Shree Dhukurpani Secondary School - All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright text-md-right text-center pt-15">
                            <p>Powered By: <a href="http://vijaytechnical.herokuapp.com/" class="text-white"> <img style="height: 30px;width:100%;" src="{{ asset('assets/images/vijaytechnical.png') }}" /></a></p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
</div>
