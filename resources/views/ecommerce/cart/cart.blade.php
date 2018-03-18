@if ($carts))
    @foreach ($carts as $cart)
        <li class="item odd">
            <a href="{{ route('ecommerce.product.show', [$cart->id]) }}" title="" class="product-image">
                {{ Html::image(asset($cart->first_picture), 'html template', ['width' => '65']) }}
            </a>
            <div class="product-details">
                <p class="product-name">
                    <a href="{{ route('ecommerce.product.show', [$cart->id]) }}">{{ ucwords($cart->name) }}</a>
                </p>
                <strong>{{ Session::get('carts')[$cart->id]['quanlity'] }}</strong> x
                <span class="price">{{ $cart->specialPrice }}</span>
            </div>
        </li>
    @endforeach
@endif
