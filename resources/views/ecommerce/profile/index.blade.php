@extends ('templates.ecommerce.master')

@section ('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">@lang('lang.home')</a><span>&raquo;</span>
                        </li>
                        <li><strong>@lang('lang.profile')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End --> 
    <!-- Main Container -->
    <style type="text/css">

    </style>
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>@lang('lang.myAccount')</h2>
                        </div>
                        <div class="wishlist-item table-responsive">
                            <span>&#9755; <strong>@lang('lang.accountInformation')</strong></span>
                            <br><br>
                            <div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.email'): </div>
                                <div class="col-sm-8 col-xs-12">{{ Auth::user()->email }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.name'): </div>
                                <div class="col-sm-8 col-xs-12">{{ Auth::user()->fullname }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.numberphone'): </div>
                                <div class="col-sm-8 col-xs-12">{{ Auth::user()->numberphone ? Auth::user()->numberphone : trans('lang.empty') }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.deliveryAddress'): </div>
                                <div class="col-sm-8 col-xs-12">{{ Auth::user()->delivery_address ? Auth::user()->delivery_address : trans('lang.empty') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="right sidebar col-sm-3 col-xs-12">
                    <div class="sidebar-account block">
                        <div class="sidebar-bar-title">
                            <h3>@lang('lang.myAccount')</h3>
                        </div>
                        <div class="block-content">
                            <ul>
                                <li><a>@lang('lang.accountInformation')</a></li>
                                <li><a href="{{ route('ecommerce.profile.order') }}">@lang('lang.listOrder')</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- Footer -->
@endsection
