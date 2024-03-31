@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'All Countries  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">All Countries</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/admin">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Countries</li>
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
                        <button id="toggleAddCategory" class="btn btn-primary">New Country</button>
                        <div class="add_category_modal">
                            <form action="{{ route('admin.countries.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="fs-4 fw-bold mb-3 d-inline-block">Name</label>
                                    <input type="text" name="name" class="form-control border-1" id="name"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="iso2" class="fs-4 fw-bold mb-3 d-inline-block">ISO2</label>
                                    <input type="text" name="iso2" class="form-control border-1" id="iso2"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="iso3" class="fs-4 fw-bold mb-3 d-inline-block">ISO3</label>
                                    <input type="text" name="iso3" class="form-control border-1" id="iso3"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phonecode" class="fs-4 fw-bold mb-3 d-inline-block">Phone Code</label>
                                    <input type="text" name="phonecode" class="form-control border-1" id="phonecode"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="capital" class="fs-4 fw-bold mb-3 d-inline-block">Capital</label>
                                    <input type="text" name="capital" class="form-control border-1" id="capital"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="currency" class="fs-4 fw-bold mb-3 d-inline-block">Currency</label>
                                    <input type="text" name="currency" class="form-control border-1" id="currency"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="native" class="fs-4 fw-bold mb-3 d-inline-block">Native</label>
                                    <input type="text" name="native" class="form-control border-1" id="native"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="flag" class="fs-4 fw-bold mb-3 d-inline-block">Flag</label>
                                    <input accept="image/png, image/jpeg, image/jpg, image/webp" size="1000000"
                                        type="file" name="flag" class="form-control border-1" id="flag"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="slogan" class="fs-4 fw-bold mb-3 d-inline-block">Slogan</label>
                                    <input type="text" name="slogan" class="form-control border-1" id="slogan"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget-content searchable-container list">
                        <!-- Modal -->
                        <div class="card card-body">
                            <div class="table-responsive">
                                <table class="table search-table align-middle text-nowrap">
                                    <thead class="header-item">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ISO2</th>
                                            <th>ISO3</th>
                                            <th>Phone Code</th>
                                            <th>Capital</th>
                                            <th>Currency</th>
                                            <th>Native</th>
                                            <th>Flag</th>
                                            <th>Slogan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach ($countries as $country)
                                            <tr class="search-items">
                                                <td>
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td>
                                                    {{ $country->name }}
                                                </td>
                                                <td>
                                                    {{ $country->iso2 }}
                                                </td>
                                                <td>
                                                    {{ $country->iso3 }}
                                                </td>
                                                <td>
                                                    {{ $country->phonecode }}
                                                </td>
                                                <td>
                                                    {{ $country->capital }}
                                                </td>
                                                <td>
                                                    {{ $country->currency }}
                                                </td>
                                                <td>
                                                    {{ $country->native }}
                                                </td>
                                                <td>
                                                    <img width="50" src="{{ asset($country->flag) }}"
                                                        alt="">
                                                </td>
                                                <td>
                                                    {{ $country->slogan }}
                                                </td>
                                                <td>
                                                    <div class="action-btn">
                                                        <form action="{{ route('admin.countries.delete', $country->id) }}"
                                                            method="post" data-delete_action="delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="text-danger delete ms-2 bg-transparent border-0">
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
