@extends("layouts.app")

@section("title", "Harytlar")

@section("breadcrumb")
    @include("components.partials.breadcrumb", ["title" => "Harytlar", "subTitle" => "Esasy"])
@endsection

@section("content")
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->

                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Harytlar</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Jemi: {{count($data)}}</span>
                        </h3>

                        <div class="ms-3 d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                            <input type="text" data-kt-user-table-filter="search" id="dtSearch" class="form-control form-control-solid w-250px ps-13" placeholder="Haryt gözle" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        @include("components.datatables.export")

                        <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="ki-duotone ki-plus-square fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Goş
                        </a>
                        <!--end::Primary button-->

                        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="fw-bold">Add</h2>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                    </div>
                                    <form method="POST" class="form" action="{{route("products.store")}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Kategoriýa</span>
                                                </label>
                                                <select class="form-control form-control-solid" required name="category_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Brend</span>
                                                </label>
                                                <select class="form-control form-control-solid" required name="brand_id">
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="required">Ady</span>
                                                </label>
                                                <input class="form-control form-control-solid" type="text" required name="name" value=""/>
                                            </div>
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="">Gelen baha</span>
                                                </label>
                                                <input class="form-control form-control-solid" type="number" step="0.01" min="0" name="price1" value=""/>
                                            </div>
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="">Satyş baha</span>
                                                </label>
                                                <input class="form-control form-control-solid" type="number" step="0.01" min="0" name="price2" value=""/>
                                            </div>
                                            <div class="fv-row mb-5">
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    <span class="">Bellik</span>
                                                </label>
                                                <input class="form-control form-control-solid" type="text" name="note" value=""/>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Yza</button>
                                            <button type="submit" class="btn btn-primary">Goş</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 kt_table" id="kt_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="">ID</th>
                            <th class="">Kat/Br</th>
                            <th class="">Name</th>
                            <th class="">Gelen baha</th>
                            <th class="">Satyş baha</th>
                            <th class="">Bellik</th>
                            <th class="">Üýtgedilen wagty</th>
                            <th class="">Goşmaça</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($data as $item)
                            <tr>
                                {!! \App\Helpers\Datatable::text($item->id) !!}
                                {!! \App\Helpers\Datatable::titleDescription($item->category->name ?? null, $item->brand->name ?? null) !!}
                                {!! \App\Helpers\Datatable::text($item->name) !!}
                                {!! \App\Helpers\Datatable::text(number_format($item->price1, 2)) !!}
                                {!! \App\Helpers\Datatable::text(number_format($item->price2, 2)) !!}
                                {!! \App\Helpers\Datatable::text($item->note) !!}
                                {!! \App\Helpers\Datatable::text($item->updated_at) !!}
                                <td>
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Goşmaça
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#updateModal{{$item->id}}">Üýtget</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <form action="{{route("products.destroy", $item->id)}}" method="POST" style="display:inline;">
                                                @csrf
                                                @method("DELETE")
                                                <a href="#" onclick="if (confirm('Hakykatdanam pozmak isleýärsiňizmi?')) {this.parentElement.submit();}" class="menu-link px-3">
                                                    Poz
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    <!--end::Menu-->
                                </td>

                                <div class="modal fade" id="updateModal{{$item->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="fw-bold">Edit</h2>
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                            </div>
                                            <form method="POST" class="form" action="{{route("products.update", $item->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method("PUT")
                                                <div class="modal-body">
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="required">Kategoriýa</span>
                                                        </label>
                                                        <select class="form-control form-control-solid" required name="category_id">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{$category->id == $item->category_id ? "selected" : null}}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="required">Brend</span>
                                                        </label>
                                                        <select class="form-control form-control-solid" required name="brand_id">
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}" {{$brand->id == $item->brand_id ? "selected" : null}}>{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="required">Ady</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="text" required name="name" value="{{$item->name}}"/>
                                                    </div>
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="">Gelen baha</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="number" step="0.01" min="0" name="price1" value="{{$item->price1}}"/>
                                                    </div>
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="">Satyş baha</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="number" step="0.01" min="0" name="price2" value="{{$item->price2}}"/>
                                                    </div>
                                                    <div class="fv-row mb-5">
                                                        <label class="fs-5 fw-bold form-label mb-2">
                                                            <span class="">Bellik</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="text" name="note" value="{{$item->note}}"/>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Yza</button>
                                                    <button type="submit" class="btn btn-primary">Üýtget</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
