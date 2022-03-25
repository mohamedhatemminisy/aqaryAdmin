@extends('admin.layouts.master')
@section('subheader')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a class="text-muted">@yield('module_name')</a>
        </li>
        <li class="breadcrumb-item">
            <a class="text-muted">@yield('page_type')</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <!--start::Form-->
    <form action="@yield('store_route')" method="@yield('form_type')" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-custom alert-danger" role="alert">
                <div class="alert-text">
                    @foreach ($errors->all() as $error)
                        <span class="d-flex align-items-center">
                            <div class="alert-icon" style="padding-inline-end: 5px">
                                <i style="font-size: 14px" class="flaticon-warning"></i>
                            </div> {{ $error }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        @if (Session()->has('success'))
            <div class="alert alert-custom alert-notice alert-light-success fade show mb-5" role="alert">
                <div class="alert-icon">
                    <i class="flaticon-like"></i>
                </div>
                <div class="alert-text">
                    {{ Session()->get('success') }}
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="ki ki-close"></i>
                        </span>
                    </button>
                </div>
            </div>
        @endif

        @yield('fields_content')
    </form>
    <!--end::Form-->

    @yield('extra_custom_form')

    @push('css')

    @endpush
@endsection
