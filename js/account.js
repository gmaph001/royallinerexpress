

    let alertmsg = "*Please, choose photo!*";
    let infoalert = "*Please fill this field!*";
    let phonealert = "*Please enter correct phone number!*";
    let passalert = "*Your password must contain at least 9 characters!*";
    let confirmalert = "*You have confirmed your password incorrectly!*";

    let hide1 = document.querySelector('.hide1');
    let hide2 = document.querySelector('.hide2');
    let hide3 = document.querySelector('.hide3');

    let a = 0;
    let b = 0;
    let c = 0;

    function even(n){
        if(n%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function fichua(value){
        if(value == 1){
            a++;

            if(even(a)){
                hide1.src = "media/icons/hide.png";
                document.getElementById("pword").setAttribute('type', 'password');
            }
            else{
                hide1.src = "media/icons/show.png";
                document.getElementById("pword").setAttribute('type', 'text');
            }
        }
        else if(value == 2){
            b++;

            if(even(b)){
                hide2.src = "media/icons/hide.png";
                document.getElementById("nword").setAttribute('type', 'password');
            }
            else{
                hide2.src = "media/icons/show.png";
                document.getElementById("nword").setAttribute('type', 'text');
            }
        }
        else if(value == 3){
            c++;

            if(even(c)){
                hide3.src = "media/icons/hide.png";
                document.getElementById("cword").setAttribute('type', 'password');
            }
            else{
                hide3.src = "media/icons/show.png";
                document.getElementById("cword").setAttribute('type', 'text');
            }
        }
    }

    function ulinzi(){
        if(document.getElementById("pword").value === ""){
            document.getElementById("palert").innerHTML = infoalert;
            document.getElementById("pword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("pword").value.length < 9){
            document.getElementById("palert").innerHTML = passalert;
            document.getElementById("pword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("palert").innerHTML = "";
            document.getElementById("pword1").style.border = "none";
        }

        if(document.getElementById("nword").value === ""){
            document.getElementById("nalert").innerHTML = infoalert;
            document.getElementById("nword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("nword").value.length < 9){
            document.getElementById("nalert").innerHTML = passalert;
            document.getElementById("nword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("nalert").innerHTML = "";
            document.getElementById("nword1").style.border = "none";
        }

        if(document.getElementById("cword").value === ""){
            document.getElementById("calert").innerHTML = infoalert;
            document.getElementById("cword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("cword").value.length < 9){
            document.getElementById("calert").innerHTML = passalert;
            document.getElementById("cword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("cword").value !== document.getElementById("nword").value){
            document.getElementById("calert").innerHTML = confirmalert;
            document.getElementById("cword1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("calert").innerHTML = "";
            document.getElementById("cword1").style.border = "none";
        }
    }

    function photog(){
        if(document.getElementById("pic").value === ""){
            document.getElementById("photoalert").innerHTML = alertmsg;
            event.preventDefault();
        }
    }

    function info(){
        if(document.getElementById("fname").value === ""){
            document.getElementById("firstalert").innerHTML = infoalert;
            document.getElementById("fname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("firstalert").innerHTML = "";
            document.getElementById("fname1").style.border = "none";
        }

        if(document.getElementById("sname").value === ""){
            document.getElementById("secondalert").innerHTML = infoalert;
            document.getElementById("sname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("secondalert").innerHTML = "";
            document.getElementById("sname1").style.border = "none";
        }

        if(document.getElementById("lname").value === ""){
            document.getElementById("thirdalert").innerHTML = infoalert;
            document.getElementById("lname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("thirdalert").innerHTML = "";
            document.getElementById("lname1").style.border = "none";
        }

        if(document.getElementById("birth").value === ""){
            document.getElementById("birthalert").innerHTML = infoalert;
            document.getElementById("birth1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("birthalert").innerHTML = "";
            document.getElementById("birth1").style.border = "none";
        }

        if(document.getElementById("number").value === ""){
            document.getElementById("phonealert").innerHTML = infoalert;
            document.getElementById("phone1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else if(document.getElementById("number").value.length !== 10 || isNaN(document.prof_info.phone.value)){
            document.getElementById("phonealert").innerHTML = phonealert;
            document.getElementById("phone1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("phonealert").innerHTML = "";
            document.getElementById("phone1").style.border = "none";
        }

        if(document.getElementById("marriage").value === "none"){
            document.getElementById("marryalert").innerHTML = infoalert;
            document.getElementById("marry1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("marryalert").innerHTML = "";
            document.getElementById("marry1").style.border = "none";
        }

        if(document.getElementById("home").value === ""){
            document.getElementById("homealert").innerHTML = infoalert;
            document.getElementById("home1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("homealert").innerHTML = "";
            document.getElementById("home1").style.border = "none";
        }

        if(document.getElementById("user").value === ""){
            document.getElementById("useralert").innerHTML = infoalert;
            document.getElementById("user1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("useralert").innerHTML = "";
            document.getElementById("user1").style.border = "none";
        }

        if(document.getElementById("mail").value === ""){
            document.getElementById("emailalert").innerHTML = infoalert;
            document.getElementById("email1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("emailalert").innerHTML = "";
            document.getElementById("email1").style.border = "none";
        }
    }