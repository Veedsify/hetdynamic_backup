@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Register  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" style="filter:invert(1);" class="lds-ripple img-fluid">
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
                            <img src="{{ asset('/admin-assets/images/backgrounds/login-security.svg') }}" alt=""
                                class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to {{ $pagedata->site_name }}</h2>
                                <p class="mb-7">Get Started By Creating an Account</p>

                                @if (session('error'))
                                    <div class="alert alert-danger transition-this" data-remove_alert="1">
                                        <div class="text-danger">{{ session('error') }}</div>
                                    </div>
                                @endif

                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">
                                        Sign
                                        Up
                                        with</p>
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form action="{{ route('register.new') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputtext" name="name"
                                            aria-describedby="textHelp">
                                        @if ($errors->has('name'))
                                            <small class="text-danger">
                                                {{ $errors->first('name') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                            aria-describedby="emailHelp">
                                        @if ($errors->has('email'))
                                            <small class="text-danger">
                                                {{ $errors->first('email') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1">
                                        @if ($errors->has('password'))
                                            <small class="text-danger">
                                                {{ $errors->first('password') }}
                                            </small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 py-8 mb-4 rounded-2">Sign Up
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-success fw-medium ms-2" href="{{ route('login') }}">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
