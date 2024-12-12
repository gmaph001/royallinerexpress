let expose = document.querySelector('.expose');
let chosen = document.querySelector('.chosen');

let b = 0;
let seat = [];
let size = 0;
let c = 0;

function Iseven(a){
    if(a%2 == 0){
        return true;
    }
    else{
        return false;
    }
}

function choose(value){
       
    seat[size] = value;
    size++;

    for(let i=0; i<size; i++){
        if(seat[i] === value){
            b++;
        }
    }

    if(Iseven(b)){
        document.getElementById(value).src = "media/icons/available.png";
    }
    else{
        document.getElementById(value).src = "media/icons/chosen.png";
    }
    
    b = 0;
    
}

expose.addEventListener('click', function(){
    chosen.classList.toggle('open');

    for(let j=0; j<size; j++){
        let min = j;
        for(let w=j+1; w<size; w++){
            if(seat[j] == seat[w]){
                seat[w] = 0;
                c++;
            }
        }
        if(!Iseven(c)){
            for(let d=0; d<size; d++){
                if(seat[min] == seat[d]){
                    for(let e=d+1; e<size; e++){
                        seat[e-1] = seat[e];
                    }
                    size--;
                }
            }
        }
        c = 0;
    }

    for(let k=0; k<size; k++){
        if(seat[k] == 0){
            continue;
        }
        else{
            document.getElementById("seats").innerHTML += seat[k] + " ";
        }
    }
})

function reg(){
    if(document.chosen.seats.value == ""){
        alert("Please choose seats!");
        event.preventDefault();
    }
}