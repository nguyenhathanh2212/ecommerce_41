{{ Html::script('templates/ecommerce/js/comment.js') }}
<div class="reviews-content-left">
    <h2>@lang('lang.customerComments')</h2>
    @if (count($comments))
        @foreach ($comments as $comment)
            <hr>
            <div class="review-ratting">
                <p class="author">
                    {{ $comment->user->fullname ? ucwords($comment->user->fullname) : ucwords($comment->user->email) }}<small> (@lang('lang.postedOn'){{ $comment->created_at }})</small>
                    <a class="view-sub-comment" href="">
                        {!! Auth::check() ? '<span>&raquo;</span>' . trans('lang.reply') : (count($comment->subComments) ? '<span>&raquo;</span>' . trans('lang.showReply') : '') !!}
                    </a>
                    <span>({{ count($comment->subComments) }})</span>
                </p>
                <span>
                    {{ $comment->content }}
                </span>
                <div class="row sub-comments">
                    <div class="col-sm-offset-1 col-sm-10">
                        @auth
                            <div class="form-add-sub-comment">
                                <div class="reviews-content-right">
                                    {{ Form::open(['class' => 'form-sub-comment']) }}
                                        <br>
                                        <div class="form-area">
                                            <div class="form-element">
                                                {!! html_entity_decode(Form::label('', trans('lang.reply') . '<em>*</em>')) !!}
                                                {{ Form::textarea('subcontent', '', ['class' => 'content-sub-comment-input', 'required' => '']) }}
                                            </div>
                                            <div class="buttons-set">
                                                {{ Form::button('<span><i class="fa fa-thumbs-up"></i> &nbsp;' . trans('lang.reply') . '</span>', ['class' => 'button submit-comment', 'type' => 'submit']) }}
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        @endauth
                        <div class="content-sub-comment" id={{ $comment->id }}>
                            @foreach ($comment->sub_comments as $subcomment)
                                <div class="review-ratting">
                                    <hr>
                                    <p class="author">
                                        {{ $subcomment->user->fullname ? ucwords($subcomment->user->fullname) : ucwords($subcomment->user->email) }}<small> (@lang('lang.postedOn'){{ $subcomment->created_at }})</small>
                                    </p>
                                    <span>
                                        {{ $subcomment->content }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <br>
        @endforeach
    @endif
</div>
{{ $comments->links() }}
