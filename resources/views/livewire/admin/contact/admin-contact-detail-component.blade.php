<div>
    @section('title', 'Admin-Testimonial-Detail')
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Contact Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.contact') }}">Contact</a></li>
            <li class="breadcrumb-item active">{{ $name }} </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Contact by {{ $name }}</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.contact') }}">Back</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="addReply()">
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="name" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="email" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="phone" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact Subject</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="subject" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact Message</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" class="form-control" wire:model="message"
                                            disabled="disabled"></textarea>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Reply Message</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" placeholder="Enter your reply..." class="form-control" wire:model="reply"></textarea>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button type="submit" class="btn btn-success">Reply</button>
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
