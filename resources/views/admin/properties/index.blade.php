@extends('admin.components.index')
@section('module_name') @lang('properties.properties') @endsection
@section('page_type') @lang('general.index') @endsection
@section('title') @lang('properties.properties') @endsection
@section('create_route', route('properties.create'))

@section('page_content')
    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('general.title')</th>
                <th>@lang('general.created_at')</th>
                <th>@lang('general.control')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td class="dtr-control">{{ $key + 1 }}</td>
                    <td>{{ $value->title }}</td>
                    <td class="sorting_1" nowrap="nowrap">
                        <span class="label-inline">{{ $value->created_at }}</span>
                    </td>
                    <td nowrap="nowrap">
                        @include('admin.components.table-control', ['name'=>'properties', 'value'=>$value])


                        <a href="{{ route( 'properties.plans', $value->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.plans')">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                <i class="fa fa-plane"></i>
                                <!--end::Svg Icon-->
                            </span>
                        </a>

                        <a href="{{ route( 'properties.feature', $value->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.feature')">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                <i class="fa fa-audio-description"></i>
                                <!--end::Svg Icon-->
                            </span>
                        </a>
                        <a href="{{ route( 'properties.detail', $value->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.detail')">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                <i class="fa fa-solid fa-info"></i>
                                        <!--end::Svg Icon-->
                            </span>
                        </a>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
