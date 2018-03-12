@foreach ($subComments as $subComment)
    <div class="review-ratting">
        <hr>
        <p class="author">
            {{ $subComment->user->fullname ? ucwords($subComment->user->fullname) : ucwords($subComment->user->email) }}<small> (@lang('lang.postedOn'){{ $subComment->created_at }})</small>
        </p>
        <span>
            {{ $subComment->content }}
        </span>
    </div>
@endforeach
