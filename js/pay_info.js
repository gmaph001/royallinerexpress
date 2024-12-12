let alertmsg = "*Please fill in this field!*";

    function verify(){
        if(document.billing.name.value === ""){
            document.getElementById("namealert").innerHTML = alertmsg;
            event.preventDefault();
        }
        else{
            document.getElementById("namealert").style.display = "none";
        }

        if(document.billing.phone.value === ""){
            document.getElementById("phonealert").innerHTML = alertmsg;
            event.preventDefault();
        }
        else{
            if(document.billing.phone.value.length !== 10){
                document.getElementById("phonealert").innerHTML = "*Please input correct phone number!*";
                event.preventDefault();
            }
            else{
                document.getElementById("phonealert").style.display = "none";
            }                                   
        }

        if(document.billing.email.value === ""){
            document.getElementById("emailalert").innerHTML = alertmsg;
            event.preventDefault();
        }
        else{
            document.getElementById("emailalert").style.display = "none";
        }
    }