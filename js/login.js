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
        window.location.href = "forget.php";
    })