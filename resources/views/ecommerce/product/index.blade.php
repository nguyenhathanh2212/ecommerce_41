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
                        <li class="">
                            <a title="Go to Home Page" href="">{{ ucwords($product->category->name) }}</a><span>&raquo;</span>
                        </li>
                        <li>
                            <strong>{{ ucwords($product->name) }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                @include ('ecommerce.product.product')

                @include ('ecommerce.product.review')
            </div>
        </div>
    </div>

    @include ('ecommerce.product.relate')

@endsection
