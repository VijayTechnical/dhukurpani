
<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Blog Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blog') }}">Blog</a></li>
            <li class="breadcrumb-item active">Edit Blog </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Edit Blog</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.blog') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="editBlog()">
                                <div class="line"></div>
                                <div class="form-group row  @error('title') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Blog Title</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('title') is-invalid @else  @enderror"
                                            wire:model="title" placeholder="Enter Blog Title"
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
                                    <label class="col-sm-3 form-control-label">Blog Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Blog Slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Blog Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/blogs') }}/{{ $image }}" width="80" alt="{{ $title }}">
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
                                    <label class="col-sm-3 form-control-label">Select Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="level" name="category"
                                            wire:model="category_id">
                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            @error('category_id')
                                                <div class="invalid-feedback" role="alert">
                                                    <span> {{ $message }}</span>
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('subtitle') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Blog Subtitle</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('subtitle') is-invalid @else  @enderror"
                                            wire:model="subtitle"
                                            placeholder="Enter Blog Subtitle..."></textarea>
                                        @error('subtitle')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Blog Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor1" type="text" rows="5"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description"
                                            placeholder="Enter Blog Description..."></textarea>
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
