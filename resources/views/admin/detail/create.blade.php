@extends('admin.components.form')
@section('module_name', trans('detail.detail'))
@section('page_type', trans('general.add_new'))
@section('title') @lang('detail.detail') @endsection
@section('index_route', route('properties.detail', $property_id))
@section('store_route', route('detail.store'))
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
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                href="{{ '#' . $locale }}">@lang('general.'.$locale)</a>
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
                            <label>@lang('detail.title') - @lang('general.'.$locale)<span class="text-danger"> *
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}" id="{{ $locale . '[title]' }}"
                                    placeholder="@lang('detail.title')"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                    value="{{ old($locale . '.title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('detail.value') - @lang('general.'.$locale)<span class="text-danger"> *
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[value]' }}" id="{{ $locale . '[value]' }}"
                                    placeholder="@lang('detail.value')"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.value') is-invalid @enderror"
                                    value="{{ old($locale . '.value') }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="property_id" value="{{ $property_id }}">
    </div>
    <div class="card card-custom">
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('categories.index') }}"
                class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
