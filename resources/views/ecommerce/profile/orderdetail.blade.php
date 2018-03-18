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
                        <li><strong>@lang('lang.orderDetail')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End --> 
    <!-- Main Container -->
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12">
                    <div class="my-account detail-order">
                        <div class="page-title">
                            <h2>@lang('lang.myAccount')</h2>
                        </div>
                        <div class="wishlist-item table-responsive">
                            <span>&#9755; <strong>@lang('lang.orderDetail')</strong></span>
                            <br>
                            <div class="order-details__section-wrapper">
                                <div class="order-details__state js-shipping-state-container">
                                    <div class="order-details__progress">
                                        <div class="order-details__progress-bar">
                                            <div class="order-details__progress-bar-item {{ $order->status >= config('setting.processing') ? 'is-active' : '' }}"></div>
                                            <div class="order-details__progress-bar-item {{ $order->status >= config('setting.delivering') ? 'is-active' : '' }}"></div>
                                            <div class="order-details__progress-bar-item {{ $order->status >= config('setting.closed') ? 'is-active' : '' }}"></div>
                                        </div>
                                        <div class="order-details__progress-states">
                                            <div class="order-details__progress-state {{ $order->status >= config('setting.processing') ? 'is-active' : '' }}">
                                                <div class="order-details__progress-state__name {{ $order->status >= config('setting.processing') ? 'is-active' : '' }}">
                                                    @lang('lang.processing')                                
                                                </div>
                                            </div>
                                            <div class="order-details__progress-state {{ $order->status >= config('setting.delivering') ? 'is-active' : '' }}">
                                                <div class="order-details__progress-state__name {{ $order->status >= config('setting.delivering') ? 'is-active' : '' }}">
                                                    @lang('lang.delivering')
                                                </div>
                                            </div>
                                            <div class="order-details__progress-state {{ $order->status >= config('setting.closed') ? 'is-active' : '' }}">
                                                <div class="order-details__progress-state__name {{ $order->status >= config('setting.closed') ? 'is-active' : '' }}">
                                                    @lang('lang.closed')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-details__products-container">
                                    <table class="order-details__product-table">
                                        <tbody>
                                            @foreach ($order->products as $product)
                                                <tr class="order-details__product-row">
                                                    <td class="order-details__product-cell-img">
                                                        <a href="{{ route('ecommerce.product.show', [$product->id]) }}">
                                                            {{ Html::image(asset($product->first_picture), '', ['height' => '75px']) }}
                                                        </a>
                                                    </td>
                                                    <td class="order-details__product-cell-details">
                                                        <a class="order-details__product-title" href="{{ route('ecommerce.product.show', [$product->id]) }}">
                                                            {{ ucwords($product->name) }}
                                                        </a>
                                                    </td>
                                                    <td class="order-details__product-cell-price">
                                                        {{ $product->specialPrice }}
                                                    </td>
                                                    <td class="order-details__product-cell-quantity">
                                                        <span>×</span>
                                                        <span class="order-details__product-quantity__value">
                                                            {{ $product->pivot->quantity }}
                                                        </span>
                                                    </td>
                                                    <td class="order-details__product-cell-actions">
                                                        <div class="order-details__product-actions">
                                                            <div class="order-details__product-action-wrapper">
                                                                <a href="{{ route('ecommerce.product.show', [$product->id]) }}">@lang('lang.review')</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                        <div class="wishlist-item table-responsive">
                            <span>&#9755; <strong>@lang('lang.orderInformation')</strong></span>
                            <br>
                            <div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.name'): </div>
                                <div class="col-sm-8 col-xs-12">{{ ucwords($order->fullname) }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.numberphone'): </div>
                                <div class="col-sm-8 col-xs-12">{{ $order->numberphone }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.deliveryAddress'): </div>
                                <div class="col-sm-8 col-xs-12">{{ $order->delivery_address }}</div>
                                <div class="col-sm-4 col-xs-12">&#x261E; @lang('lang.paymentMethod'): </div>
                                <div class="col-sm-8 col-xs-12">{{ $order->delivery_method }}</div>
                            </div>
                        </div>
                                </div>
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
                                <li><a href="{{ route('ecommerce.profile.index') }}">@lang('lang.accountInformation')</a></li>
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
