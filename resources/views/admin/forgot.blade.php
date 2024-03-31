@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Forget  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" width="150" alt="loader" class="lds-ripple img-fluid">
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
                            <img src="/admin-assets/images/backgrounds/login-security.svg" alt="" class="img-fluid"
                                width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-3 fs-7 fw-bolder">Reset Your Password</h2>
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form action="{{ route('verify.password.reset') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" required id="exampleInputEmail1"
                                            name="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <a class="text-success fw-bold" href="javascript:sendResetPassword()">
                                            <i class="ti ti-send"></i> Send Verification Code
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Verification Code</label>
                                        <input type="tel" class="form-control" name="code" required
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                                        <input type="password" class="form-control" required id="password" name="password"
                                            placeholder="********" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 py-8 mb-4 rounded-2">Reset
                                        Password</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">New to {{ $pagedata->site_name }}?</p>
                                        <a class="text-success fw-medium ms-2" href="{{ route('register') }}">Create an
                                            account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
