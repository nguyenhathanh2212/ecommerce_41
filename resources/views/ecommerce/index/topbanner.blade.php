<div class="container">
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="jtv-banner-box banner-inner">
                <div class="image">
                    {!! html_entity_decode(Html::link('', Html::image($topBanners->first()->pictures->first()->picture), ['class' => 'jtv-banner-opacity'])) !!}
                </div>
                <div class="jtv-content-text">
                <h3 class="title">@lang('lang.saveUp')</h3>
                    <span class="sub-title">{{ ucwords($topBanners->first()->name) }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-xs-12">
            <div class="jtv-banner-box">
                <div class="image">
                    {!! html_entity_decode(Html::link('', Html::image($topBanners->skip(config('setting.skip1'))->first()->pictures->first()->picture), ['class' => 'jtv-banner-opacity'])) !!}
                </div>
                <div class="jtv-content-text">
                    <h3 class="title">{{ ucwords($topBanners->skip(config('setting.skip1'))->first()->name) }}</h3>
                    <span class="sub-title">{{ str_limit($topBanners->skip(config('setting.skip1'))->first()->description, config('setting.strlimit30')) }}</span>
                    {!! Html::link('', trans('lang.buyNow'), ['class' => 'button']) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <div class="jtv-banner-box banner-inner">
                <div class="image">
                    {!! html_entity_decode(Html::link('', Html::image($topBanners->skip(config('setting.skip2'))->first()->pictures->first()->picture), ['class' => 'jtv-banner-opacity'])) !!}
                </div>
                <div class="jtv-content-text">
                    <h3 class="title">{{ ucwords($topBanners->skip(config('setting.skip2'))->first()->name) }}</h3>
                </div>
            </div>
            <div class="jtv-banner-box banner-inner">
                <div class="image ">
                    {!! html_entity_decode(Html::link('', Html::image($topBanners->skip(config('setting.skip3'))->first()->pictures->first()->picture), ['class' => 'jtv-banner-opacity'])) !!}
                </div>
                <div class="jtv-content-text">
                    <h3 class="title">{{ ucwords($topBanners->skip(config('setting.skip3'))->first()->name) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
