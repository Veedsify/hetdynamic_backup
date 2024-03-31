@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'All Contact  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">Contact</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Contact</li>
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
                        <!-- Modal -->
                        <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog"
                            aria-labelledby="addContactModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title">Contact</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="add-contact-box">
                                            <div class="add-contact-content">
                                                <form id="addContactModalTitle">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3 contact-name">
                                                                <input type="text" id="c-name" class="form-control"
                                                                    placeholder="Name">
                                                                <span class="validation-text text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3 contact-email">
                                                                <input type="text" id="c-email" class="form-control"
                                                                    placeholder="Email">
                                                                <span class="validation-text text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3 contact-occupation">
                                                                <input type="text" id="c-occupation" class="form-control"
                                                                    placeholder="Occupation">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3 contact-phone">
                                                                <input type="text" id="c-phone" class="form-control"
                                                                    placeholder="Phone">
                                                                <span class="validation-text text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3 contact-location">
                                                                <input type="text" id="c-location" class="form-control"
                                                                    placeholder="Location">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex gap-6 m-0">
                                            <button id="btn-add" class="btn btn-success rounded-pill">Add</button>
                                            <button id="btn-edit" class="btn btn-success rounded-pill">Save</button>
                                            <button class="btn bg-danger-subtle text-danger rounded-pill"
                                                data-bs-dismiss="modal"> Discard
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <!-- start row -->
                                            <tr class="search-items">
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
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('custom/placeholder.jpg') }}" alt="avatar"
                                                            class="rounded-circle" width="35">
                                                        <div class="ms-3">
                                                            <div class="user-meta-info">
                                                                <h6 class="user-name mb-0" data-name="Emma Adams">
                                                                    {{ $contact->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="usr-email-addr"
                                                        data-email="adams@mail.com">{{ $contact->email }}</span>
                                                </td>
                                                <td>
                                                    <span class="usr-location" data-location="{{ $contact->subject }}">
                                                        {{ $contact->subject }}</span>
                                                </td>
                                                <td>
                                                    <span class="usr-ph-no"
                                                        data-phone="+1 (070) 123-4567">{{ $contact->phone }}</span>
                                                </td>
                                                <td>
                                                    <span class="usr-ph-no"
                                                        data-phone="+1 (070) 123-4567">{{ $contact->message }}</span>
                                                </td>
                                                <td>
                                                    <div class="action-btn">
                                                        <a href="javascript:void(0)" class="text-primary edit">
                                                            <i class="ti ti-eye fs-5"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="text-dark delete ms-2">
                                                            <i class="ti ti-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- end row -->
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
