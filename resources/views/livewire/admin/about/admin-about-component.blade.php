<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">About Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">About </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update About</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.dashboard') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="updateAbout()">
                                <div class="line"></div>
                                <div class="form-group row  @error('name') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @else  @enderror"
                                            wire:model="name" placeholder="Enter School Name">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newlogo1') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Logo1</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newlogo1') is-invalid @else  @enderror"
                                            wire:model="newlogo1">
                                        @if ($newlogo1)
                                            <img src="{{ $newlogo1->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/logos') }}/{{ $logo1 }}" width="80"
                                                alt="">
                                        @endif
                                        @error('newlogo1')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newlogo2') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Logo1</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newlogo2') is-invalid @else  @enderror"
                                            wire:model="newlogo2">
                                        @if ($newlogo2)
                                            <img src="{{ $newlogo2->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/logos') }}/{{ $logo2 }}" width="80"
                                                alt="">
                                        @endif
                                        @error('newlogo2')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/abouts') }}/{{ $image }}" width="80"
                                                alt="">
                                        @endif
                                        @error('newimage')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('location') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Location</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('location') is-invalid @else  @enderror"
                                            wire:model="location" placeholder="Enter School Location">
                                        @error('location')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('email') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Email</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('email') is-invalid @else  @enderror"
                                            wire:model="email" placeholder="Enter School Email">
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('phone') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Your School Number</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('phone') is-invalid @else  @enderror"
                                            wire:model="phone" placeholder="Enter School Number">
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('facebook') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Facebook Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('facebook') is-invalid @else  @enderror"
                                            wire:model="facebook" placeholder="Enter School Facebook Link">
                                        @error('facebook')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('twitter') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Twitter Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('twitter') is-invalid @else  @enderror"
                                            wire:model="twitter" placeholder="Enter School Twitter Link">
                                        @error('twitter')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('instagram') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Instagram Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('instagram') is-invalid @else  @enderror"
                                            wire:model="instagram" placeholder="Enter School Instagram Link">
                                        @error('instagram')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row  @error('youtube') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Youtube Link</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('youtube') is-invalid @else  @enderror"
                                            wire:model="youtube" placeholder="Enter School Youtube Link">
                                        @error('youtube')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('short_description') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('short_description') is-invalid @else  @enderror"
                                            wire:model="short_description"
                                            placeholder="Enter School Short Description..."></textarea>
                                        @error('short_description')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('feature') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School feature</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('feature') is-invalid @else  @enderror"
                                            wire:model="feature" placeholder="Enter School feature..."></textarea>
                                        @error('feature')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('mission') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School Mission</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('mission') is-invalid @else  @enderror"
                                            wire:model="mission" placeholder="Enter School Mission..."></textarea>
                                        @error('mission')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('vision') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">School vision</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="5"
                                            class="form-control @error('vision') is-invalid @else  @enderror"
                                            wire:model="vision" placeholder="Enter School vision..."></textarea>
                                        @error('vision')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('description') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">School Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="8"
                                            class="form-control @error('description') is-invalid @else  @enderror"
                                            wire:model="description" placeholder="Enter School Description..."
                                            id="editor1"></textarea>
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
