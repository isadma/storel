<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      direction="{{ __('config.direction') }}"
      dir="{{ __('config.direction') }}"
      style="direction: {{ __('config.direction') }}"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    {!! \App\Helpers\Helper::version("css/plugins.bundle.css", "css") !!}
    {!! \App\Helpers\Helper::version("css/style.bundle.css", "css") !!}

    @yield('styles')

</head>
<body id="kt_body" class="app-blank app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <!--begin::Body-->
                <div class="py-20">
                    <!--begin::Form-->
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('content')
                    <!--end::Form-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{asset("images/auth-bg.png")}})"></div>
        <!--begin::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>

{!! \App\Helpers\Helper::version("js/plugins.bundle.js", "js") !!}
{!! \App\Helpers\Helper::version("js/scripts.bundle.js", "js") !!}
@yield('scripts')

</body>
</html>
