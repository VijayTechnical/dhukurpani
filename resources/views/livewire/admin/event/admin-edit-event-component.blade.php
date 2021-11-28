
<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Event Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.event') }}">Event</a></li>
            <li class="breadcrumb-item active">Edit Event </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Edit Event</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.event') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="editEvent()">
                                <div class="line"></div>
                                <div class="form-group row  @error('title') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Title</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('title') is-invalid @else  @enderror"
                                            wire:model="title" placeholder="Enter Event Title"
                                            wire:keyup="generateSlug()">
                                        @error('title')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('slug') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Event Slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('color') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Color</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('color') is-invalid @else  @enderror"
                                            wire:model="color" placeholder="Enter Event Color">
                                        @error('color')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('start_date') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Start Date</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('start_date') is-invalid @else  @enderror"
                                            wire:model="start_date" placeholder="Enter Event Start Date">
                                        @error('start_date')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('end_date') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event End Date</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('end_date') is-invalid @else  @enderror"
                                            wire:model="end_date" placeholder="Enter Event End Date">
                                        @error('end_date')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('time') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Time</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('time') is-invalid @else  @enderror"
                                            wire:model="time" placeholder="Enter Event Time">
                                        @error('time')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('location') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Location</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('location') is-invalid @else  @enderror"
                                            wire:model="location" placeholder="Enter Event Location">
                                        @error('location')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Event Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/events') }}/{{ $image }}" width="80" alt="{{ $title }}">
                                        @endif
                                        @error('newimage')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Event Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor1" type="text" rows="5"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description"
                                            placeholder="Enter Event Description..."></textarea>
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
                                        <button type="submit" class="btn btn-success">Update</button>
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
@push('scripts')

    {{-- ckeeditor --}}
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            const editor = CKEDITOR.replace('editor1');
            editor.on('change', function(e) {
                console.log(e.editor.getData())
                @this.set('description', e.editor.getData());
            });
        });
    </script>
@endpush
