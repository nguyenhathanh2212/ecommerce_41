$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#checkAll').click(function(event) {
        if ($(this).prop('checked') == true){
            $('.checkbox-item').prop('checked', true);
        } else {
            $('.checkbox-item').prop('checked', false);
        }
    });

    $('.checkbox-item').click(function(event) {
        if ($(this).prop('checked') == false){
            $('#checkAll').prop('checked', false);
        }
    });

    $('.search-product').keyup(function(event) {
        var text = $(this).val();
        $.ajax({
            url: route('admin.product.search'),
            type: 'POST',
            data: {
                text:text,
            },
            success: function(data) {
                $('.content-product').html(data);
            }
        });
    });

    $('#btn-del-product').click(function(event) {
        var idProducts = [];
        $('input[name=checkbox-item]:checked').each ( function(i) {
            idProducts[i] = $(this).attr('id');
        });
        $.ajax({
            url: route('admin.product.delete'),
            type: 'post',
            data: {
                idProducts: idProducts
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
        getDataProduct(page);
    });
    function getDataProduct(page){
        var text = $('.search-product').val();
        $.ajax({
            url: route('admin.product.paginate') +'?page=' + page,
            type: 'post',
            data: {
                text: text,
            },
            success: function success(data) {
                $('.content-product').html(data);
            }
        });
    }
    $('#checkAll').click(function(event) {
        if ($(this).prop('checked') == true){
            $('.checkbox-item').prop('checked', true);
        } else {
            $('.checkbox-item').prop('checked', false);
        }
    });

    $('.checkbox-item').click(function(event) {
        if ($(this).prop('checked') == false){
            $('#checkAll').prop('checked', false);
        }
    });

    $('.search-product').keyup(function(event) {
        var text = $(this).val();
        $.ajax({
            url: route('admin.product.search'),
            type: 'POST',
            data: {
                text:text,
            },
            success: function(data) {
                $('.content-product').html(data);
            }
        });
    });
    
    $('.parent-category').change(function(event) {
        var parentId = $(this).val();
        $.ajax({
            url: route('admin.product.subcategory'),
            type: 'post',
            data: {
                parentId: parentId,
            },
            success: function success(data) {
                $('.sub-category').html('');
                $.each(data.subCategries, function(key, value) {
                    $('.sub-category').append($("<option></option>")
                    .attr("value", key).text(value));
                });
            }
        });
    });

    $('.btn-search-user').click(function(event) {
        var text = $('.search-users').val();
        $.ajax({
            url: route('admin.user.paginate'),
            type: 'POST',
            data: {
                text: text,
            },
            success: function(data) {
                $('.content-user').html(data);
            }
        });
    });

    $('.content-user').on('click', '.pagination a',function(event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getDataUser(page);
    });
    function getDataUser(page){
        var text = $('.search-users').val();
        $.ajax({
            url: route('admin.user.paginate') +'?page=' + page,
            type: 'post',
            data: {
                text: text,
            },
            success: function success(data) {
                $('.content-user').html(data);
            }
        });
    }

    $('.is_admin_checkbox').click(function(event) {
        var status = 0;
        if ($(this).prop('checked') == true){
            status = 1;
        }
        var id = $(this).attr('id');
        $.ajax({
            url: route('admin.user.setadmin'),
            type: 'POST',
            data: {
                status: status,
                id: id,
            },
            success: function(data) {
                location.reload();
            }
        });
    });
});
