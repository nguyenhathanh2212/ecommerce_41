{{ Html::script(asset('templates/ecommerce/js/cart.js')) }}
<div class="product-grid-area">
    <ul class="products-grid">
        @if (count($products))
            @foreach ($products as $product)
                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                    <div class="product-item">
                        <div class="item-inner">
                            <div class="product-thumbnail">
                                @if ($product->discount_percent)
                                    <div class="icon-sale-label sale-left">@lang('lang.sale')
                                    </div>
                                @endif
                                <div class="icon-new-label new-right">@lang('lang.new')</div>
                                <div class="pr-img-area">
                                    <a href="{{ route('ecommerce.product.show', [$product->id]) }}">
                                        {{ Html::image(asset($product->first_picture), '', ['class' => 'first-img', 'height' => '280em']) }}
                                        {{ Html::image(asset($product->first_picture), '', ['class' => 'hover-img', 'height' => '280em']) }}
                                    </a>
                                    <button type="button" class="add-to-cart-mt" id="{{ $product->id }}">
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
                                        {!! Html::link(route('ecommerce.product.show', [$product->id]), ucwords($product->name)) !!}
                                    </div>
                                    <div class="rating">
                                        @for ($i = config('setting.rate_start'); $i < ceil($product->rate); $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        @for ($i = ceil($product->rate); $i < config('setting.rate'); $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor
                                    </div>
                                    <div class="item-price">
                                        <div class="price-box">
                                            @if ($product->discount_percent)
                                                <p class="special-price">
                                                    <span class="price">{{ $product->specialPrice }}</span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price">{{ $product->customPrice }}</span>
                                                </p>
                                            @else
                                                <p class="special-price">
                                                    <span class="price">{{ $product->customPrice }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>
<div class="pagination-area ">
    {{ $products->links() }}
</div>
