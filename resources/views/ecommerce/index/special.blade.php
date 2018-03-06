<div class="container">
    <div class="special-products">
        <div class="page-header">
            <h2>@lang('lang.specialProducts')</h2>
        </div>
        <div class="special-products-pro">
            <div class="slider-items-products">
              <div id="special-products-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                    @if (count($specialProducts))
                        @foreach ($specialProducts as $specialProduct)
                            <div class="product-item">
                                <div class="item-inner">
                                    <div class="product-thumbnail">
                                        <div class="icon-sale-label sale-left">@lang('lang.sale')</div>
                                            <div class="icon-new-label new-right">@lang('lang.new')</div>
                                            <div class="pr-img-area"> <a title="" href="">
                                                <figure> {{ Html::image(asset($specialProduct->pictures->first()->picture), '', ['class' => 'first-img', 'height' => '280em']) }} {{ Html::image(asset($specialProduct->pictures->first()->picture), '', ['class' => 'hover-img', 'height' => '280em']) }}</figure>
                                            </a>
                                            <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> @lang('lang.addToCart')</span> </button>
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
                                                {!! Html::link('', ucwords($specialProduct->name)) !!}</div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    @for ($i = config('setting.rate_start'); $i < ceil($specialProduct->rate); $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($i = ceil($specialProduct->rate); $i < config('setting.rate'); $i++)
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                                <div class="item-price">
                                                <div class="price-box">     <span class="regular-price"> <span class="price">{{ number_format($specialProduct->options->first()->pivot->price, 0, '.', ',') }}</span> </span> </div>
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
