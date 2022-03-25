@extends('admin.components.index')
@section('module_name') @lang('roles.roles') @endsection
@section('page_type') @lang('general.index') @endsection
@section('title') @lang('roles.roles') @endsection
@section('create_route', route('roles.create'))

@section('page_content')
    <table class="table  table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th width="2%">#</th>
                <th>@lang('general.title')</th>
                <th>@lang('general.created_at')</th>
                <th width="10%" colspan="3">@lang('general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="sorting_1" nowrap="nowrap">
                        <span class="label-inline">{{ $role->created_at }}</span>
                    </td>
                    <td nowrap="nowrap">
                        <a class="btn btn-warning btn-sm" href="{{ route('roles.show', $role->id) }}">@lang('general.show')</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">@lang('general.edit')</a>
                        <form id="delete-form-{{ $role->id }}" style="display: inline-table;" action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm" title="@lang('general.locales.delete')" data-toggle="modal" data-target="#deleteModalSizeSm-{{ $role->id }}">@lang('general.delete')</button>
                            <div class="modal fade" id="deleteModalSizeSm-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalSizeSm-{{ $role->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
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
    <div class="d-flex">
        {!! $roles->links() !!}
    </div>
@endsection
