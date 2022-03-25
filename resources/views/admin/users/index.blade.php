@extends('admin.components.index')
@section('module_name') @lang('users.users') @endsection
@section('page_type') @lang('general.index') @endsection
@section('title') @lang('users.users') @endsection
@section('create_route', route('users.create'))

@section('page_content')
    <table class="table  table-separate table-head-custom table-checkable">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="15%">@lang('general.name')</th>
                <th width="10%">@lang('general.image')</th>
                <th width="15%">@lang('general.roles')</th>
                <th>@lang('general.email')</th>
                <th width="20%">@lang('general.username')</th>
                <th width="18%" colspan="3">@lang('general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <div class="symbol symbol-70 flex-shrink-0">
                            @if (isset($user->image))
                                <img src="{{ asset($user->image) }}" alt="photo">
                            @else
                                <img src="{{ asset('admin') }}/assets/media/users/blank.png" alt="photo">
                            @endif
                        </div>
                    </td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="label label-lg label-light-success label-inline">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">@lang('general.show')</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">@lang('general.edit')</a>
                        <form id="delete-form-{{ $user->id }}" style="display: inline-table;" action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm" title="@lang('general.locales.delete')" data-toggle="modal" data-target="#deleteModalSizeSm-{{ $user->id }}">@lang('general.delete')</button>
                            <div class="modal fade" id="deleteModalSizeSm-{{ $user->id }}" tabindex="-1" user="dialog" aria-labelledby="deleteModalSizeSm-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" user="document">
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

    </div>
@endsection
