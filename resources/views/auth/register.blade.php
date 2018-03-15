@extends('templates.ecommerce.master')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> {{ Html::link(route('home'), trans('lang.home')) }}<span>&raquo;</span></li>
                        <li><strong>@lang('lang.myAccount')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- Breadcrumbs End --> 
<!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="page-content">
                <div class="account-login">
                    <div class="box-authentication">
                        <h4>@lang('lang.register')</h4><p>@lang('lang.createYourVeryOwnAccount')</p>
                        {!! Form::open(['route' => 'register']) !!}
                            <div class="form-group">
                                {!! Form::label('firstname', trans('lang.firstname')) !!}
                                {!! Form::text('firstname', '', ['class' => 'form-input form-control', 'id' => 'firstname']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('lastname', trans('lang.lastname')) !!}
                                {!! Form::text('lastname', '', ['class' => 'form-input form-control', 'id' => 'lastname']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('lang.emailAddress')) !!} <span class="required">*</span>
                                {!! Form::email('email', '', ['required' => '', 'class' => 'form-input form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email']) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', trans('lang.password')) !!} <span class="required">*</span>
                                {!! Form::password('password', ['required' => '', 'class' => 'form-input form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'id' => 'password']) !!}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', trans('lang.confirmPassword')) !!} <span class="required">*</span>
                                {!! Form::password('password_confirmation', ['required' => '', 'class' => 'form-input form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'id' => 'password-confirm']) !!}
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {!! Form::button('<i class="fa fa-user"></i>&nbsp; <span>' . trans('lang.register') . '</span>', ['type' => 'submit', 'class' => 'button']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="unit or-divider">
                        <div class="inner">
                            <div class="loginReg__or">@lang('lang.or')</div>
                        </div>
                    </div>
                    <div class="unit social-column">
                    <div class="social-inner">
                        <div class="fb-wrapper">
                            <div>
                                {!! html_entity_decode(Html::link(route('social', ['facebook']), '<i class="icon icon-fb-social icon-fb-small-social"></i><span>' . trans('lang.signUpWithFacebook') . '</span>', ['id' => 'facebook-login-button', 'class' => 'fb-auth inner facebook-login-auth'] )) !!}
                            </div>
                        </div>
                        <div class="google-wrapper">
                            <div>
                                {!! html_entity_decode(Html::link(route('social', ['google']), '<i class="icon icon-google-social icon-google-small-social"></i><span>' . trans('lang.signUpWithGoogle') . '</span>', ['id' => 'google-login-button', 'class' => 'google-auth inner google-login-auth'] )) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="register-benefits">
                    <h5>@lang('lang.signUpTodayAndYouWillBeAbleTo')</h5>
                    <ul>
                        <li>@lang('lang.speedYourWayThroughCheckout')</li>
                        <li>@lang('lang.trackYourOrdersEasily')</li>
                        <li>@lang('lang.keepRecordOfAllYourPurchases')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  <!-- Main Container End --> 
@endsection
