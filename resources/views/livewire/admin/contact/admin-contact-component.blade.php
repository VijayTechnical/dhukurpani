<div>
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Contact Element</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Contact </li>
        </ul>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="messages-block block">
                        <div class="title"><strong>New Messages</strong></div>
                        @if ($contacts->count() > 0)
                            <div class="messages">
                                @foreach ($contacts as $key => $contact)
                                    <a href="{{ route('admin.contact.detail', ['contact_id' => $contact->id]) }}"
                                        class="message d-flex align-items-center">
                                        <div class="profile">
                                            <img src="{{ asset('images/noimage.png') }}" alt="{{ $contact->name }}"
                                                class="img-fluid">
                                            @if ($contact->status == 'notreplied')
                                                <div class="status away"></div>
                                            @else
                                                <div class="status online"></div>
                                            @endif
                                        </div>
                                        <div class="content">
                                            <strong class="d-block">{{ $contact->name }}</strong>
                                            <span class="d-block">{{ \Illuminate\Support\Str::limit($contact->message, 100) }}</span>
                                            <small class="date d-block">{{ $contact->created_at->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-black mt-50">No new contact.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush
