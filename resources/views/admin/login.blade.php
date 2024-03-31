@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Login  - ' . $pagedata->site_name,
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
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to {{ ucwords($pagedata->site_name) }}</h2>
                                <p class="mb-7">Login to your Account</p>
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
                                <form action="{{ route('login.submit') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" 
                                        id="exampleInputEmail1" name="email"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input success" type="checkbox" value=""
                                                id="flexCheckChecked" checked="">
                                            <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-success fw-medium fs-3" href="{{ route('forgot.password') }}">Forgot
                                            Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 py-8 mb-4 rounded-2">Sign
                                        In</button>
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
