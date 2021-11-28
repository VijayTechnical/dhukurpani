<div>
    <header id="header-part">

        @if ($about)

            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact text-lg-left text-center">
                                @php
                                    $school_emails = explode(',', $about->email);
                                @endphp
                                <ul>
                                    <li><img src="{{ asset('assets/images/all-icon/map.png') }}"
                                            alt="icon"><span>{{ $about->location }}</span></li>
                                    <li><img src="{{ asset('assets/images/all-icon/email.png') }}" alt="icon">
                                        @foreach ($school_emails as $key => $school_email)
                                            @if ($key == 0)
                                                <span>{{ $school_email }}</span>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-opening-time text-lg-right text-center">
                                <p>Opening Hours : Sunday to Friday - 6 AM to 5 PM</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header top -->

            <div class="header-logo-support pt-40 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('/storage/logos') }}/{{ $about->logo1 }}" alt="Logo1">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="support-button float-right d-none d-md-block">
                                <div class="support float-left">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/all-icon/support.png') }}" alt="icon">
                                    </div>
                                    @php
                                        $school_phones = explode(',', $about->phone);
                                    @endphp
                                    <div class="cont">
                                        <p>Need Help? call us free</p>
                                        @foreach ($school_phones as $key => $school_phone)
                                            @if ($key == 0)
                                                <span>{{ $school_phone }}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="button float-left">
                                    <a href="{{ route('admission',['admission_slug'=>'school']) }}" class="main-btn">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header logo support -->

        @endif

        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="{{ Route::is('home') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::is('about') || Route::is('teacher') || Route::is('teacher.detail') || Route::is('principal') || Route::is('facility') ? 'active' : '' }}"
                                            href="javascript:void(0);">About Us</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('about') }}">About School</a></li>
                                            <li><a href="{{ route('teacher') }}">About Teachers</a></li>
                                            <li><a href="{{ route('principal') }}">Principal Message</a></li>
                                            <li><a href="{{ route('facility') }}">Our Facilities</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);"
                                            class="{{ Route::is('gallery') || Route::is('gallery.detail') || Route::is('video') ? 'active' : '' }}">Gallary</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('gallery') }}">Images</a></li>
                                            <li><a href="{{ route('video') }}">Videos</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('course') }}"
                                            class="{{ Route::is('course') || Route::is('course.detail') ? 'active' : '' }}">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::is('blog') || Route::is('blog.detail') || Route::is('category') ? 'active' : '' }}"
                                            href="{{ route('blog') }}">Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::is('event') || Route::is('event.detail') || Route::is('calendar') ? 'active' : '' }}"
                                            href="javascript:void(0);">Events</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('about') }}">School Events</a></li>
                                                <li><a href="{{ route('calendar') }}">School Calendar</a></li>
                                            </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::is('contact') ? 'active' : '' }}"
                                            href="{{ route('contact') }}">Contact</a>
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->utype === 'ADM')
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);">
                                                        @if (auth()->user()->profile_photo_path == '')
                                                            <img src="{{ asset('images/noimage.png') }}" height="30"
                                                                width="30" class="rounded-circle">
                                                            {{ Auth::user()->name }}
                                                        @else
                                                            <img src="{{ asset('/storage/users') }}/{{ Auth::user()->profile_photo_path }}"
                                                                height="30" width="30" class="rounded-circle">
                                                            {{ Auth::user()->name }}
                                                            @endif <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                        <li>
                                                            <a href="#"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);"
                                                        class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
                                                        @if (auth()->user()->profile_photo_path == '')
                                                            <img src="{{ asset('images/noimage.png') }}" height="30"
                                                                width="30" class="rounded-circle">
                                                            {{ Auth::user()->name }}
                                                        @else
                                                            <img src="{{ asset('/storage/users') }}/{{ Auth::user()->profile_photo_path }}"
                                                                height="30" width="30" class="rounded-circle">
                                                            {{ Auth::user()->name }}
                                                            @endif <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                        <li>
                                                            <a href="#"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item">
                                                <a class="{{ Route::is('login') || Route::is('register') || Route::is('password.request') ? 'active' : '' }}"
                                                    href="{{ route('login') }}">Login</a>
                                            </li>
                                        @endif
                                        @endif
                                    </ul>
                                </div>
                            </nav> <!-- nav -->
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                            <div class="right-icon text-right">
                                <ul>
                                    <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                    <li>
                                        <a href="{{ route('notice') }}"
                                            class="{{ Route::is('notice') || Route::is('notice.detail') ? 'active' : '' }}">
                                            <i class="fa fa-bell"></i>
                                            @if ($notices->count() > 0)
                                                <span>{{ $notices->count() }}</span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div> <!-- right icon -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </header>
    </div>
