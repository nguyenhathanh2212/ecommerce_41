<div class="reviews-content-left">
    <h2>@lang('lang.customerReviews') ({{ count($reviews) }})</h2>
    @if (count($reviews))
        @foreach ($reviews as $review)
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
{{ $reviews->links() }}
