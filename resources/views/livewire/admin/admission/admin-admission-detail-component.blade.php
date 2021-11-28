<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admission Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.admission') }}">Admission</a></li>
            <li class="breadcrumb-item active">{{ $name }} </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Application by {{ $name }}</strong>
                            <a class="btn btn-danger float-right" href="{{ route('admin.admission') }}">Back</a>
                        </div>
                        <div class="block-body">
                            <form class="form-horizontal">
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="name" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Birth Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="birth" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="email" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Gender</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="gender" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Location</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="location" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Nationality</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="nationality" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="phone" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Parent Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="parent_name" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Relation With Parent</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="parent_relation" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Parent Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="parent_number" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Course</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="course" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant Gpa In SEE</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="gpa" disabled="disabled">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Applicant School</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="school" disabled="disabled">
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
