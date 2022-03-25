@extends('admin.layouts.master')

@section('content')
    <style>
        i {
            font-size: 2.25rem;
            color: #000000;
        }

    </style>
    {{-- <div class="row justify-content-center align-items-center h-100" style="text-align: center;margin: 0 auto;">
        <div class="page-content m-atuo text-center">
            <img style="width: 450px;" src="{{ asset(settings()->logo) }}" class="img-fluid logo">
            <h2 style="font-size: 40px;" class="text-capitalize">@lang('general.hi') {{ auth()->user()->name }}</h2>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-folder"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ $categories_count }}</span>
                    <span class="font-weight-bold font-size-sm">@lang('categories.categories')</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-tea-cup"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">  </span>
                    <span class="font-weight-bold font-size-sm">@lang('recipes.recipes')</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-earth-globe"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">  </span>
                    <span class="font-weight-bold font-size-sm">@lang('kitchen.kitchen')</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-edit-1"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">  </span>
                    <span class="font-weight-bold font-size-sm">@lang('comments.comments')</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-users"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ $users_count }}</span>
                    <span class="font-weight-bold font-size-sm">@lang('users.users')</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                <div class="card-body">
                    <i class="flaticon-email"></i>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ $contacts_count }}</span>
                    <span class="font-weight-bold font-size-sm">@lang('contact.contact')</span>
                </div>
            </div>
        </div>
    </div>
@endsection
