let alertmsg = "*Please fill this field!*";
    let phonealert = "*Please input correct phone number!*";
    let confirmalert = "*Please input correct confirmation key!*";
    

    function sajili(){
        let confirm_key = document.getElementById("birth").value;

        let confirmkey2 = confirm_key.split("");
        let confirmkey3 = "";
        
        for(let i=0; i<10; i++){
            if(confirmkey2[i] === "-"){
                continue;
            }
            else{
                confirmkey3 += confirmkey2[i];
            }
        }

        if(document.more.firstname.value === ""){
            document.getElementById("firstalert").innerHTML = alertmsg;
            document.getElementById("firstname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("firstalert").innerHTML = "";
            document.getElementById("firstname").style.border = "none";
        }

        if(document.more.secondname.value === ""){
            document.getElementById("secondalert").innerHTML = alertmsg;
            document.getElementById("secondname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("secondalert").innerHTML = "";
            document.getElementById("secondname").style.border = "none";
        }

        if(document.more.lastname.value === ""){
            document.getElementById("lastalert").innerHTML = alertmsg;
            document.getElementById("lastname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("lastalert").innerHTML = "";
            document.getElementById("lastname").style.border = "none";
        }

        if(document.more.birthdate.value === ""){
            document.getElementById("birthalert").innerHTML = alertmsg;
            document.getElementById("birthdate").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("birthalert").innerHTML = "";
            document.getElementById("birthdate").style.border = "none";
        }

        if(document.more.phone.value === ""){
            document.getElementById("phonealert").innerHTML = alertmsg;
            document.getElementById("phone").style.border = "2px solid red";
            event.preventDefault();
        }
        else if(document.more.phone.value.length !== 10){
            document.getElementById("phonealert").innerHTML = phonealert;
            document.getElementById("phone").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("phonealert").innerHTML = "";
            document.getElementById("phone").style.border = "none";
        }

        if(document.more.gender.value === "none"){
            document.getElementById("genderalert").innerHTML = alertmsg;
            document.getElementById("gender").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("genderalert").innerHTML = "";
            document.getElementById("gender").style.border = "none";
        }

        if(document.more.marry.value === "none"){
            document.getElementById("marryalert").innerHTML = alertmsg;
            document.getElementById("marry").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("marryalert").innerHTML = "";
            document.getElementById("marry").style.border = "none";
        }

        if(document.more.residential.value === ""){
            document.getElementById("homealert").innerHTML = alertmsg;
            document.getElementById("residential").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("homealert").innerHTML = "";
            document.getElementById("residential").style.border = "none";
        }

        if(document.more.rank.value === "none"){
            document.getElementById("rankalert").innerHTML = alertmsg;
            document.getElementById("rank").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("rankalert").innerHTML = "";
            document.getElementById("rank").style.border = "none";
        }

        if(document.more.confirmkey.value === ""){
            document.getElementById("confirmalert").innerHTML = alertmsg;
            document.getElementById("confirmkey").style.border = "2px solid red";
            event.preventDefault();
        }
        else if(document.more.confirmkey.value !== confirmkey3){  
            document.getElementById("confirmalert").innerHTML = confirmalert;
            document.getElementById("confirmkey").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("confirmalert").innerHTML = "";
            document.getElementById("confirmkey").style.border = "none";
        }
        
    }