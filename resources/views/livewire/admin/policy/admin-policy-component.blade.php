<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Policy Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Policy </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Policy</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.dashboard') }}">Cancel</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal" wire:submit.prevent="updatePolicy()">
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
