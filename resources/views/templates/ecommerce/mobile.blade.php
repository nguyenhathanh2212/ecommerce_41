<!-- mobile menu -->
<div id="mobile-menu">
    <ul>
        <li><a href="{{ route('home') }}" class="home1">@lang('lang.home')</a></li>
        @foreach ($parentCategories as $parentCategory)
            <li><a href="{{ route('ecommerce.category.show', [$parentCategory->id]) }}" class="home1">{{ ucwords($parentCategory->name) }}</a>
                @if (count($parentCategory->subCategories))
                    <ul>
                        @foreach ($parentCategory->subCategories as $subCategory)
                            <li><a href="{{ route('ecommerce.category.show', [$subCategory->id]) }}"><span>{{ ucwords($subCategory->name) }}</span></a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
<!-- end mobile menu -->
