<?php
    require "connection.php";
    include "addr.php";

    $departure = $_GET['from'];
    $destination = $_GET['to'];
    $date = $_GET['date'];
    $id = $_GET['id'];

    $date2 = str_split($date);
    $day = "";
    $day2 = "";

    for($i=0; $i<10; $i++){
        if($date2[$i] === "-"){
            continue;
        }
        else{
            $day.= $date2[$i];
        }
    }

    $day = intval($day);
    
    $route_ID;

    $bus_no = [];
    $class = [];
    $fare = [];
    $seats = [];
    $eta = [];
    $size = 0;
    

    $siti = 0;

    $query = "SELECT * FROM bus_info";
    $result = mysqli_query($db, $query);

    $query2 = "SELECT * FROM routes";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($departure === $row['departure'] && $destination === $row['destination']){
                $route_ID = $row['route_ID'];
            }
        }
    }

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $date3 = str_split($row['op_date']);

            for($j=0; $j<10; $j++){
                if($date3[$j] === "-"){
                    continue;
                }
                else{
                    $day2.= $date3[$j];
                }
            }

            $day2 = intval($day2);

            if($route_ID === $row['route_ID'] && $departure === $row['position'] && $day>=$day2 && $row['status'] === "available"){
                $bus_no[$size] = $row['bus_no'];
                $fare[$size] = $row['fare'];
                $class[$size] = $row['class'];
                $seats[$size] = $row['seats']-$row['filled'];

                $querytime = "SELECT * FROM routes";
                $resulttime = mysqli_query($db, $querytime);

                if($resulttime){
                    for($i=0; $i<mysqli_num_rows($resulttime); $i++){
                        $row = mysqli_fetch_array($resulttime);

                        if($route_ID === $row['route_ID']){
                            $eta[$size] = $row['eta'];
                        }
                    }
                }

                $size++;
            }

            $day2 = "";
        }
    }

    include "connection.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/admin_tickets.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Tickets</title>
</head>
<body>
    <div class="main">
        <div class="sidebar-all">
            <div class="main-cluster">
                <?php echo "<iframe src='sidebar.php?id=$id' class='sidebar'></iframe>";?>
                <img src="media/icons/close.png" class="icons head">
            </div>
        </div>
        <div class="body">
            <div class="navigation">
                <img src="media/icons/menu.png" class="icons menu">
                <h1>ROYAL LINER EXPRESS</h1>
                <div class="horizontal_menu">
                    <?php
                        echo 
                            "
                                <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'><p>1</p></a>
                                <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                            ";
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="routes">
                    <?php
                        if($size == 0){
                            echo 
                                "
                                    <div class='bus'>
                                        <div class='bus_info'>
                                            <p style='font-size: 18pt;'><b>No buses available!</b></p>
                                        </div>
                                    </div><br><br><br>
                                ";
                        }
                        else{
                            for($i=0; $i<$size; $i++){
                                echo 
                                    "
                                        <div class='bus'>
                                            <img src='media/icons/bus.png' class='bus_icon'>
                                            <div class='center'></div>
                                            <div class='bus_info'>
                                                <div class='bus_top'>
                                                    <p class='bus_name'>ROYAL LINER EXPRESS</p>
                                                    <p class='bus_no'>Plate no: $bus_no[$i]</p>
                                                    <p class='class'>Class: $class[$i]</p>
                                                    <p><b> Tshs. $fare[$i]</b></p>
                                                </div>
                                                <div class='bus_bottom'>
                                                    <p class='area'>From: $departure</p>
                                                    <p class='via'>$eta[$i] Hrs</p>
                                                    <p class='area'>To: $destination</p>
                                                </div>
                                                <div class='amenities'>";

                                                $query3 = "SELECT * FROM bus_info";
                                                $result3 = mysqli_query($db, $query3);

                                                if($result3){
                                                    for($j=0; $j<mysqli_num_rows($result3); $j++){
                                                        $row = mysqli_fetch_array($result3);

                                                        if($row['bus_no'] === $bus_no[$i]){
                                                            if($row['wifi'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/wifi.png' class='lux'>
                                                                            <p class='luxname'>Wi-Fi</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                            if($row['tv'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/tv.png' class='lux'>
                                                                            <p class='luxname'>TV</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                            if($row['azam'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/azam.png' class='lux azam'>
                                                                            <p class='luxname'>Azam</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                            if($row['refreshments'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/refreshment.png' class='lux'>
                                                                            <p class='luxname'>Refreshment</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                            if($row['toilet'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/toilet.png' class='lux'>
                                                                            <p class='luxname'>Toilet</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                            if($row['charging'] === "available"){
                                                                echo 
                                                                    "
                                                                        <div class='extra'>
                                                                            <img src='media/icons/charging.png' class='lux'>
                                                                            <p class='luxname'>Charging</p>
                                                                        </div>
                                                                    ";
                                                            }
                                                        }
                                                    }
                                                }                                    
                                                    
                                                echo "
                                                </div>
                                            </div>
                                            <div class='center'></div>
                                            <div class='seats'>
                                                <p class='available'>$seats[$i] Seats available</p>
                                                <img src='media/icons/filled.png' class='seat_icon'>
                                                <a href='admin_seat.php?id=$id&&from=$departure&&to=$destination&&date=$date&&bus=$bus_no[$i]' class='select'>Select seat(s)</a>
                                            </div>
                                        </div>
                                    ";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
</html>