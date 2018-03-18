<aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
    <div class="block shop-by-side">
        <div class="sidebar-bar-title">
            <h3>@lang('lang.shopBy')</h3>
        </div>
        <div class="block-content">
            <p class="block-subtitle">@lang('lang.shoppingOptions')</p>
            <div class="layered-Category">
                <h2 class="saider-bar-title">@lang('lang.categories')</h2>
                <div class="layered-content">
                    <ul class="check-box-list">
                        @foreach ($parentCategories as $category)
                            <li>
                                <a href="{{ route('ecommerce.category.show', [$category->id]) }}">
                                    <span class="button"></span> {{ ucwords($category->name) }}<span class="count"> ({{ $category->numberOfProduct }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="block product-price-range ">
        <div class="sidebar-bar-title">
            <h3>@lang('lang.price')</h3>
        </div>
        <div class="block-content">
            <div class="slider-range">
                <div data-label-reasult="" data-min="0" data-max="20" data-unit="" class="slider-range-price" data-value-min="0" data-value-max="20"></div>
                <br>
                <span>@lang('lang.rangeLable')</span>
                <span class="amount-range-price">@lang('lang.range')</span>
                <span>@lang('lang.vnd')</span>
                {{ Form::button(trans('lang.filter'), ['class' => 'button filter-price']) }}
            </div>
        </div>
    </div>
    @if (count($specialProducts))
        <div class="block special-product">
            <div class="sidebar-bar-title">
                <h3>@lang('lang.specialProducts')</h3>
            </div>
            <div class="block-content">
                <ul>
                    @foreach ($specialProducts as $specialProduct)
                        <li class="item">
                            <div class="products-block-left">
                                <a href="{{ route('ecommerce.product.show', [$specialProduct->id]) }}" title="Sample Product" class="product-image">
                                    {{ Html::image(asset($specialProduct->first_picture)) }}
                                </a>
                            </div>
                            <div class="products-block-right">
                                <p class="product-name">
                                    <a href="{{ route('ecommerce.product.show', [$specialProduct->id]) }}">{{ ucwords($specialProduct->name) }}</a>
                                </p>
                                @if ($specialProduct->discount_percent)
                                    <span class="price">{{ $specialProduct->specialPrice }}</span>
                                @else
                                    <span class="price">{{ $specialProduct->customPrice }}</span>
                                @endif
                                <div class="rating">
                                    @for ($i = config('setting.rate_start'); $i < ceil($specialProduct->rate); $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = ceil($specialProduct->rate); $i < config('setting.rate'); $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</aside>
