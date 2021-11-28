<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Gallery Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.gallery') }}">Gallery</a></li>
            <li class="breadcrumb-item active">Add Gallery </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Add Gallery</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.gallery') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="addGallery()">
                                <div class="line"></div>
                                <div class="form-group row  @error('name') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Gallery Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @else  @enderror"
                                            wire:model="name" placeholder="Enter Gallery Name"
                                            wire:keyup="generateSlug()">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('slug') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Gallery Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Gallery Slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('image') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Gallery Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('image') is-invalid @else  @enderror"
                                            wire:model="image">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="80" alt="">
                                        @endif
                                        @error('image')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Select Gallery Images</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="images" placeholder="Images..."
                                            wire:model="images" multiple>
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" width="120" alt="">
                                            @endforeach
                                        @endif
                                        @error('images')
                                            <div class="help-block with-errors">{{ $message }}</div>
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
