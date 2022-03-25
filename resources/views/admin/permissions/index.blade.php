@extends('admin.components.index')
@section('module_name') @lang('permissions.permissions') @endsection
@section('page_type') @lang('general.index') @endsection
@section('title') @lang('permissions.permissions') @endsection
@section('create_route', route('permissions.create'))

@section('page_content')
    <table class="table table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th>@lang('general.title')</th>
                <th scope="col">@lang('general.guard')</th>
                <th>@lang('general.created_at')</th>
                <th width="10%" colspan="3">@lang('general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td class="text-capitalize">{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm">@lang('general.edit')</a>
                        <form id="delete-form-{{ $permission->id }}" style="display: inline-table;" action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm" title="@lang('general.locales.delete')" data-toggle="modal" data-target="#deleteModalSizeSm-{{ $permission->id }}">@lang('general.delete')</button>
                            <div class="modal fade" id="deleteModalSizeSm-{{ $permission->id }}" tabindex="-1" permission="dialog" aria-labelledby="deleteModalSizeSm-{{ $permission->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" permission="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">@lang('general.translation.sure')</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">@lang('general.translation.revert')</p>
                                        </div>
                                        <div class="modal-footer flex-start">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.translation.cancel')</button>
                                            <button type="submit" class="btn btn-primary">@lang('general.translation.delete')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
