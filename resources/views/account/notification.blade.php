@extends('../layouts/account/accountlayout', [
    'pagedata' => $pagedata,
    'title' => 'Notification  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['account, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <x-account.aside />
        <!--  Sidebar End -->
        <div class="page-wrapper">
            {{-- Header start --}}
            <x-account.header />
            {{-- Header ends --}}
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">Notification</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/admin">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Notification</li>
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

                    <div class="widget-content searchable-container list">
                        <div>

                            @if (session('error'))
                                <div class="alert alert-danger transition-this" data-remove_alert="1">
                                    <div class="text-danger">{{ session('error') }}</div>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success transition-this" data-remove_alert="1">
                                    <div class="text-success">{{ session('success') }}</div>
                                </div>
                            @endif

                            <div
                                style="overflow-y: auto; height: {{ $allNotifications->count() > 5 ? '500px' : 'auto' }}; padding: 2rem">
                                @foreach ($allNotifications as $notification)
                                    <a href="{{ $notification->url }}" target="_blank">
                                        <div
                                            class="d-md-flex items-center border rounded-2 mb-3 {{ $notification->seen === 'unread' ? 'border-info' : '' }}">

                                            <a href="{{ $notification->url }}" target="_blank"
                                                class="py-6 px-7 d-flex    w-100">
                                                <span class="me-3">
                                                    <img src="{{ asset($notification->image) }}" alt="user"
                                                        class="rounded-circle" width="48" height="48">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ">
                                                    <h6 class="mb-1 fw-semibold lh-base">{{ $notification->title }}</h6>
                                                    <span class="fs-2 d-block text-body-secondary">
                                                        {{ $notification->description }}
                                                        <small class="ms-3 d-md-inline-block  d-none">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </small>
                                                    </span>
                                                </div>
                                            </a>

                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            @if ($allNotifications->count() == 0)
                                <div class="py-6 px-7 mb-1  ">
                                    <h6 class="text-center">No notification found</h6>
                                </div>
                            @else
                                <div class="py-6 px-7 mb-1  ">
                                    <form action="{{ route('account.notification.mark.all.read') }}">
                                        <button class="btn btn-outline-primary md-w ms-auto d-block">Mark all as read
                                        </button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
