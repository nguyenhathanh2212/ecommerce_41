@extends ('templates.ecommerce.master')

@section ('content')
    {{ Html::script(asset('templates/ecommerce/js/cart.js')) }}
    <!-- Home Slider Start -->
    @include ('ecommerce.index.slider')
    <!-- top sell -->
    @include ('ecommerce.index.topsell')
    <!-- top banner -->
    @include ('ecommerce.index.topbanner')
    <!--special-products-->
    @include ('ecommerce.index.special')
    <div class="bottom-banner-section">
        <div class="container">
        </div>
    </div>
    <!-- category area -->
    @include ('ecommerce.index.categoryarea')
@endsection
