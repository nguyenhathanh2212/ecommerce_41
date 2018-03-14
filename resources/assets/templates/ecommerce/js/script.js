$(document).ready(function() {
    $('.mega-menu-category').css("display","none");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.view-mode ul li a').click(function(event) {
        var mode = $(this).attr('class');
        var id = $('.content-product').attr('id');
        var number = $('.show-by').val();
        var order = $('.sort-by').val();
        if (mode == 'list') {
            $('.view-mode ul li a').attr('class', 'grid');
            $('.view-mode ul li a i').attr('class', 'fa fa-th-list');
        } else {
            $('.view-mode ul li a').attr('class', 'list');
            $('.view-mode ul li a i').attr('class', 'fa fa-th-large');
        }
        $.ajax({
            url: route('ecommerce.category.viewmode'),
            type: 'post',
            data: {
                mode: mode,
                id: id,
                number: number,
                order: order,
            },
            success: function( data ) {
                $('.content-product').html(data);                        
            }
        });

        return false;
    });
    $('.show-by').change(function(event) {
        var mode = $('.view-mode ul li a').attr('class');
        var number = $(this).val();;
        var id = $('.content-product').attr('id');
        var order = $('.sort-by').val();
        $.ajax({
            url: route('ecommerce.category.showby'),
            type: 'post',
            data: {
                id: id,
                mode: mode,
                number: number,
                order: order,
            },
            success: function( data ) {
                $('.content-product').html(data);                        
            }
        });
    });
    $('.sort-by').change(function(event) {
        var mode = $('.view-mode ul li a').attr('class');
        var number = $('.show-by').val();;
        var id = $('.content-product').attr('id');
        var order = $(this).val();
        $.ajax({
            url: route('ecommerce.category.showby'),
            type: 'post',
            data: {
                id: id,
                mode: mode,
                number: number,
                order: order,
            },
            success: function( data ) {
                $('.content-product').html(data);                        
            }
        });
    });
    $('.content-product').on('click', '.pagination a',function(event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
    function getData(page){
        var mode = $('.view-mode ul li a').attr('class');
        var number = $('.show-by').val();;
        var id = $('.content-product').attr('id');
        var order = $('.sort-by').val();
        $.ajax({
            url: route('ecommerce.category.showby') +'?page=' + page,
            type: 'post',
            data: {
                id: id,
                mode: mode,
                number: number,
                order: order,
            },
            success: function success(data) {
                $('.content-product').html(data);
            }
        });
    }
    
    $('.content-show-reviews').on('click', '.pagination a',function(event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });

    function getData(page){
        var id = $('.product-review').attr('id');
        $.ajax({
            url: route('ecommerce.product.showreview') +'?page=' + page,
            type: 'post',
            data: {
                id: id,
            },
            success: function success(data) {
                $('.content-show-reviews').html(data);
            }
        });
    }

    $('.form-review').submit(function(event) {
        var id = $('.product-review').attr('id');
        var rate = $('input[name=rate]:checked').val();
        var content = $('.content-review').val();
        $.ajax({
            url: route('ecommerce.product.addreview'),
            type: 'post',
            data: {
                id: id,
                rate: rate,
                content: content,
            },
            success: function success(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert('You have successfully added a review!');
                    $('.content-show-reviews').html(data);
                }
            }
        });
        return false;
    });

    $('.content-show-comments').on('click', '.pagination a',function(event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
    
    function getData(page){
        var id = $('.product-review').attr('id');
        $.ajax({
            url: route('ecommerce.comment.showcomment') +'?page=' + page,
            type: 'post',
            data: {
                id: id,
            },
            success: function success(data) {
                $('.content-show-comments').html(data);
            }
        });
    }
});

$(document).ready(function() {
    if ($('#add-info').hasClass('checkbox-add-info')) {
        $('#add-info').prop('checked', false);
        $('.input-order').css('display', 'none');
    }
    $('.checkbox-add-info').click(function(event) {
        $('.input-order').toggle(300);
    });
});

$('.add-cart-detail-product').submit(function(event) {
    var id = $(this).attr('id');
    var quanlity = $('.qty-product').val();
    if (quanlity <= 0) {
        quanlity = 1;
    }
    $.ajax({
        url: route('ecommerce.cart.addcart'),
        type: 'post',
        data: {
            id: id,
            quanlity: quanlity,
        },
        success: function( data ) {
            alert('Added to shopping cart.');
            $('.list-cart').html(data);
        }
    });

    return false;
});
