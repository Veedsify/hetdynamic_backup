        <!--  Header Start -->
        <header class="topbar">
            <div class="with-vertical"><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Header -->
                <!-- ---------------------------------- -->
                <nav class="navbar navbar-expand-lg p-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="ti ti-search"></i>
                            </a>
                        </li>
                    </ul>



                    <div class="d-block d-lg-none">
                        <a href="{{ route('admin') }}" class="text-nowrap logo-img">
                            <img src="{{ asset($pagedata->site_logo) }}" class="dark-logo" width="50"
                                alt="Logo-Dark">
                        </a>
                    </div>
                    <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="p-2">
                            <i class="ti ti-dots fs-7"></i>
                        </span>
                    </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                <!-- ------------------------------- -->
                                <!-- start language Dropdown -->
                                <!-- ------------------------------- -->
                                <li class="nav-item">
                                    <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                        <iconify-icon icon="solar:moon-line-duotone" class="moon fs-7"></iconify-icon>
                                    </a>
                                    <a class="nav-link sun light-layout" href="javascript:void(0)">
                                        <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-7"></iconify-icon>
                                    </a>
                                </li>
                                <!-- ------------------------------- -->
                                <!-- start notification Dropdown -->
                                <!-- ------------------------------- -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-bell-ringing"></i>
                                        <div class="notification bg-primary rounded-circle"></div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2">
                                        <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                            <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                            @if (isset($notifications[0]['user_id']) && $notifications[0]['user_id'] == auth()->user()->id
                                                    ? $notifications->count()
                                                    : 0)
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">
                                                    {{ isset($notifications[0]['user_id']) && $notifications[0]['user_id'] == auth()->user()->id ? $notifications->count() : 0 }}
                                                    new</span>
                                            @endif
                                        </div>
                                        <div class="message-body" data-simplebar="">
                                            @foreach ($notifications as $notification)
                                                @if ($notification->user_id == auth()->user()->id)
                                                    <a href="{{ route('admin.notification.view', $notification->id) }}"
                                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                        <span class="me-3">
                                                            <img src="{{ asset($notification->image) }}" alt="user"
                                                                class="rounded-circle" width="48" height="48">
                                                        </span>
                                                        <div class="w-75 d-inline-block v-middle">
                                                            <h6 class="mb-1 fw-semibold lh-base">
                                                                {{ $notification->title }}
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">
                                                                {{ $notification->description }}
                                                            </span>
                                                        </div>
                                                    </a>
                                                @endif
                                                @if ($loop->index == 5)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="py-6 px-7 mb-1">
                                        <a href="{{ route('account.notification') }}"
                                            class="btn btn-outline-primary w-100">See All
                                            Notification
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end notification Dropdown -->
                            <!-- ------------------------------- -->

                            <!-- ------------------------------- -->
                            <!-- start profile Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle"
                                                width="35" height="35" alt="">
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar="">
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle"
                                                width="80" height="80" alt="">
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">{{ auth()->user()->fullname }}</h5>
                                                <span class="mb-1 d-block">{{ auth()->user()->role }}</span>
                                                <p class="mb-0 d-flex align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="{{ route('account.setting') }}"
                                                class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="{{ asset('admin-assets/images/svgs/icon-account.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Account
                                                        Settings</span>
                                                </div>
                                            </a>
                                            <a href="{{ route('account.notification') }}"
                                                class="py-8 px-7 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="{{ asset('admin-assets/images/svgs/icon-inbox.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Notification</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Messages &
                                                        Emails</span>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">

                                            <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log
                                                Out</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end profile Dropdown -->
                            <!-- ------------------------------- -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- ---------------------------------- -->
            <!-- End Vertical Layout Header -->
            <!-- ---------------------------------- -->



        </div>
        <div class="app-header with-horizontal">
            <nav class="navbar navbar-expand-xl container-fluid p-0">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-xl-block">
                        <a href="/" class="text-nowrap nav-link">
                            <img src="{{ asset('admin-assets/images/logos/dark-logo.svg') }}" class="dark-logo"
                                width="180" alt="">
                            <img src="{{ asset('admin-assets/images/logos/light-logo.svg') }}" class="light-logo"
                                width="180" alt="">
                        </a>
                    </li>
                    <li class="nav-item d-none d-xl-block">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="ti ti-search"></i>
                        </a>
                    </li>
                </ul>
                <div class="d-block d-xl-none">
                    <a href="/" class="text-nowrap nav-link">
                        <img src="{{ asset('admin-assets/images/logos/dark-logo.svg') }}" width="180"
                            alt="">
                    </a>
                </div>
                <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="p-2">
                        <i class="ti ti-dots fs-7"></i>
                    </span>
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                        <a href="javascript:void(0)"
                            class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                            aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <!-- ------------------------------- -->
                            <!-- start language Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item">
                                <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                    <iconify-icon icon="solar:moon-line-duotone" class="moon fs-7"></iconify-icon>
                                </a>
                                <a class="nav-link sun light-layout" href="javascript:void(0)">
                                    <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-7"></iconify-icon>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('admin-assets/images/svgs/icon-flag-en.svg') }}"
                                        alt="" width="20px" height="20px"
                                        class="rounded-circle object-fit-cover round-20">
                                </a>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end language Dropdown -->
                            <!-- ------------------------------- -->


                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-bell-ringing"></i>
                                    <div class="notification bg-primary rounded-circle"></div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                        <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                        <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                    </div>
                                    <div class="message-body" data-simplebar="">
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-2.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!</h6>
                                                <span class="fs-2 d-block text-body-secondary">Congratulate
                                                    him</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-3.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">New message</h6>
                                                <span class="fs-2 d-block text-body-secondary">Salma sent you new
                                                    message</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-4.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">Bianca sent payment</h6>
                                                <span class="fs-2 d-block text-body-secondary">Check your
                                                    earnings</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-5.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">Jolly completed tasks</h6>
                                                <span class="fs-2 d-block text-body-secondary">Assign her new
                                                    tasks</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-6.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">John received payment</h6>
                                                <span class="fs-2 d-block text-body-secondary">$230 deducted from
                                                    account</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('admin-assets/images/profile/user-7.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!</h6>
                                                <span class="fs-2 d-block text-body-secondary">Congratulate
                                                    him</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="py-6 px-7 mb-1">
                                        <button class="btn btn-outline-primary w-100">See All
                                            Notification
                                        </button>
                                    </div>

                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end notification Dropdown -->
                            <!-- ------------------------------- -->

                            <!-- ------------------------------- -->
                            <!-- start profile Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="{{ asset('admin-assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle" width="35" height="35"
                                                alt="">
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar="">
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="{{ asset('admin-assets/images/profile/user-1.jpg') }}"
                                                class="rounded-circle" width="80" height="80"
                                                alt="">
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                                <span class="mb-1 d-block">Designer</span>
                                                <p class="mb-0 d-flex align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> info@modernize.com
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="page-user-profile.html"
                                                class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="{{ asset('admin-assets/images/svgs/icon-account.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Account
                                                        Settings</span>
                                                </div>
                                            </a>
                                            <a href="app-email.html" class="py-8 px-7 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="{{ asset('admin-assets/images/svgs/icon-inbox.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                                    <span class="fs-2 d-block text-body-secondary">Messages &
                                                        Emails</span>
                                                </div>
                                            </a>
                                            <a href="app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                    <img src="{{ asset('admin-assets/images/svgs/icon-tasks.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                                    <span class="fs-2 d-block text-body-secondary">To-do and Daily
                                                        Tasks</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <div
                                                class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="fs-4 mb-3 fw-semibold">Unlimited Access</h5>
                                                        <button class="btn btn-primary">Upgrade</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="m-n4 unlimited-img">
                                                            <img src="{{ asset('admin-assets/images/backgrounds/unlimited-bg.png') }}"
                                                                alt="" class="w-100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log
                                                Out</a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end profile Dropdown -->
                            <!-- ------------------------------- -->
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </header>
