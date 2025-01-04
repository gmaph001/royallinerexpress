let menubtn = document.querySelector('.menu');
    let closebtn = document.querySelector('.head');
    let sidebar = document.querySelector('.sidebar-all');
    let body = document.querySelector('.body');
    let navigation = document.querySelector('.navigation');
    let notification = document.querySelector('.notification');
    let notify = document.querySelector('.notify');

    menubtn.addEventListener('click', function(){
        sidebar.style.display = "block";
    })

    closebtn.addEventListener('click', function(){
        sidebar.style.display = "none";
        menubtn.style.display = "block";
        body.setAttribute('class', 'body');
    })

    function Iseven(n){
        if(n%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function notifyfunc(value){

        if(Iseven(value)){
            notify.src = "media/icons/bell.png";
        }
        else{
            notify.src = "media/icons/notification.png";
        }
    }