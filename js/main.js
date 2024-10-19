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

