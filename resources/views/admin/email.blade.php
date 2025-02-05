@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Email  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">Email</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Email</li>
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
                        <div class="d-flex w-100">
                            <div class="left-part border-end w-20 flex-shrink-0 d-none d-lg-block h-auto">
                                <div class="px-9 pt-4 pb-3">
                                    <button class="btn btn-primary fw-semibold py-8 w-100">Compose</button>
                                </div>
                                <ul class="list-group mh-n100" data-simplebar="">
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-inbox fs-5"></i>Inbox</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-brand-telegram fs-5"></i>Sent</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-file-text fs-5"></i>Draft</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-inbox fs-5"></i>Spam</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-trash fs-5"></i>Trash</a>
                                    </li>
                                    <li class="border-bottom my-3"></li>
                                    <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-star fs-5"></i>Starred</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)" class="d-block "><i
                                                class="ti ti-badge fs-5"></i>Important</a>
                                    </li>
                                    <li class="border-bottom my-3"></li>
                                    <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">LABELS</li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-primary"></i>Promotional</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-warning"></i>Social</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-success"></i>Health</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex w-100">
                                <div class="min-width-340">
                                    <div class="border-end user-chat-box h-100">
                                        <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                                            <form class="position-relative">
                                                <input type="text" class="form-control search-chat py-2 ps-5"
                                                    id="text-srh" placeholder="Search">
                                                <i
                                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                            </form>
                                        </div>
                                        <div class="app-chat">
                                            <ul class="chat-users mh-n100" data-simplebar="">
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light-subtle"
                                                        id="chat_user_1" data-user-id="1">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">James Smith</h6>
                                                                <span
                                                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Kindly check this latest
                                                                updated</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-dark"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_2" data-user-id="2">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault1">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Katherine Flintoff</h6>
                                                                <span
                                                                    class="badge text-bg-danger fs-2 rounded-4 py-1 px-2">Social</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Newsletter from
                                                                AdminMart Team</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-warning"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_3" data-user-id="3">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault2">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Bianca Macdowells</h6>
                                                                <span
                                                                    class="badge text-bg-success fs-2 rounded-4 py-1 px-2">Health</span>
                                                            </div>
                                                            <h6 class="text-dark">Kindly check this latest updated
                                                            </h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-warning"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_4" data-user-id="4">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault3">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Michael Knight</h6>
                                                                <span
                                                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Social</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Developer Community
                                                                needs help</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_5" data-user-id="5">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault4">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Jonathan Higgings</h6>
                                                                <span
                                                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Kindly check this latest
                                                                updated</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_2" data-user-id="2">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault5">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Mike Torello</h6>
                                                                <span
                                                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Health</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">From your hosting
                                                                provider - action</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_3" data-user-id="3">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault6">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Bianca Macdowells</h6>
                                                                <span
                                                                    class="badge text-bg-success fs-2 rounded-4 py-1 px-2">Health</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Kindly check this latest
                                                                updated</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-warning"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user"
                                                        id="chat_user_3" data-user-id="3">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault7">
                                                        </div>
                                                        <div class="position-relative w-100 ms-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <h6 class="mb-0">Michael Knight</h6>
                                                                <span
                                                                    class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Social</span>
                                                            </div>
                                                            <h6 class="fw-semibold text-dark">Developer Community</h6>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <span><i
                                                                            class="ti ti-star fs-4 me-2 text-muted"></i></span>
                                                                    <span class="d-block"><i
                                                                            class="ti ti-alert-circle text-muted"></i></span>
                                                                </div>
                                                                <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="chat-container h-100 w-100">
                                        <div class="chat-box-inner-part h-100">
                                            <div class="chatting-box app-email-chatting-box">
                                                <div class="p-9 py-3 border-bottom chat-meta-user">
                                                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                                                        <li class="d-lg-none d-block">
                                                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-arrow-left"></i>
                                                            </a>
                                                        </li>
                                                        <li class="position-relative" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Star">
                                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-star"></i>
                                                            </a>
                                                        </li>
                                                        <li class="position-relative" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="important">
                                                            <a class="d-block text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-alert-circle"></i>
                                                            </a>
                                                        </li>
                                                        <li class="position-relative" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Delete">
                                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="position-relative overflow-hidden">
                                                    <div class="position-relative">
                                                        <div class="chat-box email-box mh-n100 p-9" data-simplebar="init">

                                                            <div class="chat-list chat active-chat" data-user-id="1">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-8.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="2">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-2.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="3">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-3.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="4">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-4.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="5">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-5.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="6">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-6.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="7">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-7.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="chat-list chat" data-user-id="8">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{ asset('admin-assets/images/profile/user-9.jpg') }}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle">
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">Alexandra
                                                                                Flintoff</h6>
                                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Kindly
                                                                        check this latest updated</h4>
                                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                                    <p class="mb-3 text-dark">
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Quisque bibendum
                                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at
                                                                        luctus urna, eu fermentum
                                                                        diam.
                                                                        In et tristique mauris.
                                                                    </p>
                                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed
                                                                        auctor enim. Pellentesque
                                                                        nisi
                                                                        magna, laoreet a augue eget, tempor volutpat
                                                                        diam.</p>
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        Alexandra Flintoff</h6>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">
                                                                        Attachments</h6>
                                                                    <div
                                                                        class="d-block d-sm-flex align-items-center gap-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 mb-2 mb-sm-0">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-adobe.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        service-task.pdf</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0)"
                                                                            class="hstack gap-3 file-chat-hover">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <div class="rounded-1 text-bg-light p-6">
                                                                                    <img src="{{ asset('admin-assets/images/chat/icon-zip-folder.svg') }}"
                                                                                        alt="" width="24"
                                                                                        height="24">
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="fw-semibold">
                                                                                        work-project.zip</h6>
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-3 fs-2 text-muted">
                                                                                        <span>2
                                                                                            MB</span><span>2 Dec
                                                                                            2023</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="px-9 py-3 border-top chat-send-message-footer">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <ul
                                                                    class="list-unstyled mb-0 d-flex align-items-center gap-7">
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-arrow-back-up fs-5"></i>
                                                                            Reply
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-arrow-forward-up fs-5"></i>
                                                                            Forward
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar"
                                aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Email </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="px-9 pt-4 pb-3">
                                    <button class="btn btn-primary fw-semibold py-8 w-100">Compose</button>
                                </div>
                                <ul class="list-group h-n150" data-simplebar="">
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-inbox fs-5"></i>Inbox</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-brand-telegram fs-5"></i>Sent</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-file-text fs-5"></i>Draft</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-inbox fs-5"></i>Spam</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-trash fs-5"></i>Trash</a>
                                    </li>
                                    <li class="border-bottom my-3"></li>
                                    <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i class="ti ti-star fs-5"></i>Starred</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)" class="d-block "><i
                                                class="ti ti-badge fs-5"></i>Important</a>
                                    </li>
                                    <li class="border-bottom my-3"></li>
                                    <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">LABELS</li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-primary"></i>Promotional</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-warning"></i>Social</a>
                                    </li>
                                    <li class="list-group-item border-0 p-0 mx-9">
                                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1"
                                            href="javascript:void(0)"><i
                                                class="ti ti-bookmark fs-5 text-success"></i>Health</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Shopping Cart -->
        <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header justify-content-between py-4">
                <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">
                    Shopping Cart
                </h5>
                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
            </div>
            <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar="">
                <ul class="mb-0">
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin-assets/images/products/product-1.jpg') }}" width="95"
                                height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add1">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add1" value="1">
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addo2">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin-assets/images/products/product-2.jpg') }}" width="95"
                                height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add2">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add2" value="1">
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addon34">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pb-7">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin-assets/images/products/product-3.jpg') }}" width="95"
                                height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                            <div>
                                <h6 class="mb-1">Supreme toys cooker</h6>
                                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                    <div class="input-group input-group-sm w-50">
                                        <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success"
                                            type="button" id="add3">
                                            -
                                        </button>
                                        <input type="text"
                                            class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="add3" value="1">
                                        <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add"
                                            type="button" id="addon3">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="align-bottom">
                    <div class="d-flex align-items-center pb-7">
                        <span class="text-dark fs-3">Sub Total</span>
                        <div class="ms-auto">
                            <span class="text-dark fw-semibold fs-3">$2530</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pb-7">
                        <span class="text-dark fs-3">Total</span>
                        <div class="ms-auto">
                            <span class="text-dark fw-semibold fs-3">$6830</span>
                        </div>
                    </div>
                    <a href="eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
                </div>
            </div>
        </div>


    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
