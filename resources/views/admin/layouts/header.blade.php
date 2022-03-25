<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <base href="">
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.png" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@600&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap" /> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.rtl.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/new-style-ar.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                font-family: 'Noto Kufi Arabic', sans-serif;
            }

            div.dataTables_wrapper {
                direction: rtl;
            }

            div.dataTables_wrapper div.dataTables_filter {
                display: flex;
                justify-content: flex-end
            }

            div.dataTables_wrapper div.dataTables_filter input {
                margin-left: 0;
            }

            .table-responsive {

                overflow-y: hidden
            }

        </style>
    @else
        <link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('admin') }}/assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/plugins/custom/uppy/uppy.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/over-style.css" rel="stylesheet" type="text/css" />
</head>
