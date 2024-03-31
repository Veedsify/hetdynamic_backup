@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'All Article  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">All Article</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/admin">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Article</li>
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
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <form class="position-relative">
                                        <input type="text" class="form-control product-search ps-5" id="input-search"
                                            placeholder="Search Article...">
                                        <i
                                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                    </form>
                                </div>
                                <div
                                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                                    <div class="action-btn show-btn">
                                        <a href="javascript:void(0)"
                                            class="delete-multiple bg-danger-subtle btn me-2 text-danger d-flex align-items-center ">
                                            <i class="ti ti-trash text-danger me-1 fs-5"></i> Delete All Row
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table search-table align-middle text-nowrap">
                                    <thead class="header-item">
                                        <th>
                                            <div class="n-chk align-self-center text-center">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input primary"
                                                        id="contact-check-all">
                                                    <label class="form-check-label" for="contact-check-all"></label>
                                                    <span class="new-control-indicator"></span>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Featured Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        @foreach ($articles as $article)
                                            <tr class="search-items" style="vertical-align: middle;">
                                                <td>
                                                    <div class="n-chk align-self-center text-center">
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                                class="form-check-input contact-chkbox primary"
                                                                id="checkbox1">
                                                            <label class="form-check-label" for="checkbox1"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img src="{{ asset($article->image) }}" alt="avatar" width="54"
                                                        height="34" style="object-fit: cover;">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="user-meta-info">
                                                                <a href="{{ route('blog.details', $article->slug) }}"
                                                                    target="_blank">
                                                                    <h6 class="user-name mb-0">{{ $article->title }}</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>{{ isset(\App\Models\Category::where('id', $article->category)->first()->name) ? \App\Models\Category::where('id', $article->category)->first()->name : '' }}</span>
                                                </td>
                                                <td>
                                                    <span class="d-inline-block text-truncate"
                                                        style="width: 400px;">{{ $article->description }}
                                                        </>
                                                </td>
                                                <td>
                                                    <span
                                                        class="w-30 fw-bold {{ $article->status == 1 ? 'text-success' : 'text-warning' }}">{{ $article->status == 1 ? 'Published' : 'Draft' }}
                                                        </>
                                                </td>
                                                <td>
                                                    <div class="action-btn d-flex align-items-center">
                                                        <a href="{{ route('admin.blog.edit', $article->slug) }}"
                                                            class="text-primary edit">
                                                            <i class="ti ti-pencil fs-5"></i>
                                                        </a>
                                                        <form action="{{ route('blog.delete', $article->slug) }}"
                                                            method="post" data-delete_action="delete">
                                                            @csrf
                                                            @method('delete')
                                                            <button href="javascript:void(0)"
                                                                class="text-dark delete ms-2 border-0 bg-transparent">
                                                                <i class="ti ti-trash fs-5 text-danger"></i>
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
