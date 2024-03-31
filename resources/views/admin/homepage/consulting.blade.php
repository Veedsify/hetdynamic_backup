@extends('.../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Hompage Consulting Configuration  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">Update Consulting Details</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Consulting Details</li>
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
                            <form action="{{ route('admin.settings.update.consulting') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                Tiltle</label>
                                            <input type="text" class="form-control" id="consulting_title"
                                                name="consulting_title"
                                                value="{{ old('consulting_title') === null ? $data->consulting_title : old('consulting_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">Consulting
                                                Description</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="consulting_description" rows="10"
                                                aria-describedby="emailHelp">{{ old('consulting_description') === null ? $data->consulting_description : old('consulting_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                Feature 1</label>
                                            <input type="text" class="form-control" id="banner_text_2"
                                                name="consulting_feature_1"
                                                value="{{ old('consulting_feature_1') === null ? $data->consulting_feature_1 : old('consulting_feature_1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                Feature 2</label>
                                            <input type="text" class="form-control" id="banner_text_2"
                                                name="consulting_feature_2"
                                                value="{{ old('consulting_feature_2') === null ? $data->consulting_feature_2 : old('consulting_feature_2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                Feature Desc. 1</label>
                                            <input type="text" class="form-control" id="banner_text_2"
                                                name="consulting_desc_1"
                                                value="{{ old('consulting_desc_1') === null ? $data->consulting_desc_1 : old('consulting_desc_1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                Feature Desc. 2</label>
                                            <input type="text" class="form-control" id="banner_text_2"
                                                name="consulting_desc_2"
                                                value="{{ old('consulting_desc_2') === null ? $data->consulting_desc_2 : old('consulting_desc_2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                image 1</label>
                                            <input type="file" class="form-control" id="banner_text_2"
                                                name="consulting_image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Consulting
                                                image 2</label>
                                            <input type="file" class="form-control" id="banner_text_2"
                                                name="consulting_image_2" value="">
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
