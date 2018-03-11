<div class="product-overview-tab product-review" id="{{ $product->id }}">
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
                            <div class="col-sm-5 col-lg-5 col-md-5 content-show-reviews">
                                @include('ecommerce.product.contentreview')
                            </div>
                            @auth
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
                                                            <td>{{ Form::radio('rate', '1', false, ['required' => '']) }}</td>
                                                            <td>{{ Form::radio('rate', '2', false, ['required' => '']) }}</td>
                                                            <td>{{ Form::radio('rate', '3', false, ['required' => '']) }}</td>
                                                            <td>{{ Form::radio('rate', '4', false, ['required' => '']) }}</td>
                                                            <td>{{ Form::radio('rate', '5', false, ['required' => '']) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-area">
                                                <div class="form-element">
                                                    {!! html_entity_decode(Form::label('', trans('lang.review') . '<em>*</em>')) !!}
                                                    {{ Form::textarea('content', '', ['class' => 'content-review', 'required' => '']) }}
                                                </div>
                                                <div class="buttons-set">
                                                    {{ Form::button('<span><i class="fa fa-thumbs-up"></i> &nbsp;' . trans('lang.review') . '</span>', ['class' => 'button submit', 'type' => 'submit']) }}
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            @endauth
                        </div>

                        <div class="tab-pane fade" id="comments">
                            @auth
                                <div class="form-add-comment">
                                    <div class="reviews-content-right">
                                        <h2>@lang('lang.writeYourOwnComment')</h2>
                                        {{ Form::open(['class' => 'form-comment']) }}
                                            <br>
                                            <div class="form-area">
                                                <div class="form-element">
                                                    {!! html_entity_decode(Form::label('', trans('lang.comment') . '<em>*</em>')) !!}
                                                    {{ Form::textarea('content', '', ['class' => 'content-comment-input', 'required' => '']) }}
                                                </div>
                                                <div class="buttons-set">
                                                    {{ Form::button('<span><i class="fa fa-thumbs-up"></i> &nbsp;' . trans('lang.comment') . '</span>', ['class' => 'button submit-comment', 'type' => 'submit']) }}
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            @endauth
                            <div class="content-show-comments">
                                @include('ecommerce.product.comment')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
