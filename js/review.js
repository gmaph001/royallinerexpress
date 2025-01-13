let commessage = "*Please fill this field!*";

    function comment(){
        if(document.review.name.value === ""){
            document.getElementById("nameattent").innerHTML = commessage;
            document.review.name.style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("nameattent").innerHTML = "";
            document.review.name.style.border = "none";
        }

        if(document.review.email.value === ""){
            document.getElementById("emailattent").innerHTML = commessage;
            document.review.email.style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("emailattent").innerHTML = "";
            document.review.email.style.border = "none";
        }

        if(document.review.commentation.value === ""){
            document.getElementById("commentattent").innerHTML = commessage;
            document.review.commentation.style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("commentattent").innerHTML = "";
            document.review.commentation.style.border = "none";
        }
    }