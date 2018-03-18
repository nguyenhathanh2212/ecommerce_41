@extends ('templates.admin.master')

@section ('content')
    <div class="content-order">
        <div class="row form-group">
            <div class="col-md-3 col-md-offset-1">
                <strong>@lang('lang.orderer'):</strong>
            </div>
            <div class="col-md-8">
                <strong>{{ ucwords($order->fullname) }}</strong>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3 col-md-offset-1">
                <strong>@lang('lang.numberphone'):</strong>
            </div>
            <div class="col-md-8">
                <strong>{{ ucwords($order->numberphone) }}</strong>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3 col-md-offset-1">
                <strong>@lang('lang.deliveryAddress'):</strong>
            </div>
            <div class="col-md-8">
                <strong>{{ ucwords($order->delivery_address) }}</strong>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3 col-md-offset-1">
                <strong>@lang('lang.paymentMethod'):</strong>
            </div>
            <div class="col-md-8">
                <strong>{{ ucwords($order->delivery_method) }}</strong>
            </div>
        </div><div class="row form-group">
            <div class="col-md-3 col-md-offset-1">
                <strong>@lang('lang.status'):</strong>
            </div>
            <div class="col-md-8">
                @switch($order->status)
                    @case(config('setting.processing'))
                        <strong>@lang('lang.processing')</strong>
                        @break
                    @case(config('setting.delivering'))
                        <strong>@lang('lang.delivering')</strong>
                        @break
                
                    @default
                        <strong>@lang('lang.closed')</strong>
                @endswitch
            </div>
        </div>
        <table class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="cart_product">@lang('lang.product')</th>
                    <th>@lang('lang.name')</th>
                    <th>@lang('lang.unitPrice')</th>
                    <th>@lang('lang.quanlity')</th>
                    <th>@lang('lang.total')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('ecommerce.product.show', [$product->id]) }}">
                                {{ Html::image(asset($product->first_picture), '', ['height' => '100px']) }}
                            </a>
                        </td>
                        <td class="cart_description">
                            <p class="product-name">
                                <a href="{{ route('ecommerce.product.show', [$product->id]) }}">{{ ucwords($product->name) }}</a>
                            </p>
                        </td>
                        <td class="price">
                            <span>{{ $product->specialPrice }}</span>
                        </td>
                        <td class="qty">
                            <span>{{ $product->pivot->quantity }}</span>
                        </td>
                        <td class="price">
                            <span>{{ number_format($product->numberPrice * $product->pivot->quantity) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="4"><strong>@lang('lang.total')</strong></td>
                  <td colspan="2"><strong>{{ number_format($order->total, 0, '.', ',') }}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="row">
            <div class="col-md-offset-8">
                @if ($order->status == config('setting.processing'))
                    <a href="{{ route('admin.order.changestatus', [$order->id]) }}" class="submit btn btn-danger">@lang('lang.delivery')</a>
                @elseif($order->status == config('setting.delivering'))
                    <a href="{{ route('admin.order.changestatus', [$order->id]) }}" class="submit btn btn-danger">@lang('lang.close')</a>
                @endif
            </div>
            <br>
        </div>
    </div>
@endsection
