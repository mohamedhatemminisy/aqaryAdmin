<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <base href="">
    <meta charset="utf-8" />
    {{-- <title>{{ trans('general.login') }} | {{ settings()->website_title }}</title> --}}
    <meta name="description" content="Singin page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.ico" />
    <link rel="canonical" href="" />
    <title>login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/new-style-ar.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" />
        <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'El Messiri', Courier, monospace
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('admin') }}/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="login-aside d-flex flex-column flex-row-auto">
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <a href="{{ url(app()->getLocale()) }}" class="login-logo text-center pt-lg-25 pb-10">
                        {{-- <img src="{{ asset(settings()->logo) }}" class="max-h-100px" alt="" /> --}}
                    </a>
                </div>
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% + 5rem); background-image: url({{ asset('admin') }}/assets/media/svg/illustrations/login-visual-5.svg)"></div>
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="login-content flex-row-fluid d-flex flex-column p-10">
                <div class="d-flex flex-row-fluid flex-center">
                    <div class="login-form">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="font-size-h6 font-weight-bolder text-dark">{{ trans('general.fields.email') }}</label>
                                <input id="email" class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-size-h6 font-weight-bolder text-dark">{{ trans('general.fields.password') }}</label>
                                <input id="password" type="password" class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary" for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span></span> {{ trans('general.fields.remember_me') }}
                                </label>
                            </div>
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                    {{ trans('general.login') }}
                                </button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Main-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/pages/custom/login/login-3.js"></script>
    <!--end::Page Scripts-->
</body>

</html>
