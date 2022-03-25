@extends('admin.components.form')
@section('module_name', trans('properties.properties'))
@section('page_type', trans('general.show'))
@section('title') @lang('properties.properties') @endsection

@section('fields_content')
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.show')</h3>
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
        <div class="card-body p-10">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                        role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">@lang('properties.title'):</h5>
                                    </div>
                                    <p class="m-0">{{ $data->translate($locale)->title }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">@lang('properties.address'):</h5>
                                    </div>
                                    <p class="m-0">{{ $data->translate($locale)->address }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">@lang('properties.description'):</h5>
                                    </div>
                                    <p class="m-0">{!! $data->translate($locale)->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-body p-10">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">@lang('properties.category_name'):</h5>
                            </div>
                            <p class="m-0">{{ $data->catrgory->title }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">@lang('properties.price'):</h5>
                            </div>
                            <p class="m-0">{{ $data->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-10">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">@lang('properties.email'):</h5>
                            </div>
                            <p class="m-0">{{ $data->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">@lang('properties.phone'):</h5>
                            </div>
                            <p class="m-0">{{ $data->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="location">
                <label class="col-form-label">@lang('properties.location')</label>
                <iframe src="{!! $data->location !!}" width="100%" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <div class="single-property-video">
                <div class="subtitle">
                    <label class="col-form-label">@lang('properties.video')</label>
                </div>
                <div class="video">
                    <div class="ratio ratio-16x9">
                        <iframe src="{{$data->video}}" title="YouTube video"
                            allowfullscreen=""></iframe>
                    </div>
                    <!-- في حالة لو الفيديو مرفوع سيرفر مش يوتيوب-->
                </div>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            @if ($data->images !== null)
                                <label class="col-form-label d-block">@lang('properties.image_multiple')</label>
                                <br>
                                @foreach ($data->images as $image)
                                    <img style="margin-bottom: 1.25rem !important;" src="{{ asset($image->image) }}"
                                        class="w-100"><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            @if ($data->main_image !== null)
                                <label class="col-form-label d-block">@lang('properties.image')</label>
                                <br>
                                <img src="{{ asset($data->main_image) }}" class="w-100">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
