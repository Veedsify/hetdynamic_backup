@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Admin Dashboard - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">

        <div class="page-wrapper">
            {{-- aside --}}
            <x-admin.aside />
            {{-- Header start --}}
            <x-admin.header />
            {{-- Header ends --}}
            <div class="body-wrapper">
                <div class="container-fluid">
                    <!--  Owl carousel -->
                    <div class="owl-carousel counter-carousel owl-theme">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-user-male.svg') }}" width="50"
                                            height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-primary mb-1">
                                            Users
                                        </p>
                                        <h5 class="fw-semibold text-primary mb-0">
                                            {{ number_format(\App\Models\User::count()) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-briefcase.svg') }}" width="50"
                                            height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-warning mb-1">Requests</p>
                                        <h5 class="fw-semibold text-warning mb-0">
                                            {{ number_format(\App\Models\Contact::count()) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-mailbox.svg') }}" width="50"
                                            height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-info mb-1">Categories</p>
                                        <h5 class="fw-semibold text-info mb-0">
                                            {{ number_format(\App\Models\Category::count()) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-favorites.svg') }}" width="50"
                                            height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-danger mb-1">Countries</p>
                                        <h5 class="fw-semibold text-danger mb-0">
                                            {{ number_format(\App\Models\Country::count()) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-speech-bubble.svg') }}"
                                            width="50" height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-success mb-1">Comments</p>
                                        <h5 class="fw-semibold text-success mb-0">
                                            {{ number_format(\App\Models\BlogComment::count()) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('admin-assets/images/svgs/icon-connect.svg') }}" width="50"
                                            height="50" class="mb-3" alt="">
                                        <p class="fw-semibold fs-3 text-info mb-1">Articles</p>
                                        <h5 class="fw-semibold text-info mb-0">
                                            {{ number_format(\App\Models\Blog::count()) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Row 2 -->
                    <div class="row">
                        <!-- Project -->
                        <div class="col-lg-4">
                            <div class="row">
                                {{-- TOTAL VIEWS TODAY --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body pb-0 mb-xxl-4 pb-1">
                                            <p class="mb-2 fs-3 text-nowrap">Total Views Today </p>
                                            <h4 class="fw-semibold fs-7">{{ number_format($totalViewsToday) }}</h4>
                                        </div>
                                    </div>
                                </div>
                                {{-- ALL TIME VIEWS --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body pb-0 mb-xxl-4 pb-1">
                                            <p class="mb-2 fs-3 text-nowrap">Total Views Alltime </p>
                                            <h4 class="fw-semibold fs-7">{{ number_format($totalViewsAlltime) }}</h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Comming Soon -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-7 pb-2">
                                        <div class="me-3 pe-1">
                                            <img src="{{ asset('admin-assets/images/profile/user-2.jpg') }}"
                                                class="shadow-warning rounded-2" alt="" width="72"
                                                height="72">
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold fs-5 mb-2">
                                                Super awesome, Vue coming soon!
                                            </h5>
                                            <p class="fs-3 mb-0">22 March, 2023</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <ul class="hstack mb-0">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="{{ asset('admin-assets/images/profile/user-2.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="44"
                                                        height="44" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="{{ asset('admin-assets/images/profile/user-3.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="44"
                                                        height="44" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="{{ asset('admin-assets/images/profile/user-4.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="44"
                                                        height="44" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1">
                                                    <img src="{{ asset('admin-assets/images/profile/user-5.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="44"
                                                        height="44" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#"
                                            class="text-bg-light rounded py-1 px-8 d-flex align-items-center text-decoration-none">
                                            <i class="ti ti-message-2 fs-6 text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Selling Products -->
                        <div class="col-lg-8 d-flex align-items-strech">
                            <div class="card text-bg-primary border-0 w-100">
                                <div class="card-body">
                                    <h5 class="fw-semibold mb-1 text-white card-title">
                                        Page Wide Alerts
                                    </h5>
                                </div>
                                <div class="card mx-2 mb-2">
                                    <div class="card-body">
                                        <div class="mb-7 pb-1">
                                            <div class="d-flex justify-content-between align-items-center mb-6">
                                                <div>
                                                    <h6 class="mb-1 fs-3 fw-semibold">MaterialPro</h6>
                                                </div>
                                                <div>
                                                    <span class="badge bg-danger-subtle text-danger fw-semibold fs-3">
                                                        <i class="ti ti-trash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{route("alert.new")}}" method="post">
                                            <textarea name="alert" id="alert" cols="30" rows="5" class="form-control p-2 bg-light border-0" name="message"
                                                placeholder="Enter Alert Message" required></textarea>
                                            <button type="submit" class="btn btn-primary mt-2">Save Alert</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{-- 
                    <div class="row">
                        <div class="d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="px-2">
                                        <h5 class="card-title fw-semibold mb-1">
                                            Visited Pages (Today {{ now()->format('d M, Y') }})
                                        </h5>
                                        <div class="mb-7 py-2 pt-3 overflow-x-auto">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Page</th>
                                                        <th>Visits</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i < $visitedLinks->count(); $i++)
                                                        <tr>
                                                            <td>{{ $visitedLinks->keys()[$i] }}</td>
                                                            <td>{{ $visitedLinks->values()[$i] }}</td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--  Row 3 -->
                    <div class="row">
                        <!-- Weekly Stats -->
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">Top Browsers</h5>
                                    <p class="card-subtitle mb-0">Today Stats</p>
                                    <div id="stats" class="my-4"></div>
                                    <div class="position-relative">
                                        <div class="d-flex align-items-center justify-content-between mb-7">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="p-6 bg-primary-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-brand-chrome" width="30"
                                                        height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#009988" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                        <path d="M12 9h8.4" />
                                                        <path d="M14.598 13.5l-4.2 7.275" />
                                                        <path d="M9.402 13.5l-4.2 -7.275" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Chrome</h6>
                                                </div>
                                            </div>
                                            <div class="bg-primary-subtle badge">
                                                <p class="fs-3 text-primary fw-semibold mb-0">{{ $chrome }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-7">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="p-6 bg-success-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-brand-firefox" width="30"
                                                        height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#009988" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4.028 7.82a9 9 0 1 0 12.823 -3.4c-1.636 -1.02 -3.064 -1.02 -4.851 -1.02h-1.647" />
                                                        <path
                                                            d="M4.914 9.485c-1.756 -1.569 -.805 -5.38 .109 -6.17c.086 .896 .585 1.208 1.111 1.685c.88 -.275 1.313 -.282 1.867 0c.82 -.91 1.694 -2.354 2.628 -2.093c-1.082 1.741 -.07 3.733 1.371 4.173c-.17 .975 -1.484 1.913 -2.76 2.686c-1.296 .938 -.722 1.85 0 2.234c.949 .506 3.611 -1 4.545 .354c-1.698 .102 -1.536 3.107 -3.983 2.727c2.523 .957 4.345 .462 5.458 -.34c1.965 -1.52 2.879 -3.542 2.879 -5.557c-.014 -1.398 .194 -2.695 -1.26 -4.75" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Firefox</h6>
                                                </div>
                                            </div>
                                            <div class="bg-success-subtle badge">
                                                <p class="fs-3 text-success fw-semibold mb-0">{{ $firefox }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-7">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="p-6 bg-success-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-brand-edge" width="32"
                                                        height="32" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#009988" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M20.978 11.372a9 9 0 1 0 -1.593 5.773" />
                                                        <path
                                                            d="M20.978 11.372c.21 2.993 -5.034 2.413 -6.913 1.486c1.392 -1.6 .402 -4.038 -2.274 -3.851c-1.745 .122 -2.927 1.157 -2.784 3.202c.28 3.99 4.444 6.205 10.36 4.79" />
                                                        <path d="M3.022 12.628c-.283 -4.043 8.717 -7.228 11.248 -2.688" />
                                                        <path d="M12.628 20.978c-2.993 .21 -5.162 -4.725 -3.567 -9.748" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">Edge</h6>
                                                </div>
                                            </div>
                                            <div class="bg-success-subtle badge">
                                                <p class="fs-3 text-success fw-semibold mb-0">{{ $edge }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="p-6 bg-danger-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-brand-safari" width="32"
                                                        height="32" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#009988" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 16l2 -6l6 -2l-2 6l-6 2" />
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-4 fw-semibold">
                                                        Safari
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="bg-danger-subtle badge">
                                                <p class="fs-3 text-danger fw-semibold mb-0">{{ $safari }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Top Performers -->
                        <div class="col-lg-8 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h5 class="card-title fw-semibold">All Users</h5>
                                            <p class="card-subtitle mb-0">Registered Users</p>
                                        </div>
                                        {{-- <div>
                                            <select class="form-select">
                                                <option value="1">March 2023</option>
                                                <option value="2">April 2023</option>
                                                <option value="3">May 2023</option>
                                                <option value="4">June 2023</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-middle text-nowrap mb-0">
                                            <thead>
                                                <tr class="text-muted fw-semibold">
                                                    <th scope="col" class="ps-0">User</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Joined</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border-top">
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td class="ps-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 pe-1">
                                                                    <img src="{{ asset($user->avatar) }}"
                                                                        class="rounded-circle object-fit-cover"
                                                                        width="40" height="40" alt="">
                                                                </div>
                                                                <div>
                                                                    <h6 class="fw-semibold mb-1">{{ $user->fullname }}
                                                                    </h6>
                                                                    <p class="fs-2 mb-0 text-muted">
                                                                        {{ $user->email }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($user->status == 'active')
                                                                <span
                                                                    class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Active</span>
                                                                <span @endif
                                                                    @if ($user->status == 'inactive') class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary">Inactive</span> @endif
                                                        </td>
                                                        <td>
                                                            <p class="fs-3 text-dark mb-0">
                                                                {{ $user->created_at->diffForHumans() }}
                                                            </p>
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
        </div>
    </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
