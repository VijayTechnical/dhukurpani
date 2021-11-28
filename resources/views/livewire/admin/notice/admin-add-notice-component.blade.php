<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Notice Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.notice') }}">Notice</a></li>
            <li class="breadcrumb-item active">Add Notice </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Add Notice</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.notice') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="addNotice()">
                                <div class="line"></div>
                                <div class="form-group row  @error('title') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Notice Title</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('title') is-invalid @else  @enderror"
                                            wire:model="title" placeholder="Enter Notice Title" wire:keyup="generateSlug()">
                                        @error('title')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('slug') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Notice Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Notice slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('pdf') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Notice File</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('pdf') is-invalid @else  @enderror"
                                            wire:model="pdf">
                                        @error('pdf')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Notice Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description"
                                            placeholder="Enter Notice Description..."></textarea>
                                        @error('description')
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
