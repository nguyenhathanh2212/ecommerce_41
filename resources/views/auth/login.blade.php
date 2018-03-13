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
                    <div class="box-authentication form-log">
                        <h4>@lang('lang.login')</h4>
                       <p class="before-login-text">@lang('lang.welcomeLogin')</p>
                        {!! Form::open(['route' => 'login', 'id' => 'form-login']) !!}
                            <div class="form-group">
                                {!! Form::label('emmail_login', trans('lang.emailAddress')) !!}
                                <span class="required">*</span>
                                {!! Form::email('email', '', ['required' => '', 'id' => 'emmail_login', 'class' => 'form-input form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_login', trans('lang.password')) !!}
                                <span class="required">*</span>
                                {!! Form::password('password', ['required' => '', 'id' => 'password_login', 'class' => 'form-input form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p class="forgot-pass">{{ Html::link(route('password.request'), trans('lang.lostYourPassword')) }} | {{ Html::link(route('register'), trans('lang.register')) }}</p>
                            {!! Form::button('<i class="fa fa-lock"></i>&nbsp; <span>' . trans('lang.login') . '</span>', ['type' => 'submit', 'class' => 'button', 'id' => 'login-product']) !!}

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
                                    {!! html_entity_decode(Html::link(route('social', ['facebook']), '<i class="icon icon-fb-social icon-fb-small-social"></i><span>' . trans('lang.facebook') . '</span>', ['id' => 'facebook-login-button', 'class' => 'fb-auth inner facebook-login-auth'] )) !!}
                                </div>
                            </div>
                            <div class="google-wrapper">
                                <div>
                                    {!! html_entity_decode(Html::link(route('social', ['google']), '<i class="icon icon-google-social icon-google-small-social"></i><span>' . trans('lang.google') . '</span>', ['id' => 'google-login-button', 'class' => 'google-auth inner google-login-auth'] )) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Main Container End --> 
@endsection
