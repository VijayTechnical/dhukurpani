<div>
    @section('title', 'Admin-Testimonial-Detail')
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Testimonial Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.testimonial') }}">Testimonial</a></li>
            <li class="breadcrumb-item active">{{ $name }} </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Testimonial by {{ $name }}</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.testimonial') }}">Back</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal">
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Reviewer name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="name" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Reviewer Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" wire:model="image"
                                            disabled="disabled">
                                        @if ($image)
                                            <img src="{{ asset('/storage/users') }}/{{ $image }}" width="80"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Message</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" class="form-control" wire:model="message"
                                            disabled="disabled"></textarea>
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
