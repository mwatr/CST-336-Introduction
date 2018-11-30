function update() {
    
    var fruitcakenum = $("#fruitCakeNum").val();
    var pinataNum = $("#pinataNum").val();
    
    //fruitcakeTotal = fruitCakeNum * input
    $("#fruitCakeTotal").html("$" + fruitcakenum * 30);
    $("#pinataCakeTotal").html("$" + pinataNum * 20);
    
    $("#shippingTotal").html("$" + $("input[name = Shipping]:checked").val());
    
    var subtotal = (fruitcakenum * 30) + (pinataNum * 20) + Number($("input[name = Shipping]:checked").val());
    console.log(subtotal);
    $("#subtotal").html("$" + subtotal);
    
    var tax = subtotal * 0.1;
    $("#tax").html("$" + tax);
    
    var total = subtotal + tax;
    
    $("#total").html("$" + total);
}