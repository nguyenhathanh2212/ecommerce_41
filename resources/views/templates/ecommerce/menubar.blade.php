<!-- Navbar -->
<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="mm-toggle-wrap">
                    <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
                    <span class="mm-label">@lang('lang.categories')</span> </div>
                <div class="mega-container visible-lg visible-md visible-sm">
                    <div class="navleft-container">
                        <div class="mega-menu-title">
                            <h3>@lang('lang.categories')</h3>
                        </div>
                        <div class="mega-menu-category">
                            <ul class="nav">
                                @if (count($parentCategories))
                                    @foreach ($parentCategories as $parentCategory)
                                        <li>
                                            <a href="{{ route('ecommerce.category.show', [$parentCategory->id]) }}">{{ ucwords($parentCategory->name) }}</a>
                                            @if (count($parentCategory->subCategories))
                                                <div class="wrap-popup column1">
                                                    <div class="popup">
                                                        <ul class="nav">
                                                            @foreach ($parentCategory->subCategories as $category)
                                                                <li>
                                                                    <a href="{{ route('ecommerce.category.show', [$category->id]) }}"><span>{{ ucwords($category->name) }}</span></a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="mtmegamenu">
                    <ul>
                        <li class="mt-root demo_custom_link_cms">
                            <div class="mt-root-item"><a href="{{ route('home') }}">
                                <div class="title title_font"><span class="title-text">@lang('lang.home')</span></div>
                                </a></div>
                        </li>
                        <li class="mt-root">
                            <div class="mt-root-item"><a href="">
                                <div class="title title_font"><span class="title-text">@lang('lang.contactUs')</span> </div>
                                </a></div>
                        </li>
                        <li class="mt-root">
                            <div class="mt-root-item"><a href="">
                                <div class="title title_font"><span class="title-text">@lang('lang.aboutUs')</span></div>
                                </a></div>
                        </li>
                        <li class="mt-root">
                            <div class="mt-root-item">
                                <div class="title title_font"><span class="title-text">@lang('lang.bestSeller')</span></div>
                            </div>
                            <ul class="menu-items col-xs-12">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end nav --> 
