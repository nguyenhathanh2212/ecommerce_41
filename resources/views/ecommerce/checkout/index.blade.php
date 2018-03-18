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
                        <li><strong>@lang('lang.checkout')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End --> 
  
    <!-- Main Container -->
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-8 col-xs-12">
                    <div class="page-content checkout-page">
                        <div class="page-title">
                            <h2>@lang('lang.checkout')</h2>
                        </div>
                        <h4 class="checkout-sep">@lang('lang.deliveryInfo')</h4>

                        @include ('notice.notice')

                        {!! Form::open(['route' => 'ecommerce.checkout.order']) !!}
                            @if (Auth::user()->check_information)
                                <h4>{{ ucwords(Auth::user()->fullname) }}</h4>
                                <p>@lang('lang.registerWithUs')</p>
                                <p>
                                    <i class="fa fa-check-circle text-primary"></i>
                                    <strong>@lang('lang.deliveryAddress') </strong>{{ Auth::user()->delivery_address }}
                                </p>
                                <p>
                                    <i class="fa fa-check-circle text-primary"></i>
                                    <strong>@lang('lang.numberphone') </strong>{{ Auth::user()->numberphone }}
                                </p>
                            @endif
                            <div class="box-border">
                                <div class="row">
                                    <div class="col-sm-7">
                                        @if (Auth::user()->check_information)
                                            {!! Form::checkbox('addinfo', 'addinfo', false, ['class' => 'checkbox-add-info', 'id' => 'add-info']) !!}
                                            {!! Form::label('addinfo', trans('lang.addDeliveryInfo')) !!}
                                        @else
                                            <p id="add-info">@lang('lang.addDeliveryInfo')</p>
                                        @endif
                                        <div class="input-order">
                                            <hr>
                                            {!! Form::label('fullname', trans('lang.fullname')) !!}
                                            {!! Form::text('fullname', Auth::user()->fullname, ['class' => 'form-control input', 'required' => '']) !!}
                                            {!! Form::label('numberphone', trans('lang.numberphone')) !!}
                                            {!! Form::text('numberphone', Auth::user()->numberphone, ['class' => 'form-control input', 'required' => '']) !!}
                                            {!! Form::label('delivery_address', trans('lang.deliveryAddress')) !!}
                                            {!! Form::text('delivery_address', Auth::user()->delivery_address, ['class' => 'form-control input', 'required' => '']) !!}
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        {{ Form::radio('delivery_method', 'direct', true) }}@lang('lang.directPayment')
                                    </div>
                                    <div class="col-sm-3">
                                        {{ Form::radio('delivery_method', 'online') }}@lang('lang.onlinePayment')
                                    </div>
                                    <div class="col-sm-6">
                                        <p><i class="fa fa-check-circle text-primary"></i>@lang('lang.fastAndEasyCheckOut')</p>
                                        <p><i class="fa fa-check-circle text-primary"></i>@lang('lang.easyOrder')</p>
                                    </div>
                                </div>
                            </div>
                            {!! Form::button('<i class="fa fa-angle-double-right"></i>&nbsp; <span>' . trans('lang.continue') . '</span>', ['class' => 'button col-sm-offset-8', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
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
                                    @forelse ($carts as $cart)
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
                                    @empty
                                        @lang('lang.cartIsEmpty')
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <td colspan="2"><strong>@lang('lang.total')</strong></td>
                                      <td colspan="1"><strong>{{ number_format($total, 0, '.', ',') }}</strong></td>
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
