@extends('../layouts/account/accountlayout', [
    'pagedata' => $pagedata,
    'title' => 'Profile  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    {{-- <div class="preloader">
        <img src="{{ $pagedata->site_logo }}" alt="loader" class="lds-ripple img-fluid">
    </div> --}}
    <div id="main-wrapper">
        <!--  Sidebar End -->
        <div class="page-wrapper">
            {{-- aside --}}
            <x-account.aside />
            {{-- Header start --}}
            <x-account.header />
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">User Profile</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">User Profile</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-3">
                                    <div class="text-center mb-n5">
                                        <img src="{{ asset('admin-assets/images/breadcrumb/ChatBc.png') }}" alt=""
                                            class="img-fluid mb-n4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <img src="{{ asset(auth()->user()->avatar) }}" alt="" class="w-100 object-fit-cover"
                                height="200" style="">
                            <div class="row align-items-center">

                                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                                    <div class="mt-n5 pb-3">
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            <div class="d-flex align-items-center justify-content-center round-110">
                                                <div
                                                    class="border  border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                                    <img src="{{ asset(auth()->user()->avatar) }}" alt=""
                                                        class="w-100 h-100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center ">
                                            <h5 class="fs-5 mb-0 fw-semibold">
                                                {{ auth()->user()->fullname }}
                                            </h5>
                                            <p class="mb-0 fs-4">
                                                {{ auth()->user()->role }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-none border">
                                        <div class="card-body">
                                            <h4 class="fw-semibold mb-3">Bio Data</h4>
                                            {{-- <p></p> --}}
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                                                    <i class="ti ti-user text-dark fs-6"></i>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ auth()->user()->fullname }}
                                                    </h6>
                                                </li>
                                                <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                                                    <i class="ti ti-briefcase text-dark fs-6"></i>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ auth()->user()->role }}
                                                    </h6>
                                                </li>
                                                <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                                                    <i class="ti ti-mail text-dark fs-6"></i>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ auth()->user()->email }}
                                                    </h6>
                                                </li>

                                                <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                                                    <i class="ti ti-user text-dark fs-6"></i>
                                                    <h6 class="fw-semibold mb-0">
                                                        {{ auth()->user()->user_id }}
                                                    </h6>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger bg-danger alert-dismissible fade show"
                                            role="alert">
                                            <strong>Error!</strong> {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>error!</strong> {{ $error }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="border p-4 py-5 rounded-4">
                                        <div class="card shadow-none border">
                                            <div class="card-body">
                                                <h4 class="fw-semibold mb-3">Update Bio</h4>
                                                {{-- <p></p> --}}
                                                <form id="updateProfileForm" method="POST"
                                                    action="{{ route('account.setting') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <ul class="list-unstyled mb-0">

                                                        <li class="flex-wrap mb-4">
                                                            <label for=""
                                                                class="d-flex align-items-center gap-2 flex-wrap ">

                                                                <i class="ti ti-user text-dark "></i>
                                                                <p class=" fw-semibold mb-0">
                                                                    Fullname
                                                                </p>
                                                            </label>
                                                            <div class="mt-2 ">

                                                                <input type="text "
                                                                    value="{{ old('fullname', auth()->user()->fullname) }}"
                                                                    required name="fullname"
                                                                    class="w-100 border rounded p-2"
                                                                    style="outline: none;">
                                                            </div>
                                                        </li>
                                                        <li class="flex-wrap mb-4">
                                                            <label for=""
                                                                class="d-flex align-items-center gap-2 flex-wrap ">

                                                                <i class="ti ti-phone text-dark "></i>
                                                                <p class=" fw-semibold mb-0">
                                                                    phone number
                                                                </p>
                                                            </label>
                                                            <div class="mt-2 ">

                                                                <input type="number " name="phone"
                                                                    class="w-100 border rounded p-2"
                                                                    style="outline: none;"
                                                                    value="{{ old('phone', auth()->user()->phone) }}"
                                                                    required class="w-100 border rounded p-2"
                                                                    style="outline: none;">
                                                            </div>
                                                        </li>
                                                        <li class="flex-wrap mb-4">
                                                            <label for=""
                                                                class="d-flex align-items-center gap-2 flex-wrap ">

                                                                <i class="ti ti-mail text-dark "></i>
                                                                <p class=" fw-semibold mb-0">
                                                                    Email
                                                                </p>
                                                            </label>
                                                            <div class="mt-2 ">

                                                                <input type="email " name="email"
                                                                    value="{{ old('email', auth()->user()->email) }}"
                                                                    class="w-100 border rounded p-2"
                                                                    style="outline: none;" disabled>
                                                            </div>
                                                        </li>
                                                        <li class="flex-wrap mb-4">
                                                            <label for=""
                                                                class="d-flex align-items-center gap-2 flex-wrap ">

                                                                <i class="ti ti-user text-dark"></i>
                                                                <p class=" fw-semibold mb-0">
                                                                    User Id
                                                                </p>
                                                            </label>
                                                            <div class="mt-2 ">

                                                                <input type="text " name="user_id"
                                                                    value="{{ old('user_id', auth()->user()->user_id) }}"
                                                                    class="w-100 border rounded p-2"
                                                                    style="outline: none;" disabled>
                                                            </div>
                                                        </li>
                                                        <label htmlFor="featured_article_image" id="file_upload_label">
                                                            <p>Profile Image</p>
                                                            <input type="file" className="hidden d-none"
                                                                id="featured_article_image" name="avatar" />
                                                            <img src="{{ asset(auth()->user()->avatar) }}" alt=""
                                                            class="w-100" />
                                                            <small class="text-center d-block">click to upload
                                                                image</small>
                                                        </label>

                                                    </ul>
                                                    <button
                                                        class="text-center  fw-bolder border-0 p-2 gap-6 flex-wrap mb-4 w-100 bg-info-subtle">
                                                        Update
                                                    </button>
                                                </form>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Search Bar -->


        </div>
    @endsection
    @push('scripts')
        {{-- <script>
            // Handle form submission asynchronously
            document.getElementById('updateProfileForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Submit the form data using AJAX
                fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response data (e.g., display success message)
                        alert('Profile updated successfully!');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle errors (e.g., display error message)
                        alert('An error occurred while updating the profile.');
                    });
            });
        </script> --}}
    @endpush
