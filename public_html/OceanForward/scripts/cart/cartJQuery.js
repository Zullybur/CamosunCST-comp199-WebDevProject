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

quantityUpdate = function(sessid) {
    alert("here-0");
    var caller = event.target;
    strArray = caller.id.split("-");
    call = strArray[0];     //upd
    sessid = strArray[1]    //sessID
    mod = strArray[2];      //mod
    modelNo = strArray[3];  //model #
    strArrayVal = strArray;
    strArrayVal[0] = 'qty';
    alert("here-1");
    newQuantity = document.getElementById(strArrayVal.join("-",strArrayVal)).value;
    // Update DB
    $.post("../scripts/cart/cartHelper.php",
    {"changeQuantity":
        {
            "sessid": sessid,
            "modelNo": modelNo,
            "newQuantity": newQuantity
        }
    })
    .done(function(data) {
        // alert("test success: "+data);
    });
    // setTimeout(location.reload, 2000);
}