@extends('admin.components.form')
@section('module_name', trans('contact.contact'))
@section('index_route', route('contact.index'))
@section('store_route', route('contact.contact-reply'))
@section('form_type', 'POST')
@section('title') @lang('contact.contact') @endsection

@section('fields_content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.add_new')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group">
                    <label>@lang('contact.subject')<span class="text-danger"> * </span></label>
                    <input type="text" name="subject" placeholder="@lang('contact.subject')" class="form-control @error('subject') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <label>@lang('contact.message')<span class="text-danger"> * </span></label>
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" type="text" name="{{ 'message' }}" rows="4" id="ckeditor5"></textarea>
                </div>

                <input type="hidden" name="contact_id" value="{{ $data->id }}">
            </div>
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-light-success active">
                @lang('general.send')
            </button>
        </div>
    </div>
@endsection
