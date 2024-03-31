@extends('../layouts/admin/adminlayout', [
    'pagedata' => $pagedata,
    'title' => 'Create New Service  - ' . $pagedata->site_name,
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
                    {{-- EDITOR HERE --}}
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

                    <div class="card rounded-2 overflow-hidden p-md-4 p-2">
                        <form action="{{ route('admin.immigration.services') }}" method="post"
                            enctype="multipart/form-data" id="addNewServiceForm">
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
                                        name="title" value="" required placeholder="Add a title ...">
                                </div>


                                <label htmlFor="featured_article_image" id="file_upload_label">
                                    <p>Featured Image</p>
                                    <input data-selected="true" type="file" className="hidden d-none"
                                        id="featured_article_image" name="image" />
                                    <img src="{{ asset('custom/placeholder.png') }}" alt="" width="500"
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
                                        <input type="checkbox" class="active_switch" name="highlight_features_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div id="highlight_container">
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6 mb-1">
                                            <input data-selected="true" type="text" class="form-control"
                                                name="highlight_feature[]" value="" placeholder="Highlighted Feature">
                                        </div>
                                        <div class="col-md-6">
                                            <input data-selected="true" type="text" class="form-control"
                                                name="highlight_context[]" value=""
                                                placeholder="Highlighted Context ">
                                        </div>
                                    </div>
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
                                        <input type="checkbox" class="active_switch" name="service_features_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="form-group mb-3">
                                    <input data-selected="true" type="text" class="form-control" id="title"
                                        name="services_title" value="" placeholder="Services Title">
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-6">
                                        <textarea data-editor="true" rows="5" class="form-control" id="title" name="services_content_1" value=""
                                            placeholder="First Content"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea data-editor="true" rows="5" class="form-control" id="title" name="services_content_2" value=""
                                            placeholder="Second Content"></textarea>
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
                                        <input type="checkbox" class="active_switch" name="benefits_section_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>

                                <div class="form-group mb-3">
                                    <input data-selected="true" type="text" class="form-control py-4" id="title"
                                        name="benefits_title" value="" placeholder="Benefits Title">
                                </div>
                                <div class="form-group row mb-3" id="benefits_container">
                                    <div class="col-md-12 mb-2">
                                        <input class="form-control" id="title" name="benefits[]" value=""
                                            placeholder="Benefits">
                                    </div>
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
                                        <input type="checkbox" class="active_switch"
                                            name="requirements_section_1_active">
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirements_title" value=""
                                                placeholder="Requirements Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirement_subtitle" value=""
                                                placeholder="Requirements Subtitle">
                                        </div>
                                        <div class="form-group row mb-3" id="requirements_container">
                                            <div class="col-md-12 mb-2">
                                                <textarea data-editor="true" class="form-control" id="requirement" name="requirement[]" value="" placeholder="Requirements"></textarea>
                                            </div>
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
                                            name="requirements_section_2_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirements_title_2" value=""
                                                placeholder="Requirements 2 Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="requirement_subtitle_2" value=""
                                                placeholder="Requirements  2 Subtitle">
                                        </div>
                                        <div class="form-group row mb-3" id="requirements_container2">
                                            <div class="col-md-12 mb-2">
                                                <textarea class="form-control" data-editor="true" id="title" name="requirements2[]" value="" placeholder="Requirements"></textarea>
                                            </div>
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
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
                                        <input type="checkbox" class="active_switch" name="option_1_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="options_1_title" value=""
                                                placeholder="Option Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="options_1_content"
                                                    value="" placeholder="Context"></textarea>
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
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
                                        <input type="checkbox" class="active_switch" name="option_2_active">
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
                                        <input type="checkbox" class="active_switch" name="option_3_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="options_3_title" name="options_3_title" value=""
                                                placeholder="Option Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="options_3_content"
                                                    value="" placeholder="Context"></textarea>
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
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
                                        <input type="checkbox" class="active_switch" name="extra_requirements_active">
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="extra_requirements_title" name="extra_requirements_title"
                                                value="" placeholder="Extra Requirements">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="extra_requirements_content"
                                                    name="extra_requirements_content" value="" placeholder="Context"></textarea>
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
                                            name="mandatory_requirements_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div>
                                    <div class="">
                                        <div class="form-group
                                        mb-3">
                                            <label for="mandatory_requirements_title">
                                            </label>
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="mandatory_requirements_title" name="mandatory_requirements_title"
                                                value="" placeholder="Requirements Title">
                                        </div>
                                    </div>
                                    <div id="mandatory_requirements_container">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <input data-selected="true" type="text" class="form-control py-2"
                                                        id="" name="mandatory_requirements_text[]"
                                                        value="" placeholder="Requirements">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea data-editor="true" class="form-control w-100" rows="8" id="title"
                                                    name="mandatory_requirements_content[]" value="" placeholder="Context"></textarea>
                                            </div>
                                        </div>
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
                                        <input type="checkbox" class="active_switch" name="timeline_of_events_active">
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
                                                value="" placeholder="Timeline Title">
                                        </div>
                                    </div>
                                    <div id="timeline_of_events_container">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <input data-selected="true" type="text" class="form-control py-2"
                                                        id="" name="timeline_of_events_duration[]"
                                                        value="" placeholder="Duration">
                                                </div>
                                                <div class="mb-2">
                                                    <input data-selected="true" type="text" class="form-control py-2"
                                                        id="" name="timeline_of_events_plan[]" value=""
                                                        placeholder="Plan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea data-editor="true" class="form-control w-100" rows="8" name="timeline_of_events_content[]"
                                                    value="" placeholder="Context"></textarea>
                                            </div>
                                        </div>
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
                                        <input type="checkbox" class="active_switch" name="sponsorship_active">
                                        <span class="custom-slider custom-round"></span>
                                    </label>
                                </span>
                                <div class="row">
                                    <div class="col-md-6 pt-4">
                                        <div class="form-group mb-3">
                                            <input data-selected="true" type="text" class="form-control py-2"
                                                id="title" name="sponsorship_title" value=""
                                                placeholder="Sponsorship Title">
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                                <textarea data-editor="true" class="form-control" rows="8" id="title" name="sponsorship_content"
                                                    value="" placeholder="Context"></textarea>
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
                                                    src="{{ asset('custom/placeholder.png') }}" alt="">
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
                                            value="{{ old('tags') }}" placeholder="Tags here comma seperated">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Select a Country
                                        </label>
                                        <select type="text" class="form-control px-2 py-2 fs-5 fw-bold" id="country"
                                            required name="country">
                                            <option value="" selected disabled>(--- Select Country ---)</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}">
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
                                            <option value="study">
                                                Study
                                            </option>
                                            <option value="citizenship">
                                                Citezenship
                                            </option>
                                            <option value="residency">
                                                Residency
                                            </option>
                                            <option value="work-permit">
                                                Work Permit
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold d-inline-block">
                                            Active Status
                                        </label>
                                        <select type="text" class="form-control px-2 py-2 fs-5 fw-bold" id="status"
                                            required name="status">
                                            <option value="active" selected>Published</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="px-4 py-3 btn btn-primary">Publish</button>
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
                    <input data-selected="true" type="search" class="form-control fs-3" placeholder="Search here"
                        id="search">
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
