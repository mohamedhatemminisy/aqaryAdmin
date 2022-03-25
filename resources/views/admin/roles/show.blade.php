@extends('admin.components.form')
@section('module_name', trans('roles.roles'))
@section('page_type', trans('general.show'))
@section('title') @lang('roles.roles') @endsection
@section('index_route', route('roles.index'))

@section('fields_content')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales.show') {{ ucfirst($role->name) }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th scope="col" width="20%">@lang('roles.title')</th>
                        <th scope="col" width="5%">@lang('roles.guard')</th>
                    </thead>
                    <tbody>
                        @foreach ($rolePermissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-footer">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-light-success active">@lang('general.edit')</a>
            <a href="{{ route('roles.index') }}" class="btn btn-light-success font-weight-bold">@lang('general.cancel')</a>
        </div>
    </div>
@endsection
