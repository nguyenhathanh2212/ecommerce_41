$(document).ready(function() {
    $('.add-to-cart-mt, .add-to-card').click(function(event) {
        var id = $(this).attr('id');
        var quanlity = 1;
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
    $('.delete-product-cart').click(function(event) {
        var id = $(this).attr('id');
        $.ajax({
            url: route('ecommerce.cart.delete'),
            type: 'post',
            data: {
                id: id,
            },
            success: function( data ) {
                $('.content-cart').html(data);
            }
        });

        return false;
    });
    $('.quanlity-product').change(function(event) {
        var id = $(this).attr('id');
        var quanlity = $(this).val();
        if (quanlity <= 0) {
            $(this).val(1);
            quanlity = 1;
        }
        $.ajax({
            url: route('ecommerce.cart.changequanlity'),
            type: 'post',
            data: {
                id: id,
                quanlity: quanlity,
            },
            success: function( data ) {
                $('.content-cart').html(data);
            }
        });

        return false;
    });
});
