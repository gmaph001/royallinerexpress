let alertmsg = "*Please fill in this field!*";

    function verify(){
        if(document.billing.key.value === ""){
            document.getElementById("namealert").innerHTML = alertmsg;
            document.getElementById("key").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("namealert").style.display = "none";
            document.getElementById("key").style.border = "none";
        }
    }