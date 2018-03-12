@extends ('templates.ecommerce.master')

@section ('content')

    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="cart">
                    <div class="page-content page-order">
                        <div class="page-title">
                            <h2>@lang('lang.shoppingCart')</h2>
                        </div>

                        <div class="order-detail-content content-cart">
                            @include ('ecommerce.cart.content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
