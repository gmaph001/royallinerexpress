let drop = document.querySelector('.dropdown_btn');
    let btn = document.querySelector('.drop');
    let menu = document.querySelector('.dropdown_menu');
    let a = 0;

    function isEven(n){
        if(n%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    drop.addEventListener('click', function(){
        a++;

        if(isEven(a)){
            menu.setAttribute('class', 'dropdown_menu');
            btn.style.transform = "rotate(0deg)";
        }
        else{
            menu.setAttribute('class', 'vertical_menu');
            btn.style.transform = "rotate(180deg)";
        }
    })