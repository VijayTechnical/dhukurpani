<div>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn">Close <i class="fa fa-close"></i></div>
                    <form id="searchForm" action="#">
                        <div class="form-group">
                            <input type="search" name="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong
                                class="text-primary">DHUKURPANI</strong><strong>SCHOOL</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>S</strong>
                        </div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">

                    <div class="list-inline-item"><a href="#" class="search-open nav-link"><i
                                class="icon-magnifying-glass-browser"></i></a>
                    </div>
                    {{-- <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="#"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1" wrie:poll>
                                {{ $notifications->count() }}</span></a>
                        <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">
                            @if ($notifications->count() > 0)
                            @foreach ($notifications as $notification)
                            @if ($notification->type == 'App\Notifications\SubscriberNotification')
                            <a href="{{ route('admin.notifications') }}"
                                class="dropdown-item message d-flex align-items-center">
                                <div class="profile"><img src="{{ asset('images/bell.png') }}" alt="Subscriber"
                                        class="img-fluid">
                                    <div class="status online"></div>
                                </div>
                                <div class="content">
                                    <strong
                                        class="d-block">{{ Illuminate\Support\Str::limit($notification->data['email'], 15) }}</strong>
                                    <span class="d-block">Subscribed to newsletter</span>
                                    <small class="date d-block">{{ $notification->data['date'] }}</small>
                                </div>
                            </a>
                            @elseif ($notification->type == 'App\Notifications\ContactNotification')
                            <a href="{{ route('admin.notifications') }}"
                                class="dropdown-item message d-flex align-items-center">
                                <div class="profile"><img src="{{ asset('images/contact.jpg') }}" alt="Contact"
                                        class="img-fluid">
                                    <div class="status online"></div>
                                </div>
                                <div class="content">
                                    <strong class="d-block">{{ $notification->data['name'] }}</strong>
                                    <span
                                        class="d-block">{{ Illuminate\Support\Str::limit($notification->data['subject'], 15) }}</span>
                                    <small class="date d-block">{{ $notification->data['date'] }}</small>
                                </div>
                            </a>
                            @endif
                            @endforeach
                            <a href="{{ route('admin.notifications') }}" class="dropdown-item text-center message">
                                <strong>See All Notifications <i class="fa fa-angle-right"></i></strong>
                            </a>
                            @else
                            <p class="text-danger text-center mt-5">No new notifications</p>
                            @endif
                        </div>
                    </div> --}}
                    <!-- Profile -->
                    <div class="list-inline-item logout dropdown">
                        <a type="button" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img height="30" width="30" src="{{ asset('/storage/users') }}/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}">
                            <span class="d-none d-sm-inline">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('admin.profile',['user_id'=>Auth::user()->id]) }}"> <i class="fa fa-user"></i> Profile </a>
                            <a class="dropdown-item" href="{{ route('admin.profile.password',['user_id'=>Auth::user()->id]) }}"> <i class="fa fa-key"></i> Change Password </a>
                            <a class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-logout"></i> Logout </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
