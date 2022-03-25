@extends('admin.components.form')
@section('module_name', trans('permissions.permissions'))
@section('page_type', trans('general.add_new'))
@section('title') @lang('permissions.permissions') @endsection
@section('index_route', route('permissions.index'))
@section('store_route', route('permissions.store'))
@section('form_type', 'POST')

@section('fields_content')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.add_new')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group">
                    <label>@lang('permissions.name')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="name" placeholder="@lang('permissions.name')" class="form-control  pl-5 min-h-40px @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
