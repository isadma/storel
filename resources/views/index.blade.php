@extends("layouts.app")

@section("title", "Home")

@section("breadcrumb")
    @include("components.partials.breadcrumb", ["title" => "Dashboard", "subTitle" => "Home"])
@endsection

@section("content")
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10">
                    <!--begin::Lists Widget 19-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Heading-->
                        <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                             style="background-image:url('{{asset("images/top-green.png")}}')" data-theme="light">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bold fs-2x mb-3">Hello, {{Auth::user()->fullname}}</span>
                                <div class="fs-4 text-white">
                                    <span class="opacity-75">You have</span>
                                    <span class="position-relative d-inline-block">
                                        <a href="{{route("reports.index")}}" class="link-white opacity-75-hover fw-bold d-block mb-1">
                                            {{$new_report_count}} under review
                                        </a>
                                        <span class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                    </span>
                                    <span class="opacity-75"> reports.</span>
                                </div>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <div class="card-body mt-n20">
                            <!--begin::Stats-->
                            <div class="mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-3 g-lg-6">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/medicine/med005.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <i class="ki-duotone ki-profile-user fs-2x">
                                                             <span class="path1"></span>
                                                             <span class="path2"></span>
                                                             <span class="path3"></span>
                                                             <span class="path4"></span>
                                                        </i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{number_format($user_count)}}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Total users</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <i class="ki-duotone ki-bank fs-2x">
                                                         <span class="path1"></span>
                                                         <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{number_format($report_count)}}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Total reports</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <i class="ki-duotone ki-entrance-left fs-2x">
                                                             <span class="path1"></span>
                                                             <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{number_format($income_count)}}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Total incomes</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <i class="ki-duotone ki-exit-right fs-2x">
                                                             <span class="path1"></span>
                                                             <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{number_format($expense_count)}}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Total expenses</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Lists Widget 19-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8 mb-xl-10">
                    <!--begin::Table widget 14-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Recent reports</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Recent created 5 reports</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="{{route("reports.index")}}" class="btn btn-sm btn-light">Show all</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-50px text-start">ID</th>
                                        <th class="p-0 pb-3 min-w-100px text-start">User</th>
                                        <th class="p-0 pb-3 min-w-100px text-start">Title</th>
                                        <th class="p-0 pb-3 min-w-175px text-start pe-12">Status</th>
                                        <th class="p-0 pb-3 w-125px text-start pe-7">Amount</th>
                                        <th class="p-0 pb-3 w-125px text-start pe-7">Period</th>
                                        <th class="p-0 pb-3 w-50px text-end">Actions</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @forelse ($reports as $item)
                                        <tr>
                                            {!! \App\Helpers\Datatable::text($item->no) !!}
                                            {!! \App\Helpers\Datatable::titleDescription($item->user->fullname, $item->user->email, route("users.show", $item->id)) !!}
                                            {!! \App\Helpers\Datatable::text($item->title) !!}
                                            {!! \App\Helpers\Datatable::label($item->period, "primary") !!}
                                            {!! \App\Helpers\Datatable::text(number_format($item->amount, 2)) !!}
                                            {!! \App\Helpers\Datatable::label($item->status->name, $item->status->color) !!}
                                            <td class="text-end">
                                                <a href="{{route("reports.show", $item->id)}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                    <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
                                                            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-hover-primary text-gray-600 text-center" colspan="7">No reports found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 14-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Card widget 19-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Membership</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">{{number_format($user_last_30_days)}} new users in last 30 days</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-6">
                            <!--begin::Row-->
                            <div class="row align-items-center mx-0 w-100">
                                <!--begin::Col-->
                                <div class="col-6 px-0">
                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column content-justify-center">
                                        @foreach($memberships as $item)
                                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                                <!--begin::Bullet-->
                                                <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px; background-color: {{$item->color}} !important;"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-5 fw-bold text-gray-600 me-5">{{$item->name}}</div>
                                                <!--end::Label-->
                                                <!--begin::Stats-->
                                                <div class="ms-auto fw-bolder text-gray-700 text-end">{{$item->total}} ({{round($item->percentage)}}%)</div>
                                                <!--end::Stats-->
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6 d-flex justify-content-end px-0">
                                    <!--begin::Chart-->
                                    <div id="membership_chart" class="mx-auto mb-4"></div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 19-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-3 text-center">
                    <!--begin::Engage widget 9-->
                    <div class="card card-flush h-lg-100 text-center">
                        <div class="card-header pt-5 mb-5 text-center">
                            <h3 class="card-title w-100 text-center">
                                <span class="card-label fw-bold text-gray-900 text-center">Entry type</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="entryTypeChart" class="mx-auto mb-4"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 9-->
                </div>
                <div class="col-xl-3 text-center">
                    <div class="card card-flush h-lg-100 text-center">
                        <div class="card-header pt-5 mb-5 text-center">
                            <h3 class="card-title w-100 text-center">
                                <span class="card-label fw-bold text-gray-900 text-center">Platform Android/iOS</span>
                            </h3>
                        </div>
                        <div class="card-body text-center">
                            <div id="platformChart" class="mx-auto mb-4"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 9-->
                </div>
                <!--end::Col-->
            </div>

            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-6  mb-xl-6">
                    <!--begin::Chart widget 18-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Income count</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Last 6 month entry count</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                            <!--begin::Chart-->
                            <div id="incomes_last_6_month" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Chart widget 18-->
                </div>
                <div class="col-xl-6  mb-xl-6">
                    <!--begin::Chart widget 18-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Expense count</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Last 6 month entry count</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                            <!--begin::Chart-->
                            <div id="expenses_last_6_month" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Chart widget 18-->
                </div>
            </div>

        </div>
        <!--end::Content container-->
    </div>
