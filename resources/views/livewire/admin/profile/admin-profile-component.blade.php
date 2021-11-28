<div>
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Profile</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-block block text-center">
                        <div class="avatar"><img src="{{ asset('/storage/users') }}/{{ $user->profile_photo_path }}" alt="{{ $user->name }}" class="img-fluid">
                            <div class="order dashbg-2">{{ $user->id }}</div>
                        </div><a href="#" class="user-title">
                            <h3 class="h5">{{ $user->name }}</h3><span>{{ $user->email }}</span>
                        </a>
                        <div class="contributions">950 Contributions</div>
                        <div class="details d-flex">
                            <div class="item"><a href="{{ route('admin.profile.password',['user_id'=>$user->id]) }}"><i class="fa fa-key"></i><strong>Change Password</strong></a></div>
                            <div class="item"><a href="#"><i class="fa fa-edit"></i><strong>Courses</strong></a></div>
                            <div class="item"><a href="#"><i class="fa fa-file"></i><strong>Visit Blogs</strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Profile</strong></div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="updateProfile()">
                                <div class="line"></div>
                                <div class="form-group row  @error('name') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @else  @enderror"
                                            wire:model="name" placeholder="Enter User Name">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('email') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">User Email</label>
                                    <div class="col-sm-9">
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @else  @enderror"
                                            wire:model="email" placeholder="Enter User Email">
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">User Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/users') }}/{{ $image }}" width="80" alt="">
                                        @endif
                                        @error('newimage')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
