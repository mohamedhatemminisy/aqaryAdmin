@if ($name && $value)
    <a href="{{ route($name . '.show', $value->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.show')">
        <span class="svg-icon svg-icon-primary svg-icon-2x">
            <i class="fa fa-eye"></i>
        </span>
    </a>
    <a href="{{ route($name . '.edit', $value->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.edit')">
        <span class="svg-icon svg-icon-md svg-icon-primary">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
            <i class="fa fa-edit"></i>
            <!--end::Svg Icon-->
        </span>
    </a>


    <form id="delete-form-{{ $value->id }}" style="display: inline-table;" action="{{ route($name . '.destroy', $value->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="@lang('general.locales.delete')" data-toggle="modal" data-target="#deleteModalSizeSm-{{ $value->id }}">
            <span class="svg-icon svg-icon-md svg-icon-primary">
                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                <i class="fa fa-trash"></i>
            </span>
        </button>

        <div class="modal fade" id="deleteModalSizeSm-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalSizeSm-{{ $value->id }}" aria-hidden="true">
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
@endif
