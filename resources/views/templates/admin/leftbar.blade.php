<!-- start:Left Menu -->
<div id="left-menu">
  <div class="sub-left-menu scroll">
    <ul class="nav nav-list">
            <li><div class="left-bg"></div></li>
            <li class="time">
                <h1 class="animated fadeInLeft"></h1>
                <p class="animated fadeInRight"></p>
            </li>
            <li class="ripple animated fadeInLeft">
                <a class="nav-header" href="{{ route('admin.user.index') }}">
                    <span class="fa fa-user"></span>{{ strtoupper(trans('lang.users')) }}
                    <span class="text-right"></span>
                </a>
            </li>
            <li class="ripple animated fadeInLeft">
                <a class="nav-header" href="{{ route('admin.product.index') }}">
                    <span class="fa fa-product-hunt"></span>{{ strtoupper(trans('lang.products')) }}
                    <span class="text-right"></span>
                </a>
            </li>
            <li class="ripple animated fadeInLeft">
                <a class="nav-header" href="{{ route('admin.order.index') }}">
                    <span class="fa fa-align-right"></span>{{ strtoupper(trans('lang.order')) }}
                    <span class="text-right"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end: Left Menu -->
