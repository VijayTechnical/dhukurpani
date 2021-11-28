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
            <li class="breadcrumb-item active">Course </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Courses Table</strong>
                            <a href="{{ route('admin.course.add') }}" class="btn btn-success float-right">+ Add Course</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Level</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key=>$course)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td><img src="{{ asset('/storage/courses') }}/{{ $course->image }}" class="rounded-circle" style="width:30px;height:30px;" alt="{{ $course->title }}"></td>
                                        <td>{{ $course->title  }}</td>
                                        <td>{{ $course->level->name }}</td>
                                        <td>{{ $course->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.course.edit',['course_id'=>$course->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete the course?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCourse({{ $course->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