@endsection

@section("scripts")
    <script>
        const expenses_last_6_month = document.getElementById("expenses_last_6_month");
        new ApexCharts(expenses_last_6_month, {
            series: [{
                name: 'Orders',
                data: @json($last_6_month_expense)
            }],
            chart: { fontFamily: 'inherit', type: 'bar',  height: parseInt(KTUtil.css(expenses_last_6_month, 'height')),  toolbar: { show: false } },
            plotOptions: { bar: { horizontal: false, columnWidth: ['28%'], borderRadius: 5, dataLabels: {position: "top"}, startingShape: 'flat' }, },
            legend: { show: false },
            dataLabels: { enabled: true,  offsetY: -28,  style: { fontSize: '13px',  colors: [KTUtil.getCssVariableValue('--kt-gray-900')] },  formatter: function(val) { return val; } },
            stroke: { show: true,  width: 2,  colors: ['transparent'] },
            xaxis: {
                categories: @json($last_6_month_category),
                axisBorder: { show: false, },
                axisTicks: { show: false },
                labels: { style: { colors: KTUtil.getCssVariableValue('--kt-gray-500'),  fontSize: '13px' } },
                crosshairs: { fill: { gradient: { opacityFrom: 0,  opacityTo: 0 } } }
            },
            yaxis: {labels: {style: {colors: "KTUtil.getCssVariableValue('--kt-gray-500')", fontSize: '13px'}, formatter: function(val) {return val;}}},
            fill: { opacity: 1 },
            states: { normal: { filter: { type: 'none',  value: 0 } },  hover: { filter: { type: 'none',  value: 0 } },  active: { allowMultipleDataPointsSelection: false,  filter: { type: 'none',  value: 0 } } },
            tooltip: { style: { fontSize: '12px' },  y: { formatter: function (val) { return  + val } } },
            colors: ["#007bff", "#007bff"],
            grid: { borderColor: KTUtil.getCssVariableValue('--kt-border-dashed-color'),  strokeDashArray: 4,  yaxis: { lines: { show: true } } }
        }).render();

        const incomes_last_6_month = document.getElementById("incomes_last_6_month");
        new ApexCharts(incomes_last_6_month, {
            series: [{
                name: 'Orders',
                data: @json($last_6_month_income)
            }],
            chart: { fontFamily: 'inherit', type: 'bar',  height: parseInt(KTUtil.css(incomes_last_6_month, 'height')),  toolbar: { show: false } },
            plotOptions: { bar: { horizontal: false, columnWidth: ['28%'], borderRadius: 5, dataLabels: {position: "top"}, startingShape: 'flat' }, },
            legend: { show: false },
            dataLabels: { enabled: true,  offsetY: -28,  style: { fontSize: '13px',  colors: [KTUtil.getCssVariableValue('--kt-gray-900')] },  formatter: function(val) { return val; } },
            stroke: { show: true,  width: 2,  colors: ['transparent'] },
            xaxis: {
                categories: @json($last_6_month_category),
                axisBorder: { show: false, },
                axisTicks: { show: false },
                labels: { style: { colors: KTUtil.getCssVariableValue('--kt-gray-500'),  fontSize: '13px' } },
                crosshairs: { fill: { gradient: { opacityFrom: 0,  opacityTo: 0 } } }
            },
            yaxis: {labels: {style: {colors: KTUtil.getCssVariableValue('--kt-gray-500'), fontSize: '13px'}, formatter: function(val) {return val;}}},
            fill: { opacity: 1 },
            states: { normal: { filter: { type: 'none',  value: 0 } },  hover: { filter: { type: 'none',  value: 0 } },  active: { allowMultipleDataPointsSelection: false,  filter: { type: 'none',  value: 0 } } },
            tooltip: { style: { fontSize: '12px' },  y: { formatter: function (val) { return  + val } } },
            colors: ["#007bff", "#007bff"],
            grid: { borderColor: KTUtil.getCssVariableValue('--kt-border-dashed-color'),  strokeDashArray: 4,  yaxis: { lines: { show: true } } }
        }).render();

        var membership_chart = document.getElementById("membership_chart");
        new ApexCharts(membership_chart, {
            series: @json($membership_percentages),
            chart: { fontFamily: "inherit",  type: "donut",  width: 250 },
            plotOptions: { pie: { donut: { size: "50%",  labels: { value: { fontSize: "10px" } } } } },
            colors: @json($membership_colors),
            stroke: { width: 0 },
            labels: @json($membership_names),
            legend: { show: false},
            fill: { type: "false"}
        }).render();

        var entryTypeChart = document.getElementById("entryTypeChart");
        new ApexCharts(entryTypeChart, {
            series: @json($entries),
            chart: { fontFamily: "inherit",  type: "donut",  width: 250 },
            plotOptions: { pie: { donut: { size: "50%",  labels: { value: { fontSize: "10px" } } } } },
            colors: ["#007bff", "#28a745", "#17a2b8"],
            stroke: { width: 0 },
            labels: ["Manual", "Photo", "Invoice"],
            legend: { show: false},
            fill: { type: "false"}
        }).render();

        var platformChart = document.getElementById("platformChart");
        new ApexCharts(platformChart, {
            series: @json($platforms),
            chart: { fontFamily: "inherit",  type: "donut",  width: 250 },
            plotOptions: { pie: { donut: { size: "50%",  labels: { value: { fontSize: "10px" } } } } },
            colors: ["#007bff", "#28a745"],
            stroke: { width: 0 },
            labels: ["iOS", "Android"],
            legend: { show: false},
            fill: { type: "false"}
        }).render();

    </script>
@endsection
