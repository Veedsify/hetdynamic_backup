@extends('.../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Aboutpage About-Us Configuration  - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <x-admin.aside />
        <div class="page-wrapper">
            <!--  Header Start -->
            {{-- Header start --}}
            <x-admin.header />
            {{-- Header ends --}}
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fw-semibold mb-8">Update About Us Details</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">About Us Details</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-3">
                                    <div class="text-center mb-n5">
                                        <img src="/admin-assets/images/breadcrumb/ChatBc.png" alt=""
                                            class="img-fluid mb-n4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-2 overflow-hidden">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="border p-4 py-5 rounded-4">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('admin.settings.update.about.us') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">About
                                                Us
                                                Tiltle</label>
                                            <input type="text" class="form-control" id="about_us_title"
                                                name="about_us_title"
                                                value="{{ old('about_us_title') === null ? $data->about_us_title : old('about_us_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">About
                                                Us
                                                Sub-Tiltle 1</label>
                                            <input type="text" class="form-control" id="about_us_sub_title_1"
                                                name="about_us_sub_title_1"
                                                value="{{ old('about_us_sub_title_1') === null ? $data->about_us_sub_title_1 : old('about_us_sub_title_1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">About
                                                Us
                                                Sub-Tiltle 2</label>
                                            <input type="text" class="form-control" id="about_us_sub_title_2"
                                                name="about_us_sub_title_2"
                                                value="{{ old('about_us_sub_title_2') === null ? $data->about_us_sub_title_2 : old('about_us_sub_title_2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">About Us
                                                Description 1</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="about_us_description_1" rows="10"
                                                aria-describedby="emailHelp">{{ old('about_us_description_1') === null ? $data->about_us_description_1 : old('about_us_description_1') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">About Us
                                                Description 2</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="about_us_description_2" rows="10"
                                                aria-describedby="emailHelp">{{ old('about_us_description_2') === null ? $data->about_us_description_2 : old('about_us_description_2') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">About
                                                Us
                                                Feature 1</label>
                                            <input type="text" class="form-control" id="about_us_feature_1"
                                                name="about_us_feature_1"
                                                value="{{ old('about_us_feature_1') === null ? $data->about_us_feature_1 : old('about_us_feature_1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">About
                                                Us
                                                Feature 2</label>
                                            <input type="text" class="form-control" id="about_us_feature_2"
                                                name="about_us_feature_2"
                                                value="{{ old('about_us_feature_2') === null ? $data->about_us_feature_2 : old('about_us_feature_2') }}">
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="mb-4 mt-3">
                                            <input type="submit" class="btn btn-primary w-100 d-block" id="submit"
                                                value="Save Details">
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Shopping Cart -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
