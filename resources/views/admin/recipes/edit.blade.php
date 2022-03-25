@extends('admin.components.form')
@section('module_name', trans('recipes.recipes'))
@section('page_type', trans('general.edit'))
@section('title') @lang('recipes.recipes') @endsection
@section('index_route', route('recipes.index'))
@section('store_route', route('recipes.update', $data))
@section('form_type', 'POST')

@section('fields_content')
    @method('put')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.edit')</h3>
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
                            <label>@lang('recipes.title') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}" placeholder="@lang('recipes.title')" class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror" value="{{ old($locale . '.title', $data->translate($locale)->title) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('recipes.image_alt') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[image_alt]' }}" placeholder="@lang('recipes.image_alt')" class="form-control pl-5 min-h-40px @error($locale . '.image_alt') is-invalid @enderror" value="{{ old($locale . '.image_alt', $data->translate($locale)->image_alt) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('recipes.description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[description]' }}" @error($locale . '.description' ) is-invalid @enderror class="{{ $locale }}-kt-ckeditor-5">{{ old($locale . '.description', $data->translate($locale)->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('recipes.ingredients') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[ingredients]' }}" @error($locale . '.ingredients' ) is-invalid @enderror class="{{ $locale }}-kt-ckeditor-ingredients-5">{{ old($locale . '.ingredients', $data->translate($locale)->ingredients) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('recipes.instructions') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[instructions]' }}" @error($locale . '.instructions' ) is-invalid @enderror class="{{ $locale }}-kt-ckeditor-instructions-5">{{ old($locale . '.instructions', $data->translate($locale)->instructions) }}</textarea>
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
                        <label class="col-form-label d-block">@lang('recipes.image')</label>
                        @if (isset($data->image))
                            @include('admin.components.image_edit')
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="col-form-label">@lang('recipes.category_name')</label>
                        <select class="form-control selectpicker @error('category_id') is-invalid @enderror" name="category_id" title="@lang('recipes.category_name')">
                            @foreach ($categories as $category)
                                <option {{ $category->id == $data->category_id ? 'selected=selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('recipes.kitchen_type')</label>
                        <select class="form-control selectpicker @error('kitchen_type_id') is-invalid @enderror" name="kitchen_type_id" title="@lang('recipes.kitchen_type')">
                            @foreach ($kitchenTypes as $kitchen)
                                <option {{ $kitchen->id == $data->kitchen_type_id ? 'selected=selected' : '' }} value="{{ $kitchen->id }}">{{ $kitchen->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">@lang('recipes.recipe_date')</label>
                        <input type="text" value="{{ old('date', $data->date) }}" placeholder="@lang('recipes.recipe_date')" name="date" class="form-control  @error('date') is-invalid @enderror" id="kt_datepicker_1">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label d-block">@lang('recipes.recype_status')</label>
                        <span class="switch switch-lg switch-icon">
                            <label>
                                <input type="checkbox" name="is_slider" {{ $data->is_slider == 'on' ? 'checked=checked' : '' }}>
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('recipes.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
