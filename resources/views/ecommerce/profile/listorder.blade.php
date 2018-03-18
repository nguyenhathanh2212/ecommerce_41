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
                        <li><strong>@lang('lang.listOrder')</strong></li>
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
                    <div class="my-account">
                        <div class="page-title">
                            <h2>@lang('lang.myAccount')</h2>
                        </div>
                        <div class="wishlist-item table-responsive">
                            <span>&#9755; <strong>@lang('lang.listOrder')</strong></span>
                            <br>
                            <br>
                            @if (count($orders))
                                @foreach ($orders as $order)
                                    <div class="orders-page js-my-orders">
                                        <div class="order-teaser">
                                            <div class="order-teaser__header">
                                                <div>
                                                    <span class="order-teaser__subtitle">
                                                        @lang('lang.orderDate') : {{ $order->created_at }}
                                                    </span>
                                                    <span class="order-product-teaser__status">{{ $order->status_custom }}</span>
                                                </div>
                                                <div>
                                                    <a class="order-teaser__link" href="{{ route('ecommerce.profile.orderdetail', [$order->id]) }}">@lang('lang.orderManagement')</a>
                                                </div>
                                            </div>
                                            <div class="order-teaser__body">
                                                <div class="order-teaser__rows">
                                                    @foreach ($order->products as $product)
                                                        <div class="order-teaser__product">
                                                            <div class="order-product-teaser">
                                                                <a class="order-product-teaser__img" href="{{ route('ecommerce.profile.orderdetail', [$order->id]) }}">
                                                                    {{ Html::image(asset($product->first_picture)) }}    
                                                                </a>
                                                                <div class="order-product-teaser__body">
                                                                    <a class="order-product-teaser__title" href="{{ route('ecommerce.profile.orderdetail', [$order->id]) }}">{{ ucwords($product->name) }}</a>
                                                                    <span>{{ str_limit($product->preview, 30) }}</span>
                                                                </div>
                                                            </div>                    
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $orders->links() }}
                            @endif
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
                                <li><a>@lang('lang.listOrder')</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- Footer -->
@endsection
