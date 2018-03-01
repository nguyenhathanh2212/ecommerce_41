<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@lang('lang.admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes()
    {{ Html::favicon(asset('templates/admin/favicon.ico')) }}
    {{ Html::style(asset('css/app.css')) }}
    {{ Html::script(asset('js/app.js')) }}
    {{ Html::script(asset('templates/admin/js/script.js')) }}
    {{ Html::script(asset('templates/admin/js/moment.min.js')) }}
    {{ Html::script(asset('templates/admin/js/jquery.nicescroll.js')) }}
    {{ Html::style(asset('templates/admin/css/style.css')) }}
</head>

<body id="mimin" class="dashboard">
      <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <a href="" class="navbar-brand"> 
                    <b>@lang('lang.admin')</b>
                </a>
                <ul class="nav navbar-nav navbar-right user-nav user-login-admin">
                    @auth
                        <a href="#" class="dropdown-toggle username-menu" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <span><img src="{{ Auth::user()->avatar_path }}" class="img-circle avatar"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu user-login-admin-menu">
                            <li>
                                <a href="">@lang('lang.my_profile')</a>
                            </li>
                            <li>
                                <a href="" class="logout-admin">
                                    <span class="fa fa-power-off "></span></a></li>
                                </a>
                                {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
  <!-- end: Header -->
    <div class="container-fluid mimin-wrapper">

      <!-- start:Left Menu -->
        @include ('templates.admin.leftbar')
      <!-- end: Left Menu -->

    
      <!-- start: content -->
        <div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">{{ isset($title) ? $title : trans('lang.manage') }}</h3>
                    </div>
                </div>
            </div>
