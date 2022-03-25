@extends('admin.components.form')
@section('module_name', trans('users.users'))
@section('page_type', trans('general.edit'))
@section('title') @lang('users.users') @endsection
@section('index_route', route('users.index'))
@section('store_route', route('users.update', $user))
@section('form_type', 'POST')

@section('fields_content')
    @method('patch')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.edit')</h3>
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
                        <input type="text" name="name" placeholder="@lang('users.name')" class="form-control  pl-5 min-h-40px @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('users.email')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="email" placeholder="@lang('users.email')" class="form-control  pl-5 min-h-40px @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>@lang('users.username')<span class="text-danger"> * </span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                        </div>
                        <input type="text" name="username" placeholder="@lang('users.username')" class="form-control  pl-5 min-h-40px @error('username') is-invalid @enderror" value="{{ $user->username }}">
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
                            <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}>{{ $role->name }}</option>
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
                        <label class="col-form-label d-block">@lang('users.image')</label>
                        @if (isset($user->image))
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{ asset($user->image) }})">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg, .svg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        @else
                            @include('admin.components.image_create')
                        @endif
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
