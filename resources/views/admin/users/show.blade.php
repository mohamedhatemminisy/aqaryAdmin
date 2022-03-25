@extends('admin.components.form')
@section('module_name', trans('users.users'))
@section('page_type', trans('general.show'))
@section('title') @lang('users.users') @endsection
@section('index_route', route('users.index'))

@section('fields_content')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.show')</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th scope="col" width="20%">@lang('general.name')</th>
                        <th scope="col" width="5%">@lang('general.email')</th>
                        <th scope="col" width="5%">@lang('general.username')</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-footer">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-light-success active">@lang('general.edit')</a>
            <a href="{{ route('users.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
