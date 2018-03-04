@extends('templates.ecommerce.master')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> {{ Html::link(route('home'), trans('lang.home')) }}<span>&raquo;</span></li>
                        <li><strong>@lang('lang.resetPassword')</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- Breadcrumbs End -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="page-content">
                <div class="account-login">
                    <div class="box-authentication form-log">
                        <h4>@lang('lang.resetPassword')</h4>
                        {!! Form::open(['route' => 'password.request', 'id' => 'form-login']) !!}
                            {{ Form::hidden('token', $token) }}
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
                            {!! Form::button('&nbsp;' . trans('lang.resetPassword') . '</span>', ['type' => 'submit', 'class' => 'button', 'id' => 'login-product']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
