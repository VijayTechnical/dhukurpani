<div>
    @section('title', 'Admin-Principal')
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Principal Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Principal </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Principal</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.dashboard') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="updatePrincipal()">
                                <div class="line"></div>
                                <div class="form-group row  @error('name') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Principal Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @else  @enderror"
                                            wire:model="name" placeholder="Enter Principal Name">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <span> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row @error('newimage') has-danger @enderror">
                                    <label class="col-sm-3 form-control-label">Principal Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('newimage') is-invalid @else  @enderror"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="80" alt="">
                                        @else
                                            <img src="{{ asset('/storage/principals') }}/{{ $image }}" width="80"
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
                                <div class="form-group row @error('message') has-danger @enderror" wire:ignore>
                                    <label class="col-sm-3 form-control-label">Principal Message</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" rows="8"
                                            class="form-control @error('message') is-invalid @else  @enderror"
                                            wire:model="message" placeholder="Enter Principal Message..."
                                            id="editor1"></textarea>
                                        @error('message')
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
            @this.set('message', e.editor.getData());
        });
    });
</script>
@endpush
