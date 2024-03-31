@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Email validation  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="{{ route('home') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{ asset($pagedata->site_logo) }}" class="dark-logo" width="80" alt="Logo-Dark">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
                            <img src="/admin-assets/images/gmail.gif" width="300" alt="" class="img-fluid"
                                width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-3 fs-7 fw-bolder">Thanks for joining {{ $pagedata->site_name }} </h2>
                                <p class="mb-7">Verify your account by clicking on the link sent to your inbox</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            A verification email has been sent to <p class="text-primary fw-bold">
                                                {{ $email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
