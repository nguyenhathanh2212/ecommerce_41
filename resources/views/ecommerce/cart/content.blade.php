{{ Html::script(asset('templates/ecommerce/js/cart.js')) }}
<div class="table-responsive">
    <table class="table table-bordered cart_summary">
        <thead>
            <tr>
                <th class="cart_product">@lang('lang.product')</th>
                <th>@lang('lang.description')</th>
                <th>@lang('lang.unitPrice')</th>
                <th>@lang('lang.quanlity')</th>
                <th>@lang('lang.total')</th>
                <th  class="action"><i class="fa fa-trash-o"></i></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($carts as $cart)
                <tr>
                    <td class="cart_product">
                        <a href="{{ route('ecommerce.product.show', [$cart->id]) }}">
                            {{ Html::image(asset($cart->first_picture)) }}
                        </a>
                    </td>
                    <td class="cart_description">
                        <p class="product-name">
                            <a href="{{ route('ecommerce.product.show', [$cart->id]) }}">{{ ucwords($cart->name) }}</a>
                            <br>
                            <small>{{ $cart->preview }}</small>
                        </p>
                    </td>
                    <td class="price">
                        <span>{{ $cart->specialPrice }}</span>
                    </td>
                    <td class="qty">
                        {{ Form::number($cart->id, Session::get('carts')[$cart->id]['quanlity'], ['class' => 'form-control input-sm quanlity-product', 'id' => $cart->id]) }}
                    </td>
                    <td class="price">
                        <span>{{ number_format($cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'], 0, '.', ',') }}</span>
                    </td>
                    <td class="action">
                        <a href="" onclick="return confirm('@lang('lang.areYouSure')')" class="delete-product-cart" id="{{ $cart->id }}"><i class="icon-close"></i></a>
                    </td>
                </tr>
            @empty
                @lang('lang.cartIsEmpty')
            @endforelse
        </tbody>
        <tfoot>
            <tr>
              <td colspan="4"><strong>@lang('lang.total')</strong></td>
              <td colspan="2"><strong>{{ number_format($total, 0, '.', ',') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="cart_navigation">
    <a class="checkout-btn" href="{{ route('ecommerce.checkout.index') }}">
        <i class="fa fa-check"></i> @lang('lang.proceedToCheckout')
    </a>
</div>
