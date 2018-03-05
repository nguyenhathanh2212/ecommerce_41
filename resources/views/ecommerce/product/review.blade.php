<div class="product-overview-tab">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="product-tab-inner" id="tab-rv"> 
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active">
                            <a href="#description" data-toggle="tab"> @lang('lang.description') </a>
                        </li>
                        <li>
                            <a href="#reviews" data-toggle="tab">@lang('lang.reviews')</a>
                        </li>
                        <li>
                            <a href="#comments" data-toggle="tab">@lang('lang.comments')</a>
                        </li>
                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="description">
                            <div class="std">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div id="reviews" class="tab-pane fade">
                            <div class="col-sm-5 col-lg-5 col-md-5">
                                <div class="reviews-content-left">
                                    <h2>@lang('lang.customerReviews')</h2>
                                    @if (count($product->users))
                                        @foreach ($product->users as $review)
                                            <div class="review-ratting">
                                                <p>
                                                    <a href="script:void(0)">
                                                        @switch($review->pivot->rate)
                                                            @case(config('setting.star5'))
                                                                @lang('lang.amazing')
                                                                @break
                                                            @case(config('setting.star4'))
                                                                @lang('lang.excellent')
                                                                @break
                                                            @case(config('setting.star3'))
                                                                @lang('lang.good')
                                                                @break
                                                        
                                                            @default
                                                                @lang('lang.bad')
                                                        @endswitch
                                                    </a>@lang('lang.reviewByCustomer')
                                                </p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>@lang('lang.rated')</th>
                                                            <td>
                                                                <div class="rating">
                                                                    @for ($i = config('setting.rate_start'); $i < ceil($review->pivot->rate); $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                    @for ($i = ceil($review->pivot->rate); $i < config('setting.rate'); $i++)
                                                                        <i class="fa fa-star-o"></i>
                                                                    @endfor
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="author">
                                                    {{ $review->fullname ? ucwords($review->fullname) : ucwords($review->email) }}<small> (@lang('lang.postedOn'){{ $review->created_at }})</small>
                                                </p>
                                                <span>
                                                    {{ $review->pivot->content }}
                                                </span>
                                            </div>
                                            <br>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-7 col-md-7">
                                <div class="reviews-content-right">
                                    <h2>@lang('lang.writeYourOwnReview')</h2>
                                    {{ Form::open(['class' => 'form-review']) }}
                                        <h3>@lang('lang.youarereviewing'): <span>{{ ucwords($product->name) }}</span></h3>
                                        <br>
                                        <h4>@lang('lang.howDoYouRateThisProduct')<em>*</em></h4>
                                        <br>
                                        <div class="table-responsive reviews-table">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                    <th></th>
                                                    <th>@lang('lang.1star')</th>
                                                    <th>@lang('lang.2stars')</th>
                                                    <th>@lang('lang.3stars')</th>
                                                    <th>@lang('lang.4stars')</th>
                                                    <th>@lang('lang.5stars')</th>
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('lang.rated')</td>
                                                        <td><input type="radio"></td>
                                                        <td><input type="radio"></td>
                                                        <td><input type="radio"></td>
                                                        <td><input type="radio"></td>
                                                        <td><input type="radio"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-area">
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.nickname') . '<em>*</em>')) !!}
                                                {{ Form::text('email') }}
                                            </div>
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.summaryOfYourReview') . '<em>*</em>')) !!}
                                                {{ Form::text('summary') }}
                                            </div>
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.review') . '<em>*</em>')) !!}
                                                {{ Form::textarea('content') }}
                                            </div>
                                            <div class="buttons-set">
                                                {{ Form::button('<span><i class="fa fa-thumbs-up"></i> &nbsp;' . trans('lang.review') . '</span>', ['class' => 'button submit']) }}
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="comments">
                            <div class="col-sm-5 col-lg-5 col-md-5">
                                <div class="reviews-content-left">
                                    <h2>@lang('lang.customerReviews')</h2>
                                    @if (count($product->comments))
                                        @foreach ($product->comments as $comment)
                                            <div class="review-ratting">
                                                <p class="author">
                                                    {{ $comment->user->fullname ? ucwords($comment->user->fullname) : ucwords($comment->user->email) }}<small> (@lang('lang.postedOn'){{ $comment->created_at }})</small>
                                                </p>
                                                <span>
                                                    {{ $comment->content }}
                                                </span>
                                            </div>
                                            <br>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-7 col-md-7">
                                <div class="reviews-content-right">
                                    <h2>@lang('lang.writeYourOwnComment')</h2>
                                    {{ Form::open(['class' => 'form-review']) }}
                                        <br>
                                        <div class="form-area">
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.nickname') . '<em>*</em>')) !!}
                                                {{ Form::text('email') }}
                                            </div>
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.comment') . '<em>*</em>')) !!}
                                                {{ Form::textarea('content') }}
                                            </div>
                                            <div class="buttons-set">
                                                {{ Form::button('<span><i class="fa fa-thumbs-up"></i> &nbsp;' . trans('lang.review') . '</span>', ['class' => 'button submit']) }}
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
