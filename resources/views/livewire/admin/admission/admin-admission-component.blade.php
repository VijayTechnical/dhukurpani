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
            <li class="breadcrumb-item active">Admission </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Admissions Table</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>GPA</th>
                                        <th>Course/Class</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admissions as $key => $admission)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $admission->name }}</td>
                                            <td>{{ $admission->location }}</td>
                                            <td>{{ $admission->phone }}</td>
                                            <td>{{ $admission->gpa }}</td>
                                            @if($admission->course)
                                            <td>{{ $admission->course->title }}</td>
                                            @else
                                            <td>{{ $admission->class }}</td>
                                            @endif
                                            <td>{{ $admission->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.admission.detail', ['admission_id' => $admission->id]) }}"
                                                    class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
