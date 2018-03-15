@extends ('templates.ecommerce.master')

@section ('content')
    <!-- Breadcrumbs End --> 
  
    <!-- Main Container -->
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-12 col-xs-12">
                    <div class="page-content checkout-page">
                        <div class="page-title">
                            @include('notice.notice')
                        </div>
                        <a href="{{ route('home') }}"><span>&raquo;</span> @lang('lang.continueShopping')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
