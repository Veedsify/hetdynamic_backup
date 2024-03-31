@extends('.../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Homepage Details Configuration  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <x-admin.aside />
        <div class="page-wrapper">
            <!--  Header Start -->
            {{-- Header start --}}
            <x-admin.header />
            {{-- Header ends --}}
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">Update GLobal Details</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Homepage Details</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-3">
                                    <div class="text-center mb-n5">
                                        <img src="/admin-assets/images/breadcrumb/ChatBc.png" alt=""
                                            class="img-fluid mb-n4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-2 overflow-hidden">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="border p-4 py-5 rounded-4">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('config.details.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_name }}" name="site_name"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Logo</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="site_logo" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Favicon</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="site_favicon" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">Site
                                                Description</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="site_description" rows="10"
                                                aria-describedby="emailHelp">{{ $pagedata->site_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">Site
                                                Keywords</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="site_keywords" rows="10" aria-describedby="emailHelp">{{ $pagedata->site_keywords }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">Site
                                                Address</label>
                                            <input class="form-control" id="exampleInputEmail1" name="site_address"
                                                rows="10" aria-describedby="emailHelp"
                                                value="{{ $pagedata->site_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Facebook</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_facebook }}" name="site_facebook"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Twitter</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_twitter }}" name="site_twitter"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site URL</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_url }}" name="site_url"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site YouTube</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_youtube }}" name="site_youtube"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Phone</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_phone }}" name="site_phone"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Email</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_email }}" name="site_email"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Instagram</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_instagram }}" name="site_instagram"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site LinkedIn</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_linkedin }}" name="site_linkedin"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Site Pinterest</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->site_pinterest }}" name="site_pinterest"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Admin Email</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->admin_email }}" name="admin_email"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Default Mail
                                                Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->default_mail_address }}" name="default_mail_address"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Support Mail
                                                Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->support_mail_address }}" name="support_mail_address"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Admin Phone</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->admin_phone }}" name="admin_phone"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Admin Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->admin_address }}" name="admin_address"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Mail Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->mail_address }}" name="mail_address"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Mail Host</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $pagedata->mail_host }}" name="mail_host"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4 mt-3">
                                            <input type="submit" class="btn btn-primary w-100 d-block" id="submit"
                                                value="Save Details">
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Search Bar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" placeholder="Search here" id="search">
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--  Shopping Cart -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
