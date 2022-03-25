@extends('admin.components.form')
@section('module_name', trans('properties.properties'))
@section('page_type', trans('general.add_new'))
@section('title') @lang('properties.properties') @endsection
@section('index_route', route('properties.index'))
@section('store_route', route('properties.store'))
@section('form_type', 'POST')

@section('fields_content')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.add_new')</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab" href="{{ '#' . $locale }}">@lang('general.'.$locale)</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="form-group">
                            <label>@lang('properties.title') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}" placeholder="@lang('properties.title')" class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror" value="{{ old($locale . '.title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('properties.address') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[address]' }}" placeholder="@lang('properties.address')" class="form-control  pl-5 min-h-40px @error($locale . '.address') is-invalid @enderror" value="{{ old($locale . '.address') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('properties.description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[description]' }}" @error($locale . '.description' ) is-invalid @enderror class="{{ $locale }}-kt-ckeditor-5">{{ old($locale . '.description') }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="col-form-label d-block">@lang('properties.image')</label>
                        @include('admin.components.image_create')
                    </div>
                    <div class="form-group">
                        <label class="col-form-label d-block">@lang('properties.image_multiple')</label>
                        @include('admin.components.image_multiple')
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.category_name')</label>
                        <select class="form-control selectpicker @error('category_id') is-invalid @enderror" name="category_id" title="@lang('properties.category_name')">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.location')</label>
                        <input type="text" value="{{ old('location') }}" placeholder="@lang('properties.location')" name="location" class="form-control
                          @error('location') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.video')</label>
                        <input type="text" value="{{ old('video') }}" placeholder="@lang('properties.video')" name="video" class="form-control
                          @error('video') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.phone')</label>
                        <input type="text" value="{{ old('phone') }}" placeholder="@lang('properties.phone')" name="phone" class="form-control
                          @error('phone') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.price')</label>
                        <input type="text" value="{{ old('price') }}" placeholder="@lang('properties.price')" name="price" class="form-control
                          @error('price') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('properties.email')</label>
                        <input type="text" value="{{ old('email') }}" placeholder="@lang('properties.email')" name="email" class="form-control
                          @error('email') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label d-block">@lang('properties.recype_status')</label>
                        <span class="switch switch-lg switch-icon">
                            <label>
                                <input type="checkbox" name="featured">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('properties.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
