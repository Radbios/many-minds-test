function alertSuccess(){
    var alert = document.getElementById("alert-success");
    alert.style.display = 'flex';

    hide(alert);
}

function hide(alert){
    setTimeout(function(){
        alert.style.display = 'none';
    }, 2000)
}