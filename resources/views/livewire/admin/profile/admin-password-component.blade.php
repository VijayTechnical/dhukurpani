<div>
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Profile / Change Password</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Change Password</strong></div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="changePassword()">
                                <div class="line"></div>
                                <div class="form-group row  @error('current_password') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('current_password') is-invalid @else  @enderror"
                                            wire:model="current_password" placeholder="Enter Current Password...">
                                        @error('current_password')
                                        <div class="invalid-feedback" role="alert">
                                            <span> {{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('password') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('password') is-invalid @else  @enderror"
                                            wire:model="password" placeholder="Enter New Password...">
                                        @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <span> {{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('password_confirmation') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('password_confirmation') is-invalid @else  @enderror"
                                            wire:model="password_confirmation" placeholder="Enter Confirm Password...">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback" role="alert">
                                            <span> {{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" class="btn btn-success">Change</button>
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
