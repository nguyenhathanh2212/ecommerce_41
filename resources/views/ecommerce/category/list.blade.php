{{ Html::script(asset('templates/ecommerce/js/cart.js')) }}
<div class="product-list-area">
    <ul class="products-list" id="products-list">
        @if (count($products))
            @foreach ($products as $product)
                <li class="item ">
                    <div class="product-img">
                        @if ($product->discount_percent)
                            <div class="icon-sale-label sale-left">@lang('lang.sale')
                            </div>
                        @endif
                        <div class="icon-new-label new-right">@lang('lang.new')</div>
                        <a href="{{ route('ecommerce.product.show', [$product->id]) }}">
                            <figure>
                                {{ Html::image(asset($product->first_picture), '', ['class' => 'small-image', 'height' => '240em']) }}
                            </figure>
                        </a>
                    </div>
                    <div class="product-shop">
                        <h2 class="product-name"><a href="{{ route('ecommerce.product.show', [$product->id]) }}">{{ ucwords($product->name) }}</a></h2>
                        <div class="ratings">
                            <div class="rating">
                                @for ($i = config('setting.rate_start'); $i < ceil($product->rate); $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                @for ($i = ceil($product->rate); $i < config('setting.rate'); $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <p class="rating-links">
                                <span>{{ count($product->users) }} @lang('lang.reviews')</span>
                            </p>
                        </div>
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
                        <div class="desc std">
                            <p>{{ $product->preview }}</p>
                        </div>
                        <div class="actions">
                            <button type="button" class="button cart-button add-to-card" id="{{ $product->id }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span> @lang('lang.addToCart')</span>
                            </button>
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
