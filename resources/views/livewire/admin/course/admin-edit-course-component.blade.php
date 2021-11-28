@push('styles')
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Course Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Edit Course </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Edit Course</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.course') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="editCourse()">
                                <div class="line"></div>
                                <div class="form-group row  @error('title') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Course Title</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('title') is-invalid @else  @enderror"
                                            wire:model="title" placeholder="Enter Course Title"
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
                                    <label class="col-sm-3 form-control-label">Course Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('slug') is-invalid @else  @enderror"
                                            wire:model="slug" placeholder="Enter Course Slug">
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Course Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/courses') }}/{{ $image }}" width="80" alt="">
                                        @endif
                                        @error('newimage')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('students') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Course Number of Students</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('students') is-invalid @else  @enderror"
                                            wire:model="students" placeholder="Enter Course Number of Students">
                                        @error('students')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Select Teachers</label>
                                    <div class="col-sm-9">
                                        <select class="select2 select2-hidden-accessible" id="teachers"
                                            multiple="multipe" data-placeholder="select course teachers"
                                            style="width: 100%;" name="sel_teachers[]" wire:model="sel_teachers">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                            @error('sel_teachers')
                                                <div class="invalid-feedback" role="alert">
                                                    <span> {{ $message }}</span>
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label" for="level">Select Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="level" name="level_id"
                                            wire:model="level_id">
                                            <option value="">Select Level</option>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                            @error('level_id')
                                                <div class="invalid-feedback" role="alert">
                                                    <span> {{ $message }}</span>
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Course Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor1" type="text" rows="5"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description"
                                            placeholder="Enter Course Description..."></textarea>
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
@push('scripts')

    {{-- ckeeditor --}}
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            const editor = CKEDITOR.replace('editor1');
            editor.on('change', function(e) {
                console.log(e.editor.getData())
                @this.set('description', e.editor.getData());
            });
            $("#teachers").select2();
            $('#teachers').on('change', function(e) {
                var data = $('#teachers').select2("val");
                @this.set('sel_teachers', data);
            });
        });
    </script>
@endpush
