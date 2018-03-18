<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <style type="text/css">
            .cart_summary tbody tr td, .cart_summary thead tr th, .cart_summary tfoot tr td {
                border: 1px solid #333;
            }
            .wrapper {
                margin: 0 auto;
                width: 70%;
                padding: 5%;
                background-color: #f1f1f1;
            }
            .content-infomation {
                padding-left: 5%;
            }
            .title {
                width: 20%;
                margin: 0 auto;
            }
            * {
                color: #000;
            }
            .img-product {
                height: 80px;
            }
        </style>
    </head>
    <body>
        <section class="main-container wrapper">
            <h1 class="title"><img src="{{ $message->embed(public_path() . '/templates/ecommerce/images/logo.png') }}" /></h1>
            <div class="main container">
                <div class="row">
                    <div class="col-main col-sm-8 col-xs-12">
                        <div class="page-content checkout-page">
                            <div class="breadcrumbs">
                                <h2>@lang('lang.hi') {{ Session::get('checkoutOrder')['fullname'] }} !</h2>
                                <h3>&#x263A; @lang('lang.thankYouForYourOrder')</h3>
                            </div>
                            <h3 class="checkout-sep">&diams; @lang('lang.deliveryInfo')</h3>
                            <div class="content-infomation">
                                <p>
                                    <strong>&#x261E; @lang('lang.fullname') </strong>{{ Session::get('checkoutOrder')['fullname'] }}
                                </p>
                                <p>
                                    <strong>&#x261E; @lang('lang.deliveryAddress') </strong>{{ Session::get('checkoutOrder')['delivery_address'] }}
                                </p>
                                <p>
                                    <strong>&#x261E; @lang('lang.numberphone') </strong>{{ Session::get('checkoutOrder')['numberphone'] }}
                                </p>
                                <p>
                                    <strong>&#x261E; @lang('lang.paymentMethod') </strong>{{ Session::get('checkoutOrder')['delivery_method'] }}
                                </p>
                                <p>
                                    <strong>&#x261E; @lang('lang.total') </strong>{{ number_format(Session::get('checkoutOrder')['total'], 0, '.', ',') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <aside class="right sidebar col-sm-4 col-xs-12">
                        <div class="sidebar-checkout block">
                            <div class="sidebar-bar-title">
                              <h3>&diams; @lang('lang.orderedInformation')</h3>
                            </div>
                            <div class="block-content">
                                <table class="table table-bordered cart_summary" width="90%">
                                    <thead>
                                        <tr>
                                            <th width="20%">@lang('lang.picture')</th>
                                            <th width="20%">@lang('lang.product')</th>
                                            <th width="30%">@lang('lang.preview')</th>
                                            <th width="10%">@lang('lang.quanlity')</th>
                                            <th width="20%">@lang('lang.total')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($carts as $cart)
                                            <tr align="center">
                                                <td>
                                                    <p>
                                                        <span><img class="img-product" src="{{ $message->embed(public_path() . '/' .$cart->first_picture) }}" />
                                                        </span>
                                                        <br>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <span>{{ ucwords($cart->name) }}</span>
                                                        <br>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <span>{{ ucwords($cart->preview) }}</span>
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
                                        @empty
                                            @lang('lang.cartIsEmpty')
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr align="center">
                                          <td colspan="4"><strong>@lang('lang.total')</strong></td>
                                          <td colspan="1"><strong>{{ number_format(Session::get('checkoutOrder')['total'], 0, '.', ',') }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </body>
</html>
