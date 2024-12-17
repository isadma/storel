@extends("layouts.app")

@section("title", "Esasy")

@section("breadcrumb")
    @include("components.partials.breadcrumb", ["title" => "Dashboard", "subTitle" => "|"])
@endsection

@section("content")
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row gy-5 gx-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-handcart fs-4x"></i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">
                                    {{number_format($products)}}
                                </span>
                                <a class="mt-3" href="{{route("products.index")}}">
                                    <span class="fw-semibold fs-1 text-gray-600">
                                        Harytlar
                                        <i class="ki-duotone ki-black-right fs-2"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-element-plus fs-4x">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">
                                    {{number_format($categories)}}
                                </span>
                                <a class="mt-3" href="{{route("categories.index")}}">
                                    <span class="fw-semibold fs-1 text-gray-600">
                                        Kategoriýalar
                                        <i class="ki-duotone ki-black-right fs-2"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-tag fs-4x">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">
                                    {{number_format($brands)}}
                                </span>
                                <a class="mt-3" href="{{route("brands.index")}}">
                                    <span class="fw-semibold fs-1 text-gray-600">
                                        Brendler
                                        <i class="ki-duotone ki-black-right fs-2"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
@endsection
