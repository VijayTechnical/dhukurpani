<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Level Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Level </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Levels Table</strong>
                            <a href="{{ route('admin.level.add') }}" class="btn btn-success float-right">+ Add Level</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $key=>$level)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $level->name  }}</td>
                                        <td>{{ $level->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.level.edit',['level_id'=>$level->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete the level?') || event.stopImmediatePropagation()" wire:click.prevent="deleteLevel({{ $level->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush
