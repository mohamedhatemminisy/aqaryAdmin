@extends('admin.components.index')
@section('module_name') @lang('recipes.recipes') @endsection
@section('page_type') @lang('general.index') @endsection
@section('title') @lang('recipes.recipes') @endsection
@section('create_route', route('recipes.create'))

@section('page_content')
    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('general.title')</th>
                <th>@lang('general.image')</th>
                <th nowrap="nowrap">@lang('general.category_name')</th>
                <th nowrap="nowrap">@lang('general.kitchen_type')</th>
                <th nowrap="nowrap">@lang('general.is_slider')</th>
                <th>@lang('general.created_at')</th>
                <th>@lang('general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td class="dtr-control">{{ $key + 1 }}</td>
                    <td>
                        <p style="max-width: 350px">{{ $value->title }}</p>
                    </td>
                    <td>
                        <div class="symbol symbol-70 flex-shrink-0">
                            <img src="{{ asset($value->image) }}" alt="photo">
                        </div>
                    </td>
                    <td>{{ $value->category->title }}</td>
                    <td>{{ $value->kitchen->title }}</td>
                    <td>{{ $value->is_slider }}</td>
                    <td class="sorting_1" nowrap="nowrap">
                        <span class="label-inline">{{ $value->created_at }}</span>
                    </td>
                    <td nowrap="nowrap">
                        @include('admin.components.table-control', ['name'=>'recipes', 'value'=>$value])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
