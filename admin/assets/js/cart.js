$(function(){

    $("[data-action]").click(function (e) {

        e.preventDefault();
        var data = $(this).data();

        $.post(data.action, function (cart) {
            ajaxCart(cart, data.reference);
        }, "json");

        if(data.clear){
            toastr.success('Carrinho excluido com sucesso');
            window.location.href = data.url;
        }

    });

    var hv = $('#h_v').val();

    $.post(hv, function (cart) {
        ajaxCart(cart)
    });

    function ajaxCart(cart, reference = null) {
        var cart_amount = $('.cart_amount-'+reference);
        var cart_total = $('.cart_total-'+reference);
        var cart_total_items = $('.cart_total_items');
        var cart_amount_items = $('.cart_amount_items');
        var total_items_view = $('.total_items_view');

        var formater = Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"
        });

        if(cart.items && !cart.delete){
            $.each(cart.items, function (index, item) {
                $(".item_"+item.id).html(item.amount);
            })
        }

        if(cart.total){
            cart_total_items.html('<span class="cart_total_items">'+ formater.format(cart.total) +'</span>');
        }

        if(cart.amount){
            total_items_view.html(cart.amount);
            cart_amount_items.html('<td class="cart_total_items">'+  cart.amount +'</td>');
        }

        if(cart.delete){
            $('#'+cart.delete).fadeOut(200);
            if (cart.items.length === 0){
                $('.cart_info, .cart_info_button').fadeOut(200);
                $('.not_products').fadeIn(200);
            }

            toastr.info('Produto removido do carrinho com sucesso!');
            location.reload();

        }

        if(cart.items[reference]){
            cart_amount.val(cart.items[reference].amount);
            cart_total.html('<p class="cart_total cart_total_price">'+ formater.format(cart.items[reference].total) + '</p>');
        }

    }

    $('.add-to-cart').click(function () {
        toastr.info('Produto adicionado ao carrinho com sucesso!');
    });


});
