// function showdate(){
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    var target = document.getElementById("currentdate").value = date;    
//    }