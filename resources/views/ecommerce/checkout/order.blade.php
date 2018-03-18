@extends ('templates.ecommerce.master')

@section ('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">@lang('lang.home')</a><span>&raquo;</span>
                        </li>
                        <li><a href="{{ route('ecommerce.checkout.index') }}"><strong>@lang('lang.checkout')</strong></a><span>&raquo;</span></li>
                        <li><strong>@lang('lang.order')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-8 col-xs-12">
                    <div class="page-content checkout-page">
                        <div class="page-title">
                            <h2>@lang('lang.checkout')</h2>
                        </div>
                        <h4 class="checkout-sep">@lang('lang.deliveryInfo')</h4>
                        <h4>{{ ucwords($data['fullname']) }}</h4>
                        <p>
                            <i class="fa fa-check-circle text-primary"></i>
                            <strong>@lang('lang.deliveryAddress') </strong>{{ $data['delivery_address'] }}
                        </p>
                        <p>
                            <i class="fa fa-check-circle text-primary"></i>
                            <strong>@lang('lang.numberphone') </strong>{{ $data['numberphone'] }}
                        </p>
                        <p>
                            <i class="fa fa-check-circle text-primary"></i>
                            <strong>@lang('lang.paymentMethod') </strong>{{ $data['delivery_method'] }}
                        </p>
                        <p>
                            <i class="fa fa-check-circle text-primary"></i>
                            <strong>@lang('lang.total') </strong>{{ number_format($data['total'], 0, '.', ',') }}
                        </p>
                        <a href="{{ route('ecommerce.checkout.confirm') }}" class="a-button col-sm-offset-10"><i class="fa fa-angle-double-right"></i>&nbsp; <strong>@lang('lang.order')</strong></a>
                    </div>
                </div>
                <aside class="right sidebar col-sm-4 col-xs-12">
                    <div class="sidebar-checkout block">
                        <div class="sidebar-bar-title">
                          <h3>@lang('lang.orderedInformation')</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered cart_summary">
                                <thead>
                                    <tr>
                                        <th class="cart_product">@lang('lang.product')</th>
                                        <th>@lang('lang.quanlity')</th>
                                        <th>@lang('lang.total')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($carts))
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="cart_product">
                                                    <p class="product-name">
                                                        <span>{{ ucwords($cart->name) }}</span>
                                                        <br>
                                                    </p>
                                                </td>
                                                <td class="qty">
                                                    <span>{{ Session::get('carts')[$cart->id]['quanlity'] }}</span>
                                                </td>
                                                <td class="price">
                                                    <span>{{ number_format($cart->numberPrice * Session::get('carts')[$cart->id]['quanlity'], 0, '.', ',') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <strong>@lang('lang.cartIsEmpty')</strong>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <td colspan="2"><strong>@lang('lang.total')</strong></td>
                                      <td colspan="1"><strong>{{ number_format($data['total'], 0, '.', ',') }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
