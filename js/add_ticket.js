let departalert = "*Please choose your departing point!*";
let arrivalalert = "*Please choose your destination!*";
let datealert = "*Please choose the date of your journey!*";

function tarehe(){
    let today = new Date();
    
    let leo = today.toISOString().split('T')[0];
    console.log(leo);

    document.safari.date.value = leo;
}

function hakiki(){
    if(document.safari.depart.value === "none"){
        document.getElementById("departalert").innerHTML = departalert;
        event.preventDefault();
    }
    if(document.safari.destination.value === "none"){
        document.getElementById("arrival_alert").innerHTML = arrivalalert;
        event.preventDefault();
    }
    if(document.safari.date.value === ""){
        document.getElementById("date_alert").innerHTML = datealert;
        event.preventDefault();
    }
    if(document.safari.destination.value === document.safari.depart.value){
        alert("Destination cannot be the same as departure!");
        event.preventDefault();
    }
}