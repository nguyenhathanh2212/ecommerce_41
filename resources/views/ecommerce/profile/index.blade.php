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
                    @if (count($histories))
                        <div class="special-products">
                            <div class="page-header">
                                <h2>@lang('lang.recent')</h2>
                            </div>
                            <div class="special-products-pro">
                                <div class="slider-items-products">
                                  <div id="special-products-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4">
                                        @foreach ($histories as $history)
                                            <div class="product-item">
                                                <div class="item-inner">
                                                    <div class="product-thumbnail">
                                                        <div class="icon-sale-label sale-left">@lang('lang.sale')</div>
                                                            <div class="icon-new-label new-right">@lang('lang.new')</div>
                                                            <div class="pr-img-area"> <a title="" href="{{ route('ecommerce.product.show', [$history->id]) }}">
                                                                <figure> {{ Html::image(asset($history->first_picture), '', ['class' => 'first-img', 'height' => '200']) }} {{ Html::image(asset($history->first_picture), '', ['class' => 'hover-img', 'height' => '200']) }}</figure>
                                                            </a>
                                                            <button type="button" class="add-to-cart-mt" id="{{ $history->id }}"> <i class="fa fa-shopping-cart"></i><span> @lang('lang.addToCart')</span> </button>
                                                        </div>
                                                        <div class="pr-info-area">
                                                            <div class="pr-button">
                                                                <div class="mt-button add_to_wishlist">
                                                                    {!! html_entity_decode(Html::link('', '<i class="fa fa-heart"></i>')) !!}
                                                                </div>
                                                                <div class="mt-button add_to_compare">
                                                                    {!! html_entity_decode(Html::link('', '<i class="fa fa-signal"></i>')) !!}
                                                                </div>
                                                                <div class="mt-button quick-view">
                                                                    {!! html_entity_decode(Html::link('', '<i class="fa fa-search"></i>')) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                {!! Html::link(route('ecommerce.product.show', [$history->id]), ucwords($history->name)) !!}</div>
                                                            <div class="item-content">
                                                                <div class="rating">
                                                                    @for ($i = config('setting.rate_start'); $i < ceil($history->rate); $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                    @for ($i = ceil($history->rate); $i < config('setting.rate'); $i++)
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endfor
                                                                </div>
                                                                <div class="item-price">
                                                                    <div class="price-box">
                                                                        @if ($history->discount_percent)
                                                                            <p class="special-price">
                                                                                <span class="price">{{ $history->specialPrice }}</span>
                                                                            </p>
                                                                            <p class="old-price">
                                                                                <span class="price">{{ $history->customPrice }}</span>
                                                                            </p>
                                                                        @else
                                                                            <p class="special-price">
                                                                                <span class="price">{{ $history->customPrice }}</span>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
@endsection
