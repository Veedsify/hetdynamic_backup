@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Edit ' . $service->title . ' - ' . $pagedata->site_name,
    'description' => '',
    'metatags' => implode(',', ['admin, dashboard, home, index, page']),
])
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset($pagedata->site_logo) }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper">
        <aside class="left-sidebar with-vertical">
            <div><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin') }}" class="text-nowrap logo-img p-2">
                        <img src="{{ asset($pagedata->site_logo) }}" width="70" class="dark-logo" alt="Logo-Dark">
                    </a>
                    <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                {{-- SIDEBAR --}}
                <x-admin.sidebar />

                <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img src="{{ asset('admin-assets/images/profile/user-1.jpg') }}" class="rounded-circle"
                                width="40" height="40" alt="">
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                            <span class="fs-2">Designer</span>
                        </div>
                        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                            aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </button>
                    </div>
                </div>

                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <div class="page-wrapper">
            <!--  Header Start -->
            {{-- Header start --}}
            <x-admin.header />
            {{-- Header ends --}}
            <div class="body-wrapper">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    {{-- EDITOR HERE --}}
                    <div class="card rounded-2 overflow-hidden p-md-4 p-2">
                        <form action="{{ route('admin.service.edit.post', $service->slug) }}" method="post"
                            enctype="multipart/form-data" id="editPreviousService">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">

                                <div class="form-group ">
                                    <input data-selected="true" type="text" class="blog-title" id="title"
                                        name="title" value="{{ $service->title }}" required placeholder="Add a title ...">
                                </div>


                                <label htmlFor="featured_article_image" id="file_upload_label">
                                    <p>Featured Image</p>
                                    <input data-selected="true" type="file" className="hidden d-none"
                                        id="featured_article_image" name="image" />
                                    <img src="{{ asset($service->featured_image) }}" alt="" width="500"
                                        class="img-fluid" />
                                </label>

                            </div>

                            {{-- Highlight Features --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Highlight Features
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch" name="highlight_features_active"
                                            {{ $service->highlight_features_active ? 'checked' : '' }}>
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div id="highlight_container">
                                    @if ($service->highlights->count() > 0)
                                        @foreach ($service->highlights as $highlight)
                                            <div class="form-group row mb-3">
                                                <div class="col-md-6 mb-1">
                                                    <input data-selected="true" type="text" class="form-control"
                                                        name="highlight_feature[]" value="{{ $highlight->feature_title }}"
                                                        placeholder="Highlighted Feature">
                                                </div>
                                                <div class="col-md-6">
                                                    <input data-selected="true" type="text" class="form-control"
                                                        name="highlight_context[]"
                                                        value="{{ $highlight->feature_context }}"
                                                        placeholder="Highlighted Context ">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group row mb-3">
                                            <div class="col-md-6 mb-1">
                                                <input data-selected="true" type="text" class="form-control"
                                                    name="highlight_feature[]" value="{{ $highlight->feature_title }}"
                                                    placeholder="Highlighted Feature">
                                            </div>
                                            <div class="col-md-6">
                                                <input data-selected="true" type="text" class="form-control"
                                                    name="highlight_context[]" value="{{ $highlight->feature_context }}"
                                                    placeholder="Highlighted Context ">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <a data-container="highlight_container" href="javascript:void(0)"
                                    class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Add more
                                </a>
                            </div>

                            {{-- Our Services --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Our Services
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch" name="service_features_active"
                                            {{ $service->service_features_active ? 'checked' : '' }}>
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="form-group mb-3">
                                    <input data-selected="true" type="text" class="form-control" id="title"
                                        name="services_title" value="{{ $service->services_title }}"
                                        placeholder="Services Title">
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <textarea data-editor="true" rows="5" class="form-control" id="title" name="services_content_1"
                                            placeholder="First Content">{{ $service->services_first_content }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea data-editor="true" rows="5" class="form-control" id="title" name="services_content_2"
                                            value="" placeholder="Second Content">{{ $service->services_second_content }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- Benefits Section --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Benefits Section
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch" name="benefits_section_active"
                                            {{ $service->benefits_section_active ? 'checked' : '' }}>
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>

                                <div class="form-group mb-3">
                                    <input data-selected="true" type="text" class="form-control py-4" id="title"
                                        name="benefits_title" value="{{ $service->benefits_title }}"
                                        placeholder="Benefits Title">
                                </div>
                                <div class="form-group row mb-3" id="benefits_container">
                                    @if ($service->benefits->count() > 0)
                                        @foreach ($service->benefits as $benefit)
                                            <div class="col-md-12 mb-2">
                                                <input class="form-control" id="title" name="benefits[]"
                                                    value="{{ $benefit->benefits }}" placeholder="Benefits">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12 mb-2">
                                            <input class="form-control" id="title" name="benefits[]" value=""
                                                placeholder="Benefits">
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0)" data-container="benefits_container"
                                    class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Add more
                                </a>
                            </div>

                            {{-- Requirements 1 --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Requirements Section
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch" name="requirements_section_1_active"
                                            {{ $service->requirements_section_1_active ? 'checked' : '' }}>
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="requirement_image">
                                                Requirements Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="requirement_image" name="requirement_image" value=""
                                                    placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->requirements_section_1_image == null ? asset('custom/placeholder.png') : asset($service->requirements_section_1_image) }}"
                                                    alt="">
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirements_title"
                                                value="{{ $service->requirements_section_1_title }}"
                                                placeholder="Requirements Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirement_subtitle"
                                                value="{{ $service->requirements_section_1_subtitle }}"
                                                placeholder="Requirements Subtitle">
                                        </div>
                                        <div class="form-group row mb-3" id="requirements_container">
                                            @if ($service->requirements->count() > 0)
                                                @foreach ($service->requirements as $requirement)
                                                    <div class="col-md-12 mb-2">
                                                        <textarea data-editor="true" class="form-control" id="requirement" name="requirement[]">{{ $requirement->requirements }}</textarea>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12 mb-2">
                                                    <textarea data-editor="true" class="form-control" id="requirement" name="requirement[]" value=""
                                                        placeholder="Requirements"></textarea>
                                                </div>
                                            @endif
                                        </div>
                                        <a href="javascript:void(0)" data-container="requirements_container"
                                            class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Add more
                                        </a>
                                    </div>

                                </div>
                            </div>

                            {{-- Requirements 2 --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Requirements Section 2
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->requirements_section_2_active ? 'checked' : '' }}
                                            name="requirements_section_2_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirements_title_2"
                                                value="{{ $service->requirements_section_2_title }}"
                                                placeholder="Requirements 2 Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirement_subtitle_2"
                                                value="{{ $service->requirements_section_2_subtitle }}"
                                                placeholder="Requirements  2 Subtitle">
                                        </div>
                                        <div class="form-group row mb-3" id="requirements_container2">
                                            @if ($service->secondRequirements->count() > 0)
                                                @foreach ($service->secondRequirements as $requirement)
                                                    <div class="col-md-12 mb-2">
                                                        <textarea class="form-control" data-editor="true" id="title" name="requirements2[]" value="">{{ $requirement->requirements }}</textarea>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12 mb-2">
                                                    <textarea class="form-control" data-editor="true" id="title" name="requirements2[]" value=""
                                                        placeholder="Requirements"></textarea>
                                                </div>
                                            @endif
                                        </div>
                                        <a href="javascript:void(0)" data-container="requirements_container2"
                                            class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Add more
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="requirement2_image">
                                                Requirements Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="requirement2_image" name="requirement2_image" value=""
                                                    placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->requirements_section_2_image !== null ? asset($service->requirements_section_2_image) : asset('custom/placeholder.png') }}"
                                                    alt="">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- OPTION 1 --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Option 1
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->option_1_active ? 'checked' : '' }} name="option_1_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="option_1_title"
                                                value="{{ $service->option_1_title }}" placeholder="Option Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="options_1_content"
                                                    value="" placeholder="Context">{{ $service->option_1_content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="options_1_image">
                                                Option 1 Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="options_1_image" name="options_1_image" value="">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->option_1_image == null ? asset('custom/placeholder.png') : asset($service->option_1_image) }}"
                                                    alt="">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Option 2 --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Options 2
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->option_2_active ? 'checked' : '' }} name="option_2_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="options_2_image">
                                                Option Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="options_2_image" name="options_2_image" value=""
                                                    placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="options_2_title" value=""
                                                placeholder="Option Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="options_2_content"
                                                    value="" placeholder="Context"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Option 3 --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Options 3
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->option_3_active ? 'checked' : '' }} name="option_3_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="options_3_title" name="options_3_title"
                                                value="{{ $service->option_3_title }}" placeholder="Option Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="options_3_content"
                                                    value="" placeholder="Context">{{ $service->option_3_content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="options_3_image">
                                                Option Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="options_3_image" name="options_3_image" value=""
                                                    placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->option_3_image !== null ? asset($service->option_3_image) : asset('custom/placeholder.png') }}"
                                                    alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Extra Requirements --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Extra Requirements
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->extra_requirements_active ? 'checked' : '' }}
                                            name="extra_requirements_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="extra_requirements">
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="extra_requirements" name="extra_requirements_image"
                                                    value="" placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->extra_requirements_image == null ? asset('custom/placeholder.png') : asset($service->extra_requirements_image) }}"
                                                    alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="extra_requirements_title" name="extra_requirements_title"
                                                value="{{ $service->extra_requirements_title }}"
                                                placeholder="Extra Requirements">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="extra_requirements_content"
                                                    name="extra_requirements_content" placeholder="Context">{{ $service->extra_requirements_content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MANDATORY REQUIREMENTS --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Mandatory Requirements
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->mandatory_requirements_active ? 'checked' : '' }}
                                            name="mandatory_requirements_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div>
                                    <div class="">
                                        <div class="form-group
                                        mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="mandatory_requirements_title" name="mandatory_requirements_title"
                                                value="{{ $service->mandatory_requirements_title }}"
                                                placeholder="Requirements Title">
                                        </div>
                                    </div>
                                    <div id="mandatory_requirements_container">
                                        @if ($service->mandatoryRequirements->count() > 0)
                                            @foreach ($service->mandatoryRequirements as $requirement)
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <input data-selected="true" type="text"
                                                                class="form-control py-2" id=""
                                                                name="mandatory_requirements_text[]"
                                                                value="{{ $requirement->requirements }}"
                                                                placeholder="Requirements">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <textarea data-editor="true" class="form-control w-100" rows="8" id="title"
                                                            name="mandatory_requirements_content[]" value="{{ $requirement->requirement_context }}" placeholder="Context"></textarea>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <input data-selected="true" type="text"
                                                            class="form-control py-2" id=""
                                                            name="mandatory_requirements_text[]" value=""
                                                            placeholder="Requirements">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea data-editor="true" class="form-control w-100" rows="8" id="title"
                                                        name="mandatory_requirements_content[]" value="" placeholder="Context"></textarea>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div> <!-- Add this closing div tag -->
                                <a href="javascript:void(0)" data-container="mandatory_requirements_container"
                                    class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Add more
                                </a>
                            </div>

                            {{-- Timeline of Events --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Timeline of Events
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->timeline_of_events_active ? 'checked' : '' }}
                                            name="timeline_of_events_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div>
                                    <div class="">
                                        <div class="form-group
                                        mb-3">
                                            <label for="timeline_of_events_title">
                                            </label>
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="timeline_of_events_title" name="timeline_of_events_title"
                                                value="{{ $service->timeline_of_events_title }}"
                                                placeholder="Timeline Title">
                                        </div>
                                    </div>
                                    <div id="timeline_of_events_container">
                                        @if ($service->timelineOfEvents->count() > 0)
                                            @foreach ($service->timelineOfEvents as $event)
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <input data-selected="true" type="text"
                                                                class="form-control py-2" id=""
                                                                name="timeline_of_events_duration[]"
                                                                value="{{ $event->duration }}" placeholder="Duration">
                                                        </div>
                                                        <div class="mb-2">
                                                            <input data-selected="true" type="text"
                                                                class="form-control py-2" id=""
                                                                name="timeline_of_events_plan[]"
                                                                value="{{ $event->plan }}" placeholder="Plan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <textarea data-editor="true" class="form-control w-100" rows="8" name="timeline_of_events_content[]"
                                                            value="" placeholder="Context">{{ $event->timeline_context }}</textarea>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <input data-selected="true" type="text"
                                                            class="form-control py-2" id=""
                                                            name="timeline_of_events_duration[]" value=""
                                                            placeholder="Duration">
                                                    </div>
                                                    <div class="mb-2">
                                                        <input data-selected="true" type="text"
                                                            class="form-control py-2" id=""
                                                            name="timeline_of_events_plan[]" value=""
                                                            placeholder="Plan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea data-editor="true" class="form-control w-100" rows="8" name="timeline_of_events_content[]"
                                                        value="" placeholder="Context"></textarea>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div> <!-- Add this closing div tag -->
                                <a href="javascript:void(0)" data-container="timeline_of_events_container"
                                    class="text-success d-inline-block mb-2 my-2 add_more_content_buttons">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Add more
                                </a>
                            </div>

                            {{-- Sponship Section --}}
                            <div class="border p-3 m-1 border-success-subtle rounded-1 position-relative">
                                <span class="d-flex gap-3 z-3000">
                                    <h1 data-title="title" class="mb-3 d-block fw-bolder fs-4">
                                        Sponsorship Section
                                    </h1>
                                    <label class="custom-switch">
                                        <input type="checkbox" class="active_switch"
                                            {{ $service->sponsorship_active ? 'checked' : '' }} name="sponsorship_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="sponsorship_title"
                                                value="{{ $service->sponsorship_title }}"
                                                placeholder="Sponsorship Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="sponsorship_content"
                                                    value="" placeholder="Context">{{ $service->sponsorship_content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group
                                        mb-3">
                                            <label for="sponsorship_image">
                                                Sponsorship Image
                                                <input data-selected="true" type="file" class="form-control py-2"
                                                    id="sponsorship_image" name="sponsorship_image" value=""
                                                    placeholder="Requirements Title">
                                                <img class="img-fluid object-fit-cover border" width="100%"
                                                    src="{{ $service->sponsorship_image == null ? asset('custom/placeholder.png') : asset($service->sponsorship_image) }}"
                                                    alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Tags
                                        </label>
                                        <input data-selected="true" type="text"
                                            class="form-control px-2 py-2 fs-5 fw-bold" id="tags" name="tags"
                                            value="{{ old('tags') !== null ? old('tags') : $service->tags }}"
                                            placeholder="Tags here comma seperated">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Select a Country
                                        </label>
                                        <select type="text" class="form-control px-2 py-2 fs-5 fw-bold" id="country"
                                            required name="country">
                                            <option value="" selected disabled>(--- Select Country ---)</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ $country->name == $service->country ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Select a service
                                        </label>
                                        <select type="text" class="form-control px-2 py-2 fs-5 fw-bold" id="service"
                                            required name="service">
                                            <option value="" selected disabled>(--- Select Service ---)</option>
                                            @foreach ($allService as $thisService)
                                                <option value="{{ $thisService->slug }}"
                                                    {{ $thisService->slug == $service->service ? 'selected' : '' }}>
                                                    {{ $thisService->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Active Status
                                        </label>
                                        <select type="text" class="form-control px-2 py-2 fs-5 fw-bold" id="status"
                                            required name="status">
                                            <option value="active" {{ $service->status == true ? 'selected' : '' }}>Published
                                            </option>
                                            <option value="draft" {{ $service->status == false ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="px-4 py-3 btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input type="search" class="form-control fs-3" placeholder="Search here" id="search">
                    <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </a>
                </div>
                <div class="modal-body message-body" data-simplebar="">
                    <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--  Shopping Cart -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
@endsection
