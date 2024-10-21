$('#currency').change(function(){
    window.location =  'currency/change/?curr=' + $(this).val();
});

$('.available select').change(function (){
    var mod_id = $(this).val();
    var color = $(this).find('option:selected').data('title');
    var price = $(this).find('option:selected').data('price');
    var basePrice = $("#base-price").data('base');
    if(price){
        $("#base-price").text(symbolLeft + price + symbolRight);
    }else{
        $("#base-price").text(symbolLeft + basePrice + symbolRight);
    }
});

// Cart-start
$('body').on('click','.add-to-cart-link',function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    var mod = $('.available select').val();
    $.ajax({
       url : '/cart/add',
       data : {id : id, qty : qty, mod: mod},
       type : 'POST',
       success: function(respons){
           console.log('success');
            showCart(respons);
       },
        error: function () {
            console.warn('Error Ajax sending.');
        }
    });
});

function showCart(cart) {
    console.log(cart)
}


// Cart-end

