<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="related-product-area">       
                <div class="page-header">
                    <h2>@lang('lang.relatedProducts')</h2>
                </div>
                <div class="related-products-pro">
                    <div class="slider-items-products">
                        <div id="related-product-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4 fadeInUp">
                                @if (count($relatedProducts))
                                    @foreach ($relatedProducts as $relatedProduct)
                                        <div class="product-item">
                                            <div class="item-inner fadeInUp">
                                                <div class="product-thumbnail">
                                                    <div class="icon-sale-label sale-left">@lang('lang.sale')</div>
                                                    <div class="icon-new-label new-right">@lang('lang.new')</div>
                                                    <div class="pr-img-area">
                                                        <a href="{{ route('ecommerce.product.show', [$relatedProduct->id]) }}">
                                                            {{ Html::image(asset($relatedProduct->first_picture), '', ['class' => 'first-img', 'height' => '280em']) }}
                                                            {{ Html::image(asset($relatedProduct->first_picture), '', ['class' => 'hover-img', 'height' => '280em']) }}
                                                        </a>
                                                        <button type="button" class="add-to-cart-mt">   <i class="fa fa-shopping-cart"></i>
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
                                                            {!! Html::link(route('ecommerce.product.show', [$relatedProduct->id]), ucwords($relatedProduct->name)) !!}
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="rating">
                                                                @for ($i = config('setting.rate_start'); $i < ceil($relatedProduct->rate); $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                                @for ($i = ceil($relatedProduct->rate); $i < config('setting.rate'); $i++)
                                                                    <i class="fa fa-star-o"></i>
                                                                @endfor
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    @if ($relatedProduct->discount_percent)
                                                                        <p class="special-price">
                                                                            <span class="price">{{ $relatedProduct->specialPrice }}</span>
                                                                        </p>
                                                                        <p class="old-price">
                                                                            <span class="price">{{ $relatedProduct->customPrice }}</span>
                                                                        </p>
                                                                    @else
                                                                        <p class="special-price">
                                                                            <span class="price">{{ $relatedProduct->customPrice }}</span>
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
