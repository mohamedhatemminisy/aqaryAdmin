@extends('admin.components.form')
@section('module_name', trans('mission.mission'))
@section('page_type', trans('general.edit'))
@section('title') @lang('mission.mission') @endsection
@section('store_route', route('mission.update', $data))
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
                            <label>@lang('mission.title') - @lang('general.'.$locale)<span class="text-danger"> *
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}" placeholder="@lang('mission.title')"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                    value="{{ old($locale . '.title', $data->translate($locale)->title) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('mission.description') - @lang('general.'.$locale)<span class="text-danger"> *
                                </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[description]' }}"
                                    placeholder="@lang('mission.description')"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.description') is-invalid @enderror"
                                    value="{{ old($locale . '.description', $data->translate($locale)->description) }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('mission.icon')<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="icon" placeholder="@lang('mission.icon')"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.icon') is-invalid @enderror"
                                    value="{{ old('icon', $data->icon) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('mission.edit') }}"
                class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
