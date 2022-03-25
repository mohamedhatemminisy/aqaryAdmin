@extends('admin.components.form')
@section('module_name', trans('users.users'))
@section('page_type', trans('general.add_new'))
@section('title') @lang('users.users') @endsection
@section('index_route', route('users.index'))
@section('store_route', route('users.store'))
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
                    <label>@lang('users.name')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="name" placeholder="@lang('users.name')" class="form-control  pl-5 min-h-40px @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('users.email')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="email" placeholder="@lang('users.email')" class="form-control  pl-5 min-h-40px @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('users.username')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="username" placeholder="@lang('users.username')" class="form-control  pl-5 min-h-40px @error('username') is-invalid @enderror" value="{{ old('username') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('users.password')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="@lang('users.password')" class="form-control  pl-5 min-h-40px @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('roles.role')<span class="text-danger"> * </span></label>
                    <select class="form-control selectpicker @error('role') is-invalid @enderror" name="role" title="@lang('roles.role')">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="col-form-label d-block">@lang('gallery.image')</label>
                        @include('admin.components.image_create')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('users.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
