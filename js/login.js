    let signup = document.querySelector('.card2');
    let signupbtn = document.querySelector('.signup-initiate');
    let login = document.querySelector('.card1');
    let login2 = document.querySelector('.login');
    let loginbtn = document.querySelector('.login-initiate');

    let forget = document.querySelector('.forget');

    let a = 0;
    let b = 0;
    let c = 0;

    let show1 = document.querySelector('.show1');
    let show2 = document.querySelector('.show2');
    let show3 = document.querySelector('.show3');
    let p1 = document.getElementById('pwd');
    let p2 = document.getElementById("pwd1");
    let p3 = document.getElementById("pwd2");

    function isEven(n){
        if(n%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    signupbtn.addEventListener('click', function(){
        signup.setAttribute('class', 'signup');
        login.style.display = "none";
    })

    loginbtn.addEventListener('click', function(){
        login.style.display = "block";
        login.setAttribute('class', 'login');
        signup.setAttribute('class', 'card2');
    })

    show1.addEventListener('click', function(){
        a++;

        if(isEven(a)){
            p1.setAttribute('type', 'password');
            show1.src = "media/icons/hide.png";
        }
        else{
            p1.setAttribute('type', 'text');
            show1.src = "media/icons/show.png";
        }
    })

    show2.addEventListener('click', function(){
        b++;

        if(isEven(b)){
            p2.setAttribute('type', 'password');
            show2.src = "media/icons/hide.png";
        }
        else{
            p2.setAttribute('type', 'text');
            show2.src = "media/icons/show.png";
        }
    })

    show3.addEventListener('click', function(){
        c++;

        if(isEven(c)){
            p3.setAttribute('type', 'password');
            show3.src = "media/icons/hide.png";
        }
        else{
            p3.setAttribute('type', 'text');
            show3.src = "media/icons/show.png";
        }
    })

    forget.addEventListener('click', function(){
        window.location.href = "forget.html";
    })

    let alertmsg = "*Please fill in this field!*";
    let passmsg = "*Characters like ' = ; : and quotes are not allowed!*";
    let passalert = "*Your password must be 9 characters long!*";
    let passalert2 = "*Password confirmed is not equal to password entered!*";

    

    // let size = sizeof(val2)/sizeof(val2[0]);

    // console.log(size);


    function donot(){
        let val = document.getElementById("user_name").value;

        let val2 = val.split("");

        let size = val2.length;

        for(let i=0; i<size; i++){
            if(val2[i] === ";" || val2[i] === '"' || val2[i] === ":" || val2[i] === "=" || val2[i] === "'"){
                document.getElementById("useralert").innerHTML = passmsg;
                document.getElementById("user").style.border = "3px solid red";

                return true;
            }
        }
    }

    function donot2(){
        let val = document.getElementById("pwd").value;

        let val2 = val.split("");

        let size = val2.length;

        for(let i=0; i<size; i++){
            if(val2[i] === ";" || val2[i] === '"' || val2[i] === ":" || val2[i] === "=" || val2[i] === "'"){
                document.getElementById("passalert").innerHTML = passmsg;
                document.getElementById("pass").style.border = "3px solid red";

                return true;
            }
        }
    }

    function ingia(){
        if(document.getElementById("user_name").value === ""){
            document.getElementById("useralert").innerHTML = alertmsg;
            document.getElementById("user").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(donot()){
            document.getElementById("useralert").innerHTML = passmsg;
            document.getElementById("user").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("user").style.border = "none";
            document.getElementById("useralert").innerHTML = "";
        }

        if(document.getElementById("pwd").value === ""){
            document.getElementById("passalert").innerHTML = alertmsg;
            document.getElementById("pass").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(donot2()){
            document.getElementById("passalert").innerHTML = passmsg;
            document.getElementById("pass").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("pass").style.border = "none";
            document.getElementById("passalert").innerHTML = "";
        }

    }

    function unda(){
        if(document.getElementById("username1").value === ""){
            document.getElementById("useralert2").innerHTML = alertmsg;
            document.getElementById("user2").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("user2").style.border = "none";
            document.getElementById("useralert2").innerHTML = "";
        }

        if(document.signup.email.value === ""){
            document.getElementById("emailalert").innerHTML = alertmsg;
            document.getElementById("email").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("emailalert").innerHTML = "";
            document.getElementById("email").style.border = "none";
        }

        if(document.getElementById("pwd1").value === ""){
            document.getElementById("passalert2").innerHTML = alertmsg;
            document.getElementById("pass2").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("pwd1").value.length < 9){
            document.getElementById("passalert2").innerHTML = passalert;
            document.getElementById("pass2").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("pass2").style.border = "none";
            document.getElementById("passalert2").innerHTML = "";
        }

        if(document.getElementById("pwd2").value === ""){
            document.getElementById("passalert3").innerHTML = alertmsg;
            document.getElementById("pass3").style.border = "3px solid red";
            event.preventDefault();
        }
        else if(document.getElementById("pwd1").value !== document.getElementById("pwd2").value){
            document.getElementById("passalert3").innerHTML = passalert2;
            document.getElementById("pass3").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("pass3").style.border = "none";
            document.getElementById("passalert3").innerHTML = "";
        }
    }