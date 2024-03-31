@extends('.../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Aboutpage Years of Experience Configuration  - ' . $pagedata->site_name,
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
                                    <h4 class="fw-semibold mb-8">Update Experience Details</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a class="text-muted text-decoration-none" href="/">Home</a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">Experience Details</li>
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
                            <form action="{{ route('admin.settings.update.experience') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Experience
                                                Tiltle</label>
                                            <input type="text" class="form-control" id="experience_title"
                                                name="experience_title"
                                                value="{{ old('experience_title') === null ? $data->experience_title : old('experience_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Experience
                                                Sub-Tiltle</label>
                                            <input type="text" class="form-control" id="experience_sub_title"
                                                name="experience_sub_title"
                                                value="{{ old('experience_sub_title') === null ? $data->experience_sub_title : old('experience_sub_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                ">Experience
                                                Description</label>
                                            <textarea class="form-control" id="exampleInputEmail1" name="experience_description" rows="10"
                                                aria-describedby="emailHelp">{{ old('experience_description') === null ? $data->experience_description : old('experience_description') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Experience
                                                Feature 1</label>
                                            <input type="text" class="form-control" id="experience_feature_1"
                                                name="experience_feature_1"
                                                value="{{ old('experience_feature_1') === null ? $data->experience_feature_1 : old('experience_feature_1') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Experience
                                                Feature 2</label>
                                            <input type="text" class="form-control" id="experience_feature_2"
                                                name="experience_feature_2"
                                                value="{{ old('experience_feature_2') === null ? $data->experience_feature_2 : old('experience_feature_2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label
                                                fw-semibold">Years
                                                of Experience</label>
                                            <input type="text" class="form-control" id="experience_years"
                                                name="experience_years"
                                                value="{{ old('experience_years') === null ? $data->experience_years : old('experience_years') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Experience Image 1</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="experience_image_1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Experience Image 2</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="experience_image_2" aria-describedby="emailHelp">
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
