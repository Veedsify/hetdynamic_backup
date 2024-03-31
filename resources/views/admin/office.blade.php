@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Create Office Address - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <x-admin.aside />
        <!--  Sidebar End -->
        <div class="page-wrapper">
            {{-- Header start --}}
            <x-admin.header />
            {{-- Header ends --}}


            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">Office Address</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Office Address</li>
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

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="d-flex">
                            <div class="w-100 d-none d-lg-block border-end user-chat-box">
                                <div class="app-chat">
                                    <ul class="chat-users mb-0 mh-n100" data-simplebar="">
                                        @foreach ($officeAddress as $office)
                                            <li>
                                                <a href="javascript:void(0)"
                                                    class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user "
                                                    id="chat_user_1" data-user-id="1">
                                                    <div class="d-flex align-items-center">
                                                        <span class="position-relative">
                                                            <img src="{{ asset($office->image) }}" alt="user1"
                                                                width="48" height="48" class="object-fit-cover">
                                                        </span>
                                                        <div class="ms-3 d-inline-block w-75">
                                                            <h6 class="mb-1 fw-semibold chat-title"
                                                                data-username="James Anderson">
                                                                {{ $office->address }}
                                                            </h6>
                                                            <span class="fs-2 text-truncate text-body-color d-block">
                                                                {{ $office->country }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('add.address') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" onchange="previewImage()" class="form-control"
                                        id="image_office_image" name="image">
                                    <div class="p-3">
                                        <img src="" alt="" width="200" class="object-fit-cover"
                                            height="150" id="image_office_preview" style="display: none;padding:10px;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="active_hours" class="form-label">Active Hours</label>
                                    <div id="add_more_container">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="active_hours"
                                                    placeholder="Day" name="day[]">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="time" class="form-control" placeholder="Start Time"
                                                    id="active_hours" name="starttime[]">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="time" class="form-control" placeholder="End Time"
                                                    id="active_hours" name="endtime[]">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:addnewtime()" class="text-success d-inline-block my-2">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Add more
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Address</button>
                            </form>
                        </div>
                    </div>

                    <div class="card overflow-hidden chat-application">
                        <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
                            <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                                <i class="ti ti-menu-2 fs-5"></i>
                            </button>
                            <form class="position-relative w-100">
                                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                                    placeholder="Search Contact">
                                <i
                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="d-none">
        <div class="row mb-3" id="add_more_template">
            <div class="col-md-4">
                <input type="text" class="form-control" id="active_hours" placeholder="Day" name="day[]">
            </div>
            <div class="col-md-4">
                <input type="time" class="form-control" placeholder="Start Time" id="active_hours"
                    name="starttime[]">
            </div>
            <div class="col-md-4">
                <input type="time" class="form-control" placeholder="End Time" id="active_hours" name="endtime[]">
            </div>
        </div>
    </div>
@endsection
