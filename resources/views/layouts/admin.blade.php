<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shree Dhukurpani Higher Secondary School</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="google-site-verification" content="gHEdY3tcU4kgZYx0PjI4sQGlTVMU_uHbcU_DSa9EPQQ" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <!-- Datatables -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


    @stack('styles')

    @livewireStyles
</head>

<body>
    @livewire('admin.admin-header-component')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img
                        src="{{ asset('/storage/users') }}/{{ Auth::user()->profile_photo_path }}"
                        alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">{{ Auth::user()->name }}</h1>
                    <p>Admin</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a
                        href="{{ route('admin.dashboard') }}"> <i class="icon-dashboard"></i>Dashboard </a></li>
                <li class="{{ Route::is('admin.about') || Route::is('admin.principal') ? 'active' : '' }}"><a
                        href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i
                            class="fa fa-info-circle"></i>About Elements </a>
                    <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.about') }}">About Us </a></li>
                        <li><a href="{{ route('admin.principal') }}">Principal </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Route::is('admin.user') ? 'active' : '' }}">
                    <a href="{{ route('admin.user') }}"> <i class="fas fa-user"></i>User </a>
                </li>
                <li class="{{ Route::is('admin.teacher') || Route::is('admin.teacher.add') || Route::is('admin.teacher.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.teacher') }}"> <i class="fa fa-chalkboard-teacher"></i>Teacher </a>
                </li>
                <li class="{{ Route::is('admin.facility') || Route::is('admin.facility.add') || Route::is('admin.facility.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.facility') }}"> <i class="fa fa-building"></i>Facility </a>
                </li>
                <li class="{{ Route::is('admin.slider') || Route::is('admin.slider.add') || Route::is('admin.slider.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.slider') }}"> <i class="fa fa-sliders"></i>Slider </a>
                </li>
                <li class="{{ Route::is('admin.brand') || Route::is('admin.brand.add') || Route::is('admin.brand.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.brand') }}"> <i class="fa fa-handshake-o"></i>Brand </a>
                </li>
                <li class="{{ Route::is('admin.admission') || Route::is('admin.admission.detail') ? 'active' : '' }}">
                    <a href="{{ route('admin.admission') }}"> <i class="fa fa-university"></i>Admission </a>
                </li>
                <li class="{{ Route::is('admin.contact') || Route::is('admin.contact.detail') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact') }}"> <i class="icon-mail"></i>Contact </a>
                </li>
                <li class="{{ Route::is('admin.testimonial') || Route::is('admin.testimonial.detail') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonial') }}"> <i class="fa fa-quote-left"></i>Testimonial </a>
                </li>
                <li
                    class="{{ Route::is('admin.level') || Route::is('admin.level.add') || Route::is('admin.level.edit') || Route::is('admin.course') || Route::is('admin.course.add') || Route::is('admin.course.edit') ? 'active' : '' }}">
                    <a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i
                            class="fa fa-book-reader"></i>Course Elements </a>
                    <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.level') }}">Level </a></li>
                        <li><a href="{{ route('admin.course') }}"></i>Course </a></li>
                    </ul>
                </li>
                <li
                    class="{{ Route::is('admin.category') || Route::is('admin.category.add') || Route::is('admin.category.edit') || Route::is('admin.blog') || Route::is('admin.blog.add') || Route::is('admin.blog.edit') ? 'active' : '' }}">
                    <a href="#exampledropdownDropdown4" aria-expanded="false" data-toggle="collapse"> <i
                            class="fas fa-blog"></i>Blog Elements </a>
                    <ul id="exampledropdownDropdown4" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.category') }}">Category </a></li>
                        <li><a href="{{ route('admin.blog') }}">Blog </a></li>
                    </ul>
                </li>
                <li
                    class="{{ Route::is('admin.gallery') || Route::is('admin.gallery.add') || Route::is('admin.gallery.edit') || Route::is('admin.video') || Route::is('admin.video.add') || Route::is('admin.video.edit') ? 'active' : '' }}">
                    <a href="#exampledropdownDropdown5" aria-expanded="false" data-toggle="collapse"> <i
                            class="fas fa-image"></i>Gallery Elements </a>
                    <ul id="exampledropdownDropdown5" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.gallery') }}">Gallery </a></li>
                        <li><a href="{{ route('admin.video') }}">Video </a></li>
                    </ul>
                </li>
                <li
                    class="{{ Route::is('admin.event') || Route::is('admin.event.add') || Route::is('admin.event.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.event') }}"> <i class="fa fa-calendar"></i>Events </a>
                </li>
                <li
                    class="{{ Route::is('admin.notice') || Route::is('admin.notice.add') || Route::is('admin.notice.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.notice') }}"> <i class="fas fa-bell"></i>Notices </a>
                </li>
                <li class="{{ Route::is('admin.popup') ? 'active' : '' }}">
                    <a href="{{ route('admin.popup') }}"> <i class="fas fa-external-link-alt"></i>Popups </a>
                </li>
                <li class="{{ Route::is('admin.policy') ? 'active' : '' }}"><a href="{{ route('admin.policy') }}">
                        <i class="fa fa-ban"></i>Privacy &amp; Policy </a></li>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            {{ $slot }}
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <script>
                            document.write(new Date().getFullYear());
                        </script> &copy; All rights reserved.Shree Dhukurpani Secondary School. <a
                            href="http://vijaytechnical.herokuapp.com/"><i class="fa fa-heart"></i>
                            VijayTechnical</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    {{-- sweet alert --}}
    <script src="{{ asset('admin/js/sweetalert.js') }}"></script>
    <script>
        window.addEventListener('swal:model', event => {
            swal({
                icon: event.detail.statuscode,
                text: event.detail.text,
                title: event.detail.title,
            });
        });
    </script>

    @stack('scripts')


    @livewireScripts
</body>

</html>
