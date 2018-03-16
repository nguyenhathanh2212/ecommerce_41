<div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
    <div class="shop-inner">
        <div class="page-title">
            <h2>{{ ucwords($category->name) }}</h2>
        </div>
        <div class="toolbar">
            <div class="view-mode">
                <ul>
                    <li class="active">
                        <a href="" class="grid">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sorter">
                <div class="short-by">
                    <label>@lang('lang.sortBy')</label>
                    {{ Form::select('sort_by',['name' => trans('lang.nameAZ'), 'nameZA' => trans('lang.nameZA'), 'price' => trans('lang.priceLH'), 'priceHL' => trans('lang.priceHL')], 'name', ['class' => 'sort-by']) }}
                </div>
                <div class="short-by page">
                    <label>@lang('lang.show')</label>
                    {{ Form::select('show_by',['10' => config('setting.num10'), '20' => config('setting.num20'), '30' => config('setting.num30')], '10', ['class' => 'show-by']) }}
                </div>
            </div>
        </div>
        <div class="content-product" id="{{ $category->id }}">
            @include ('ecommerce.category.grid')
        </div>
    </div>
</div>
