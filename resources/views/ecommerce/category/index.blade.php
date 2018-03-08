@extends('templates.ecommerce.master')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="" href="{{ route('home') }}">@lang('lang.home')</a><span>&raquo;</span>
                        </li>
                        <li>
                            <strong>{{ ucwords($category->name) }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End --> 
    <!-- Main Container -->
    <div class="main-container col2-left-layout">
        <div class="container">
            <div class="row">
                @include ('ecommerce.category.product')
                @include ('ecommerce.category.filter')
            </div>
        </div>
    </div>
    <!-- Main Container End --> 
    <!-- Footer -->
@endsection
