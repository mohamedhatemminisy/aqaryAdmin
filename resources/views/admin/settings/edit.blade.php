@extends('admin.components.form')
@section('module_name', trans('settings.settings'))
@section('page_type', trans('general.edit'))
@section('title') @lang('settings.settings') @endsection
@section('store_route', route('settings.update', $data))
@section('form_type', 'POST')

@section('fields_content')
    @method('put')
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
                            <label>@lang('settings.website_title') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[website_title]' }}" placeholder="@lang('settings.website_title')" class="form-control  pl-5 min-h-40px @error($locale . '.website_title') is-invalid @enderror"
                                    value="{{ old($locale . '.website_title', $data->translate($locale)->website_title) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('settings.meta_title') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[meta_title]' }}" placeholder="@lang('settings.meta_title')" class="form-control  pl-5 min-h-40px @error($locale . '.meta_title') is-invalid @enderror"
                                    value="{{ old($locale . '.meta_title', $data->translate($locale)->meta_title) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('settings.meta_keywords') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[meta_keywords]' }}" placeholder="@lang('settings.meta_keywords')" class="form-control  pl-5 min-h-40px @error($locale . '.meta_keywords') is-invalid @enderror"
                                    value="{{ old($locale . '.meta_keywords', $data->translate($locale)->meta_keywords) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('settings.address') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[address]' }}" placeholder="@lang('settings.address')" class="form-control pl-5 min-h-40px @error($locale . '.address') is-invalid @enderror" value="{{ old($locale . '.address', $data->translate($locale)->address) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('settings.meta_description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[meta_description]' }}" @error($locale . '.meta_description' ) is-invalid @enderror class="form-control" rows="5"
                                placeholder="@lang('settings.meta_description')">{{ old($locale . '.address', $data->translate($locale)->meta_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('settings.footer_description') - @lang('general.'.$locale)<span class="text-danger"> * </span></label>
                            <textarea name="{{ $locale . '[footer_description]' }}" @error($locale . '.footer_description' ) is-invalid @enderror class="form-control" rows="5"
                                placeholder="@lang('settings.footer_description')">{{ old($locale . '.address', $data->translate($locale)->footer_description) }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('settings.facebook')<span class="text-danger"> * </span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                            </div>
                            <input type="url" name="facebook" placeholder="@lang('settings.facebook')" class="form-control  pl-5 min-h-40px @error($locale . '.facebook') is-invalid @enderror" value="{{ old('facebook', $data->facebook) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('settings.twitter')<span class="text-danger"> * </span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                            </div>
                            <input type="url" name="twitter" placeholder="@lang('settings.twitter')" class="form-control  pl-5 min-h-40px @error($locale . '.twitter') is-invalid @enderror" value="{{ old('twitter', $data->twitter) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('settings.instagram')<span class="text-danger"> * </span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                            </div>
                            <input type="url" name="instagram" placeholder="@lang('settings.instagram')" class="form-control  pl-5 min-h-40px @error($locale . '.instagram') is-invalid @enderror" value="{{ old('instagram', $data->instagram) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('settings.email')<span class="text-danger"> * </span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                            </div>
                            <input type="text" name="email" placeholder="@lang('settings.email')" class="form-control  pl-5 min-h-40px @error($locale . '.email') is-invalid @enderror" value="{{ old('email', $data->email) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('settings.phone')<span class="text-danger"> * </span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                            </div>
                            <input type="text" name="phone" placeholder="@lang('settings.phone')" class="form-control  pl-5 min-h-40px @error($locale . '.phone') is-invalid @enderror" value="{{ old('phone', $data->phone) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="d-block">@lang('settings.breadcrumb')</label>
                        @if (isset($data->breadcrumb))
                            <div class="image-input-wrapper" style="background-image: url({{ asset($data->breadcrumb) }}"></div>
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{ asset($data->breadcrumb) }})">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="breadcrumb" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="d-block">@lang('settings.image')</label>
                        @if (isset($data->logo))
                            <div class="image-input-wrapper" style="background-image: url({{ asset($data->logo) }}"></div>
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{ asset($data->logo) }})">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success active">@lang('general.save')</button>
            <a href="{{ route('settings.edit') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
