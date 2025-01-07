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
    <title>ROYAL LINER | Route register</title>
</head>
<body>
    <div class="body">
        <div class="form">
            <div class="intro">
                <img src="media/icons/logo.png" class="logo">
                <h1 class="heading">ROUTE REGISTRATION FORM</h1>
            </div>
            <?php echo "<form action='route.php?id=$id' method='POST' enctype='multipart/form-data'>";?>
                <div class="form-content" name="route">
                    <div class="input" name="input">
                        <img src="media/icons/departures.png" class="icons">
                        <input type="text" name="from" id="from" placeholder="From">
                    </div>
                    <div class="input" name="input">
                        <img src="media/icons/arrivals.png" class="icons">
                        <input type="text" name="to" id="to" placeholder="To">
                    </div>
                    <div class="input" name="input">
                        <img src="media/icons/clock.png" class="icons">
                        <input type="number" name="eta" id="eta" placeholder="Time taken in hrs">
                    </div>
                </div>
                <button onclick="sajili()" name="register_route" class="register">Register Route</button>
            </form>
        </div>
    </div>
</body>
<script>
    
    function sajili(){
        if(document.getElementById("from").value === ""){
            alert("Please input your departure area!");
            event.preventDefault();
        }

        if(document.getElementById("to").value === ""){
            alert("Please input your destination!");
            event.preventDefault();
        }

        if(document.getElementById("eta").value === ""){
            alert("Please input your eta!");
            event.preventDefault();
        }
    }

</script>
</html>