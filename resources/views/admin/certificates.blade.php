@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'All Certificates  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">All Certificates</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/admin">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Certificates</li>
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

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-end p-3">
                        <button id="toggleAddCategory" class="btn btn-primary">New Certificate</button>
                        <div class="add_category_modal">
                            <form action="{{ route('admin.certificate.add') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="fs-4 fw-bold mb-3 d-inline-block">Name</label>
                                    <input type="text" name="name" class="form-control border-1" id="name"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="fs-4 fw-bold mb-3 d-inline-block">Description</label>
                                    <textarea type="text" name="description" class="form-control border-1" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="fs-4 fw-bold mb-3 d-inline-block">Image</label>
                                    <input type="file" name="image" class="form-control border-1" id="image"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget-content searchable-container list  ">
                        <!-- Modal -->
                        <div class="card card-body shadow-none " >





                            <div class="table-responsive">
                                <table class="table search-table align-middle text-nowrap">
                                    <thead class="header-item">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach ($certificates as $certificate)
                                            <tr class="search-items">
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td>
                                                    {{ $certificate->name }}
                                                </td>
                                                <td>
                                                    {{ $certificate->description }}
                                                </td>
                                                <td>
                                                    <a href="{{ asset($certificate->image) }}" target="_blank">
                                                        <img width="50" src="{{ asset($certificate->image) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="action-btn">
                                                        <form
                                                            action="{{ route('admin.certificate.delete', $certificate->id) }}"
                                                            method="post" data-delete_action="delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-danger delete ms-2 bg-transparent border-0">
                                                                <i class="ti ti-trash fs-5"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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
        </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
