<div class="col-main">
    <div class="product-view-area">
        <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <div class="flexslider thumbnails">
                <ul class="slides">
                    @if (count($product->pictures))
                        @foreach ($product->pictures as $picture)
                            <li data-thumb="{{ asset($picture->picture) }}">
                                {{ Html::image(asset($picture->picture), '', ['width' => '300m', 'height' => '300em']) }}
                            </li>
                        @endforeach
                    @else
                        <li data-thumb="{{ asset($product->first_picture) }}">
                            {{ Html::image(asset($product->first_picture), '', ['width' => '300m', 'height' => '300em']) }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
            <div class="product-name">
              <h1>{{ ucwords($product->name) }}</h1>
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
                    <a href="#tab-rv">{{ count($product->users) }} @lang('lang.reviews')</a>
                    <span class="separator">|</span>
                    <a href="#tab-rv">@lang('lang.addYourReview')</a>
                    <span class="separator">|</span>
                    <span>@lang('lang.hasSold') : {{ $product->quanlity }}</span>
                </p>
                <p class="availability in-stock pull-right">
                    @lang('lang.availability')<span>@lang('lang.inStock')</span>
                </p>
            </div>
            <div class="short-description">
                <h2>@lang('lang.quickOverview')</h2>
                <p>{{ $product->preview }}</p>
            </div>
            <div class="product-variation">
                {{ Form::open(['name' => 'add-cart', 'class' => 'add-cart-detail-product', 'id' => $product->id]) }}
                    <div class="product-color-size-area">
                    </div>
                    <div class="cart-plus-minus">
                        {{ Form::label('qty', trans('lang.quantity') . ':') }}
                        <div class="numbers-row">
                            <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton">
                                <i class="fa fa-minus">&nbsp;</i>
                            </div>
                            {{ Form::number('qty', '1', ['class' => 'qty qty-product', 'maxlength' => '12', 'id' => 'qty']) }}
                            <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton">
                                <i class="fa fa-plus">&nbsp;</i>
                            </div>
                        </div>
                    </div>
                    {{ Form::button('<span><i class="fa fa-shopping-cart"></i>' . trans('lang.addToCart'). '</span>', ['type' => 'submit', 'class' => 'button pro-add-to-cart btn-add-cart-detail']) }}
                {{ Form::close() }}
            </div>
            <div class="product-cart-option">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-heart"></i><span>@lang('lang.addToWishlist')</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-retweet"></i><span>@lang('lang.addToCompare')</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
