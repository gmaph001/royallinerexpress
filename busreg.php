<?php

    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Bus Register</title>
</head>
<body>
    <div class="body">
        <div class="form">
            <div class="intro">
                <img src="media/icons/logo.png" class="logo">
                <h1 class="heading">BUS REGISTRATION FORM</h1>
            </div>
            <?php echo "<form action='bus.php?id=$id' name='bus' enctype='multipart/form-data' method='POST'>";?>
                <div class="form-content">
                    <div class="left">
                        <div class="input">
                            <img src="media/icons/license-plate.png" class="icons">
                            <input type="text" name="bus_no" placeholder="Plate Number">
                        </div>
                        <p class="alert" id="bus_no"></p>
                        <div class="input">
                            <img src="media/icons/filled.png" class="icons">
                            <input type="number" name="seats" placeholder="Number of seats">
                        </div>
                        <p class="alert" id="seats"></p>
                        <div class="input">
                            <img src="media/icons/class.png" class="icons">
                            <input type="text" name="class" placeholder="Class">
                        </div>
                        <p class="alert" id="class"></p>
                        <div class="input">
                            <img src="media/icons/money.png" class="icons">
                            <input type="number" name="fare" placeholder="Bus Fare">
                        </div>
                        <p class="alert" id="fare"></p>
                        <div class="input">
                            <img src="media/icons/departures.png" class="icons">
                            <input type="text" name="from" placeholder="From">
                        </div>
                        <p class="alert" id="from"></p>
                        <div class="input">
                            <img src="media/icons/clock.png" class="icons">
                            <input type="number" name="eta" placeholder="Time taken in hrs">
                        </div>
                        <p class="alert" id="eta"></p>
                    </div>
                    <div class="center"></div>
                    <div class="left">
                        <h1>Choose the refreshments provided by the bus:</h1>
                        <div class="refreshments">
                            <div class="names">
                                <p>Azam</p>
                                <p>TV</p>
                                <p>Wi-Fi</p>
                                <p>Refreshments</p>
                                <p>Charging</p>
                                <p>Toilet</p>
                            </div>
                            <div class="choices">
                                <input type="checkbox" name="fresh1" class="option" value="azam" onclick="check(1)">
                                <input type="checkbox" name="fresh2" class="option" value="tv" onclick="check(2)">
                                <input type="checkbox" name="fresh3" class="option" value="wifi" onclick="check(3)">
                                <input type="checkbox" name="fresh4" class="option" value="refreshments" onclick="check(4)">
                                <input type="checkbox" name="fresh5" class="option" value="charging" onclick="check(5)">
                                <input type="checkbox" name="fresh6" class="option" value="toilet" onclick="check(6)">
                            </div>
                        </div>
                        <p class="alert" id="refreshments"></p>
                        <div class="input">
                            <img src="media/icons/arrivals.png" class="icons">
                            <input type="text" name="to" placeholder="To">
                        </div>
                        <p class="alert" id="to"></p>
                    </div>
                </div>
                <button onclick="sajili()" name="register" class="register">Register Bus</button>
            </form>
        </div>
    </div>
</body>
<script>

    let a = 0;
    let b = 0;
    let arr = [];

    function even(a){
        if(a == 0 || a%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function check(value){
        a++;
        
        arr[b] = value;
        b++;
    }

    if(b>2){
        for(let j=0; j<b-1; j++){
            let min = j;

            for(let k=j+1; k<5; k++){
                if(arr[min]>=arr[k]){     
                    let temp;
                    temp = arr[k];
                    arr[k] = arr[min];
                    arr[min] = temp;
                }  
            }
        }
    }

    function sajili(){

        let prompt = "*Please fill this field!*";

        if(document.bus.bus_no.value == ""){
            document.getElementById("bus_no").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.seats.value == ""){
            document.getElementById("seats").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.class.value == ""){
            document.getElementById("class").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.fare.value == ""){
            document.getElementById("fare").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.from.value == ""){
            document.getElementById("from").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.to.value == ""){
            document.getElementById("to").innerHTML = prompt;
            event.preventDefault()
        }
        if(document.bus.eta.value == ""){
            document.getElementById("eta").innerHTML = prompt;
            event.preventDefault()
        }

    }
</script>
</html>