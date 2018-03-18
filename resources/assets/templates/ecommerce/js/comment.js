$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.view-sub-comment').click(function(event) {
        var id = $(this).attr('id');
        if ($(this).parent().parent().children('.sub-comments').css('display') == 'none') {
            $(this).parent().parent().children('.sub-comments').show(300);
            $('.form-add-comment .reviews-content-right h2').attr('id', id);
        } else {
            $(this).parent().parent().children('.sub-comments').hide(300);
            $('.form-add-comment .reviews-content-right h2').removeAttr('id');
        }

        return false;
    });

    $('.form-comment').submit(function(event) {
        var id = $('.product-review').attr('id');
        var content = $('.content-comment-input').val();
        $.ajax({
            url: route('ecommerce.comment.addcomment'),
            type: 'post',
            data: {
                id: id,
                content: content,
            },
            success: function success(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert('You have successfully added a comment!');
                    $('.content-show-comments').html(data);
                }
            }
        });

        return false;
    });

    $('.form-sub-comment').submit(function(event) {
        var id = $('.product-review').attr('id');
        var parent_id = $(this).parent().parent().parent().children('.content-sub-comment').attr('id');
        var content = $(this).children('.form-area').children('.form-element').children('.content-sub-comment-input').val();
        $.ajax({
            url: route('ecommerce.comment.addsubcomment'),
            type: 'post',
            data: {
                id: id,
                content: content,
                parent_id: parent_id,
            },
            success: function success(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    $('#' + parent_id).html(data);
                    $('.content-sub-comment-input').val('');
                }
            }
        });

        return false;
    });
});
