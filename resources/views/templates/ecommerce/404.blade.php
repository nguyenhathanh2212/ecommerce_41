@extends ('templates.ecommerce.master')

@section ('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="@lang('lang.goToHomePage')" href="{{ route('home') }}">@lang('lang.home')</a><span>&raquo;</span></li>
                        <li><strong>@lang('lang.404Error')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End --> 
  
    <!--Container -->
    <div class="error-page">
        <div class="container">
            <div class="error_pagenotfound"> <strong>4<span id="animate-arrow">0</span>4 </strong> <br />
                @lang('lang.notice_404')
                <p>@lang('lang.notice_404_2')</p>
                <br />
                <a href="{{ route('home') }}" class="button-back"><i class="fa fa-arrow-circle-left fa-lg"></i>@lang('lang.gotoBack')</a> </div>
                <!-- end error page notfound -->
            </div>
    </div>
    <!-- Container End -->
@endsection
