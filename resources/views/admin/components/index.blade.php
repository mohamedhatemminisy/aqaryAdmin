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
    <!--begin::Card-->
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
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">@lang('general.data')</h3>
            </div>
            @if (Route::is('contact.index'))
                <div class="card-toolbar"></div>
            @else
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="@yield('create_route')" class="btn btn-primary font-weight-bolder">
                        <i class="la la-plus"></i>@lang('general.add_new')
                    </a>
                    <!--end::Button-->
                </div>
            @endif
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            @yield('filters')
            <div class="table-responsive">
                @yield('page_content')
            </div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
@endsection
