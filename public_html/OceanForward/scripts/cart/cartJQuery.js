quantityChange = function() {
    var caller = event.target;
    newQuan = caller.value;
    if (newQuan < 1) {
        newQuan = 1;
    } else if (newQuan > 9) {
        newQuan = 9;
    }
    caller.value = newQuan;
}

quantityUpdate = function() {
    var caller = event.target;
    strArray = caller.id.split("-");
    custID = strArray[2];
    modelNo = strArray[4];
    strArrayVal = strArray;
    strArrayVal[0] = 'qty';
    newQuantity = document.getElementById(strArrayVal.join("-",strArrayVal)).value;
    // Update DB
    $.post("../scripts/cart/cartHelper.php",
    {"changeQuantity":
        {
            "custID": custID,
            "modelNo": modelNo,
            "newQuantity": newQuantity
        }
    })
    .done(function(data) {
        // alert("test success: "+data);
    });
    // setTimeout(location.reload, 2000);
}