quantityChange = function() {
    var caller = event.target;
    newQuan = caller.value;
    if (newQuan < 1) {
        newQuan = 1;
    } else if (newQuan > 9) {
        newQuan = 9;
    }
    caller.value = newQuan;
    strArray = caller.id.split("-");
    custID = strArray[2];
    modelNum = strArray[4];
    // Update DB
    alert("Update:\ncustID: "+custID+"\nmodelNum: "+modelNum+"\nnewQuan: "+newQuan);
    // $.ajax({
    //     type: 'POST',
    //     url: '#',
    //     data: {'change-cust':$_POST['Customers_customer_id'],'quantityChange':newQuan}
    // });
};
quantityUpdate = function() {
    var caller = event.target;
    alert("Caller: "+caller.id+", Action: update");
    // Update DB
}
quantityDelete = function() {
    var caller = event.target;
    alert("Caller: "+caller.id+", Action: delete");
    // Update DB
}