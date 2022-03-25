<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                @yield('subheader')
            </div>
            <!--end::Page Heading-->
        </div>
        <div class="topbar">
            <!--begin::Languages-->
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 p-3" style="width: auto">
                        @if (app()->getLocale() == 'ar')
                            <img class="h-20px w-20px pr-2 rounded-sm" src="{{ asset('admin/assets/media/svg/flags/ar.svg') }}" alt="">
                        @else
                            <img class="h-20px w-20px pr-2 rounded-sm" src="{{ asset('admin/assets/media/svg/flags/en.svg') }}" alt="">
                        @endif
                        <span class="font-weight-bolder text-uppercase">
                            {{ app()->getLocale() }}
                        </span>
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <ul class="navi navi-hover py-4">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img class="h-20px w-20px pr-2 rounded-sm" src="{{ asset('admin/assets/media/svg/flags/' . $localeCode . '.svg') }}" alt="{{ $localeCode }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--end::Languages-->

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"></span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3 text-capitalize">{{ auth()->user()->name }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold text-uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
    </div>
</div>
