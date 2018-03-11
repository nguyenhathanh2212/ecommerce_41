<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <!-- Home Tabs  -->
            <div class="col-sm-8 col-md-9 col-xs-12">
                <div class="home-tab">
                    <ul class="nav home-nav-tabs home-product-tabs">
                        <li class="active">{{ Html::link('#featured', trans('lang.featuredProducts'), ['data-toggle' => 'tab', 'aria-expanded' => 'false']) }}</li>
                        <li class="divider"></li>
                        <li>{{ Html::link('#top-sellers', trans('lang.topSellers'), ['data-toggle' => 'tab', 'aria-expanded' => 'false']) }}</li>
                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane active in" id="featured">
                            <div class="featured-pro">
                                <div class="slider-items-products">
                                    <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4">
                                            @if (count($features))
                                                @foreach ($features as $feature)
                                                    <div class="product-item">
                                                        <div class="item-inner">
                                                            <div class="product-thumbnail">
                                                                <div class="icon-sale-label sale-left">@lang('lang.sale')</div>
                                                                <div class="icon-new-label new-right">@lang('lang.new')</div>
                                                                <div class="pr-img-area">
                                                                    <a title="" href="{{ route('ecommerce.product.show', [$feature->id]) }}">
                                                                        <figure> {{ Html::image(asset($feature->pictures->first()->picture), '', ['class' => 'first-img', 'height' => '280em']) }} {{ Html::image(asset($feature->pictures->first()->picture), '', ['class' => 'hover-img', 'height' => '280em']) }}</figure>
                                                                    </a>
                                                                    <button type="button" class="add-to-cart-mt" id={{ $feature->id }}>
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                        <span> @lang('lang.addToCart')</span>
                                                                    </button>
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
                                                                        {!! Html::link(route('ecommerce.product.show', [$feature->id]), ucwords($feature->name)) !!}</div>
                                                                    <div class="item-content">
                                                                        <div class="rating">
                                                                            @for ($i = config('setting.rate_start'); $i < ceil($feature->rate); $i++)
                                                                                <i class="fa fa-star"></i>
                                                                            @endfor
                                                                            @for ($i = ceil($feature->rate); $i < config('setting.rate'); $i++)
                                                                                <i class="fa fa-star-o"></i>
                                                                            @endfor
                                                                        </div>
                                                                        <div class="item-price">
                                                                            <div class="price-box">
                                                                                @if ($feature->discount_percent)
                                                                                    <p class="special-price">
                                                                                        <span class="price">{{ $feature->specialPrice }}</span>
                                                                                    </p>
                                                                                    <p class="old-price">
                                                                                        <span class="price">{{ $feature->customPrice }}</span>
                                                                                    </p>
                                                                                @else
                                                                                    <p class="special-price">
                                                                                        <span class="price">{{ $feature->customPrice }}</span>
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
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-sellers">
                            <div class="top-sellers-pro">
                                <div class="slider-items-products">
                                    <div id="top-sellers-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 ">
                                            @if (count($topSells))
                                                @foreach ($topSells as $topSell)
                                                    <div class="product-item">
                                                        <div class="item-inner">
                                                            <div class="product-thumbnail">
                                                                <div class="icon-sale-label sale-left">@lang('lang.sale')</div>
                                                                <div class="icon-new-label new-right">@lang('lang.new')</div>
                                                                <div class="pr-img-area">
                                                                    <a title="" href="{{ route('ecommerce.product.show', [$topSell->id]) }}">
                                                                        <figure> {{ Html::image(asset($topSell->pictures->first()->picture), '', ['class' => 'first-img', 'height' => '280em']) }} {{ Html::image(asset($topSell->pictures->first()->picture), '', ['class' => 'hover-img', 'height' => '280em']) }}</figure>
                                                                    </a>
                                                                    <button type="button" class="add-to-cart-mt" id="{{ $topSell->id }}"> <i class="fa fa-shopping-cart"></i><span> @lang('lang.addToCart')</span>
                                                                    </button>
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
                                                                        {!! Html::link(route('ecommerce.product.show', [$topSell->id]),ucwords($topSell->name)) !!}
                                                                    </div>
                                                                    <div class="item-content">
                                                                        <div class="rating">
                                                                            @for ($i = config('setting.rate_start'); $i < ceil($topSell->rate); $i++)
                                                                                <i class="fa fa-star"></i>
                                                                            @endfor
                                                                            @for ($i = ceil($topSell->rate); $i < config('setting.rate'); $i++)
                                                                                <i class="fa fa-star-o"></i>
                                                                            @endfor
                                                                        </div>
                                                                        <div class="item-price">
                                                                            <div class="price-box">
                                                                                @if ($topSell->discount_percent)
                                                                                    <p class="special-price">
                                                                                        <span class="price">{{ $topSell->specialPrice }}</span>
                                                                                    </p>
                                                                                    <p class="old-price">
                                                                                        <span class="price">{{ $topSell->customPrice }}</span>
                                                                                    </p>
                                                                                @else
                                                                                    <p class="special-price">
                                                                                        <span class="price">{{ $topSell->customPrice }}</span>
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
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Hot deal -->
            <div class="col-md-3 col-sm-4 col-xs-12 hot-products">
                <div class="hot-deal"> <span class="title-text">@lang('lang.hotDeal')</span>
                    <ul class="products-grid">
                        <li class="item">
                            <div class="product-item">
                                <div class="item-inner">
                                    <div class="product-thumbnail">
                                        <div class="icon-hot-label hot-right">@lang('lang.hot')</div>
                                        <div class="pr-img-area"> <a title="" href="">
                                            <figure> {{ Html::image(asset($hotDeal->pictures->first()->picture), '', ['class' => 'first-img', 'height' => '280em']) }} {{ Html::image(asset($hotDeal->pictures->first()->picture), '', ['class' => 'hover-img', 'height' => '280em']) }}</figure></figure></a>
                                            <button type="button" class="add-to-cart-mt" id={{ $hotDeal->id }}>
                                                <i class="fa fa-shopping-cart"></i><span>@lang('lang.addToCart')</span>
                                            </button>
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
                                                {!! Html::link('', ucwords($hotDeal->name)) !!}
                                            </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    @for ($i = config('setting.rate_start'); $i < ceil($hotDeal->rate); $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($i = ceil($hotDeal->rate); $i < config('setting.rate'); $i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        @if ($hotDeal->discount_percent)
                                                            <p class="special-price">
                                                                <span class="price">{{ $hotDeal->specialPrice }}</span>
                                                            </p>
                                                            <p class="old-price">
                                                                <span class="price">{{ $hotDeal->customPrice }}</span>
                                                            </p>
                                                        @else
                                                            <p class="special-price">
                                                                <span class="price">{{ $hotDeal->customPrice }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
