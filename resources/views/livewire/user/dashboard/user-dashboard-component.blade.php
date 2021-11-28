<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img height="300" src="{{ asset('/storage/users') }}/{{ Auth::user()->profile_photo_path }}"
                                alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="name">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="javascript:void(0);"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                                    role="tab" aria-controls="dashboard" aria-selected="true" wire:ignore>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses"
                                    aria-selected="false" wire:ignore>Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false" wire:ignore>Reviews</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab" wire:ignore.self>
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Update Profile</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#" enctype="multipart/form-data"
                                            wire:submit.prevent="updateProfile()">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="image">Profile Image</label>
                                                        <input type="file" id="image" name="image"
                                                            wire:model="newimage">
                                                        @if ($newimage)
                                                            <img src="{{ $newimage->temporaryUrl() }}" width="80"
                                                                alt="{{ $name }}">
                                                        @else
                                                            <img src="{{ asset('/storage/users') }}/{{ $image }}"
                                                                alt="{{ $name }}" width="80">
                                                        @endif
                                                        @error('newimage')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="name">Full Name</label>
                                                        <input type="text" id="name" name="name" placeholder="Name"
                                                            wire:model="name">
                                                        @error('name')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="email">Email Address</label>
                                                        <input type="email" id="email" name="email" placeholder="Email"
                                                            wire:model="email">
                                                        @error('email')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="submit" class="main-btn">Update</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab" wire:ignore.self>
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Change Password</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#" wire:submit.prevent="changePassword()">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="current_password">Current Password</label>
                                                        <input type="password" id="current_password"
                                                            placeholder="Current password"
                                                            wire:model="current_password">
                                                        @error('current_password')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="password">New Password</label>
                                                        <input type="password" id="password" placeholder="New password"
                                                            wire:model="password">
                                                        @error('password')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-singel">
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        <input type="password" id="password_confirmation"
                                                            placeholder="Confirm Password"
                                                            wire:model="password_confirmation">
                                                        @error('password_confirmation')
                                                            <div class="help-block with-errors">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="submit" class="main-btn">Submit</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" wire:ignore.self>
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#" wire:submit.prevent="addReview()">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <textarea placeholder="Comment" wire:model="message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="submit" class="main-btn">Submit</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- teachers right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
</div>
@push('scripts')
<script src="{{ asset('assets/js/enable-push.js') }}" defer></script>
@endpush
