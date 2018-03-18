<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic page needs -->
        <meta charset="utf-8">
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <![endif]-->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@lang('lang.title')</title>
        <meta name="description" content="Explore the live preview of the professional Modern - Multi Purpose eCommerce Website Template get yourself knowledgeable about this theme prior to buying it. Browse through the pages, check out the images, click the buttons, explore the features.">
        <meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"/>
        <!-- Mobile specific metas    , -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @routes
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::style(asset('css/app.css')) }}
        {{ Html::script(asset('js/app.js')) }}

        {{ Html::favicon(asset('templates/ecommerce/favicon.ico')) }}
        <!-- font-awesome & simple line icons CSS -->
        {{ Html::style(asset('templates/ecommerce/css/simple-line-icons.css')) }}
        <!-- owl.carousel CSS -->
        {{ Html::style(asset('templates/ecommerce/css/owl.carousel.css')) }}
        {{ Html::style(asset('templates/ecommerce/css/flexslider.css')) }}
        {{ Html::style(asset('templates/ecommerce/css/owl.theme.css')) }}
        {{ Html::style(asset('templates/ecommerce/css/owl.transitions.css')) }}
        {{ Html::style(asset('templates/ecommerce/css/jquery-ui.css')) }}
        <!-- animate CSS    -->
        <!-- jquery-ui.min CSS    -->
        <!-- Revolution Slider CSS -->
        {{ Html::style(asset('templates/ecommerce/css/revolution-slider.css')) }}
        <!-- style CSS -->
        {{ Html::style(asset('templates/ecommerce/css/style.css')) }}
        {{ Html::style(asset('templates/ecommerce/css/mystyle.css')) }}
    </head>

    <body class="cms-index-index cms-home-page">
        
        @include ('templates.ecommerce.mobile')

        <div id="page">
        <!-- Header -->
        <header>
            <div class="header-container">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 hidden-xs"> 
                                <!-- Default Welcome Message -->
                                <div class="welcome-msg ">@lang('lang.welcome')</div>
                                <span class="phone hidden-sm">@lang('lang.phoneNumber')</span> </div>
                            
                            <!-- top links -->
                            <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                                <div class="links">
                                    @auth
                                        <div class="myaccount">
                                            <a title="@lang('lang.myaccount')" href="{{ route('ecommerce.profile.index') }}">
                                                <i class="fa fa-user"></i>
                                                <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
                                            </a>
                                        </div>
                                        <div class="login"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">@lang('lang.logout')</span></a>
                                        </div>
                                        {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        <div class="login"><a href="{{ route('login') }}"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">@lang('lang.login')</span></a></div>
                                        <div class="login"><a href="{{ route('register') }}"><i class="fa fa-registered"></i><span class="hidden-xs">@lang('lang.register')</span></a></div>
                                    @endauth
                                    
                                </div>
                                <div class="language-currency-wrapper">
                                    <div class="inner-cl">
                                        <div class="block block-language form-language">
                                            <div class="lg-cur"> <span>{{ Html::image(asset('templates/ecommerce/images/english.png'), '', ['width' => '20px', 'height' => '20px']) }}<span class="lg-fr">@lang('lang.english')</span> <i class="fa fa-angle-down"></i> </span> </div>
                                            <ul>
                                                <li> <a class="selected" href=""> {{ Html::image(asset('templates/ecommerce/images/english.png'), '', ['width' => '20px', 'height' => '20px']) }} <span>@lang('lang.english')</span> </a> </li>
                                                <li> <a href=""> {{ Html::image(asset('templates/ecommerce/images/vietnam.png'), '', ['width' => '20px', 'height' => '20px']) }} <span>@lang('lang.vietnamese')</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- End Default Welcome Message --> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-xs-12"> 
                            <!-- Header Logo -->
                            <div class="logo"><a title="" href="{{ route('home') }}">{{ Html::image(asset('templates/ecommerce/images/logo.png'), 'responsive theme logo') }}</a></div>
                            <!-- End Header Logo --> 
                        </div>
                        <div class="col-xs-9 col-sm-6 col-md-6"> 
                            <!-- Search -->

                            <div class="top-search">
                                <div id="search">
                                    {!! Form::open(['route' => 'ecommerce.search', 'method' => 'GET']) !!}
                                        <div class="input-group">
                                            <select class="cate-dropdown hidden-xs category-id-search" name="category_id">
                                                <option value="0">@lang('lang.allCategories')</option>
                                                @foreach ($parentCategories as $parentCategory)
                                                    <option value="{{ $parentCategory->id }}">{{ ucwords($parentCategory->name) }}</option>
                                                    @if (count($parentCategory->subCategories))
                                                        @foreach ($parentCategory->subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}">&nbsp;&nbsp;&nbsp;{{ ucwords($subCategory->name) }} </option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                            {!! Form::text('search', '', ['class' => 'form-control text-search', 'placeholder' => trans('lang.search'), 'name' => 'text_search']) !!}
                                            {!! Form::button('<i class="fa fa-search"></i>', ['class' => 'btn-search button-search-product', 'type' => 'submit']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            
                            <!-- End Search --> 
                        </div>
                        <!-- top cart -->
                        <div class="col-lg-3 col-xs-3 top-cart">
                            <div class="top-cart-contain">
                                <div class="mini-cart">
                                    <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="">
                                        <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                                        <div class="shoppingcart-inner hidden-xs"><span class="cart-title">@lang('lang.shoppingCart')</span></div>
                                        </a></div>
                                    <div>
                                        <div class="top-cart-content">
                                            <div class="block-subtitle hidden-xs">@lang('lang.recentlyAddedItem')</div>
                                            <ul id="cart-sidebar" class="mini-products-list list-cart">
                                                @include ('ecommerce.cart.cart')
                                            </ul>
                                            <div class="top-subtotal">
                                                <span class="price"></span>
                                            </div>
                                            <div class="actions">
                                                <a href="{{ route('ecommerce.cart.index') }}" class="btn-checkout" type="button">
                                                    <i class="fa fa-check"></i>
                                                    <span>@lang('lang.viewCart')</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        @include ('templates.ecommerce.menubar')
