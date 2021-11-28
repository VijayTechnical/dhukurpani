<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Testimonial Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Testimonial </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Testimonials Table</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Reviewer Image</th>
                                        <th>Reviewer Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $key => $testimonial)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><img src="{{ asset('/storage/users') }}/{{ $testimonial->user->profile_photo_path }}"
                                                    class="rounded-circle" style="width:30px;height:30px;"
                                                    alt="{{ $testimonial->user->name }}"></td>
                                            <td>{{ $testimonial->user->name }}</td>
                                            <td>
                                                @if ($testimonial->status == 'active')
                                                    <label wire:click.prevent="changeStatus({{ $testimonial->id }})"
                                                        style="cursor: pointer;"
                                                        class="btn btn-outline-success">Active</label>
                                                @else
                                                    <label wire:click.prevent="changeStatus({{ $testimonial->id }})"
                                                        style="cursor: pointer;"
                                                        class="btn btn-outline-danger">Inactive</label>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.testimonial.detail', ['testimonial_id' => $testimonial->id]) }}"
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
