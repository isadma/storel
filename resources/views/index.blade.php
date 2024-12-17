@extends("layouts.app")

@section("title", "Esasy")

@section("breadcrumb")
    @include("components.partials.breadcrumb", ["title" => "Dashboard", "subTitle" => "|"])
@endsection

@section("content")
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

        </div>
    </div>
@endsection

@section("scripts")
@endsection
