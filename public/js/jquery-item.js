$(function() {
    $('.plus').on('click', function() {
    var quantity = parseInt($('#quantity').val());
    $('#quantity').attr('value', parseInt(quantity) + 1);
    });

    $('.minus').on('click', function() {
    var quantity = parseInt($('#quantity').val());
    if(quantity>1){
        $('#quantity').attr('value', parseInt(quantity) - 1);
    }
    
    });
});