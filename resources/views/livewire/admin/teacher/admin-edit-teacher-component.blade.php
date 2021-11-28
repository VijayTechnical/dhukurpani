<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Teacher Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Edit Teacher </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Edit Teacher</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.teacher') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="editTeacher()">
                                <div class="line"></div>
                                <div class="form-group row  @error('name') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @else  @enderror"
                                            wire:model="name" placeholder="Enter Teacher Name" wire:keyup="generateSlug()">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('slug') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Teacher Slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/teachers') }}/{{ $image }}" width="80" alt="{{ $name }}">
                                        @endif
                                        @error('newimage')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('post') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Post</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('post') is-invalid @else  @enderror"
                                            wire:model="post" placeholder="Enter Teacher Post">
                                        @error('post')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('facebook') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Facebook Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('facebook') is-invalid @else  @enderror"
                                            wire:model="facebook" placeholder="Enter Teacher Facebook Link">
                                        @error('facebook')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('instagram') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Instagram Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('instagram') is-invalid @else  @enderror"
                                            wire:model="instagram" placeholder="Enter Teacher Instagram Link">
                                        @error('instagram')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('twitter') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Twitter Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('twitter') is-invalid @else  @enderror"
                                            wire:model="twitter" placeholder="Enter Teacher Twitter Link">
                                        @error('twitter')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('linkedin') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Linked-in Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('linkedin') is-invalid @else  @enderror"
                                            wire:model="linkedin" placeholder="Enter Teacher Linked-in Link">
                                        @error('linkedin')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('short_description') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Teacher Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('short_description') is-invalid @else  @enderror"
                                            wire:model="short_description"
                                            placeholder="Enter Teacher Short Description..."></textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Teacher Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor1" type="text" rows="5"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description"
                                            placeholder="Enter Teacher Description..."></textarea>
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
    $(document).ready(function(){
        const editor = CKEDITOR.replace('editor1');
        editor.on('change', function(e){
            console.log(e.editor.getData())
            @this.set('description', e.editor.getData());
        });
    });
</script>
@endpush
