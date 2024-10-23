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
           // console.log('success');
            showCart(respons);
       },
        error: function () {
            console.warn('Error Ajax sending.');
        }
    });
});

function showCart(cart) {
    if($.trim(cart) == '<h3>Корзина пуста</h3>') {
        $("#cart .modal-footer a,#cart .modal-footer btn-danger").hide();
    }else{
        $("#cart .modal-footer a,#cart .modal-footer btn-danger").show();
    }
    $("#cart .modal-body").html(cart);
    $("#cart").modal();
    if( $(".cart-sum").text() ){
        $(".simpleCart_total").html($('#cart .cart-sum').text());
    }else{
        $(".simpleCart_total").text('Empty cart');
    }
}

$("#cart .modal-body").on("click", ".del-item" ,function () {
    var id = $(this).data('id');
    $.ajax({
       url: 'cart/delete',
       data: {id : id},
       method : 'POST',
       success: function(respon){

       },
        error: function () {
            console.warn('Error Ajax sending id product.');
        }
    });
});
function getCart() {
    $.ajax({
        url : '/cart/add',
        type : 'POST',
        success: function(respons){
            showCart(respons);
        },
        error: function () {
            console.warn('Error Ajax sending.');
        }
    });
}
function clearCart() {
    $.ajax({
        url : '/cart/clear',
        type : 'POST',
        success: function(respons){
            showCart(respons);
        },
        error: function () {
            console.warn('Error Ajax sending.');
        }
    });
}
// Cart-end
// Search start
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});
products.initialize();

$("#typeahead").typeahead({
    highlight: true,
}, {
    name: 'products',
    display: 'title',
    source: products
});
$('#typeahead').bind('typeahead:select',function (ev, suggestion) {
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
// Search end