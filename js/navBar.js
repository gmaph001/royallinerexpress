let menubtn = document.querySelector('.menu_icon');
let menu1 = document.querySelector('.horizontal_menu');
let menu2 = document.querySelector('.vertical_menu');

let a = 0;

function Iseven(a){
    if(a%2 == 0){
        return true;
    }
    else{
        return false;
    }
}

menubtn.addEventListener('click', function(){
    menu2.classList.toggle('open');
    menubtn.src = "media/icons/close.png";
    a++;

    if(Iseven(a)){
        menubtn.src = "media/icons/menu.png";
    }
    else{
        menubtn.src = "media/icons/close.png";
    }

})