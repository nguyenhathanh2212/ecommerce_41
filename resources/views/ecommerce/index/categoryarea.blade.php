<div class="jtv-category-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="jtv-single-cat">
                    <h2 class="cat-title">@lang('lang.topRated')</h2>
                    @if (count($topRates))
                        @foreach ($topRates as $topRate)
                            <div class="jtv-product jtv-cat-margin">
                                <div class="product-img">
                                    {!! html_entity_decode(Html::link(route('ecommerce.product.show', [$topRate->id]), Html::image($topRate->first_picture), '', ['class' => 'secondary-img'])) !!}
                                </div>
                                <div class="jtv-product-content">
                                    <h3>{{ Html::link(route('ecommerce.product.show', [$topRate->id]), ucwords($topRate->name)) }}</h3>
                                    <div class="price-box">
                                        @if ($topRate->discount_percent)
                                            <p class="special-price">
                                                <span class="price">{{ $topRate->specialPrice }}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price">{{ $topRate->customPrice }}</span>
                                            </p>
                                        @else
                                            <p class="special-price">
                                                <span class="price">{{ $topRate->customPrice }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="jtv-product-action">
                                        <div class="jtv-extra-link">
                                            <div class="button-cart">
                                                <button class="add-to-card" id="{{ $topRate->id }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </div>
                                            {!! html_entity_decode(Html::link('', '<i class="fa fa-search"></i>', ['data-toggle' => 'modal', 'data-target' => '#productModal'])) !!}
                                            {!! html_entity_decode(Html::link('', '<i class="fa fa-heart"></i>')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="jtv-single-cat">
                    <h2 class="cat-title">@lang('lang.onSale')</h2>
                    @if (count($onSales))
                        @foreach ($onSales as $onSale)
                            <div class="jtv-product jtv-cat-margin">
                                <div class="product-img">
                                    {!! html_entity_decode(Html::link(route('ecommerce.product.show', [$onSale->id]), Html::image($onSale->first_picture), '', ['class' => 'secondary-img'])) !!}
                                </div>
                                <div class="jtv-product-content">
                                    <h3>{{ Html::link(route('ecommerce.product.show', [$onSale->id]), ucwords($onSale->name)) }}</h3>
                                    <div class="price-box">
                                        @if ($onSale->discount_percent)
                                            <p class="special-price">
                                                <span class="price">{{ $onSale->specialPrice }}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price">{{ $onSale->customPrice }}</span>
                                            </p>
                                        @else
                                            <p class="special-price">
                                                <span class="price">{{ $onSale->customPrice }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="jtv-product-action">
                                        <div class="jtv-extra-link">
                                            <div class="button-cart">
                                                <button class="add-to-card" id="{{ $onSale->id }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </div>
                                            {!! html_entity_decode(Html::link('', '<i class="fa fa-search"></i>', ['data-toggle' => 'modal', 'data-target' => '#productModal'])) !!}
                                            {!! html_entity_decode(Html::link('', '<i class="fa fa-heart"></i>')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                 </div>
            </div>
            
            <!-- service area start -->
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="jtv-service-area">
                    <!-- jtv-single-service start -->
                    <div class="jtv-single-service">
                        <div class="service-icon">
                            {{ Html::image(asset('templates/ecommerce/images/customer-service-icon.png')) }}
                        </div>
                        <div class="service-text">
                            <h2>@lang('lang.service')</h2>
                            <p><span>@lang('lang.phone')</span></p>
                        </div>
                    </div>
                    <div class="jtv-single-service">
                        <div class="service-icon">
                            {{ Html::image(asset('templates/ecommerce/images/shipping-icon.png')) }}
                        </div>
                        <div class="service-text">
                            <h2>@lang('lang.ship')</h2>
                            <p><span>@lang('lang.shipCondition')</span></p>
                        </div>
                    </div>
                    <div class="jtv-single-service">
                        <div class="service-icon">
                            {{ Html::image(asset('templates/ecommerce/images/guaratee-icon.png')) }}
                        </div>
                        <div class="service-text">
                            <h2>@lang('lang.money')</h2>
                            <p><span>@lang('lang.moneyCondition')</span></p>
                        </div>
                    </div>
                <!-- jtv-single-service end -->
                </div>
            </div>
        </div>
    </div>
</div>
