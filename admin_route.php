<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $todate = "";
    $op_day = "";

    $route_ID = [];
    $departure = [];
    $arrival = [];
    $size = 0;

    $route_no = [];
    $bus_no = [];
    $available = [];
    $fare = [];
    $siku = [];
    $size2 = 0;

    $local = date_default_timezone_set('Africa/Nairobi');

    if($local){
        $date = date('Y-m-d');

        $date = str_split($date);

        for($i=0; $i<10; $i++){
            if($date[$i] === "-"){
                continue;
            }
            else{
                $todate .= $date[$i];
            }
        }

        $today = intval($todate);
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                $photo = $row['photo'];
                $rank = $row['rank'];
            }
        }
    }

    $query2 = "SELECT * FROM routes";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            $route_ID[$size] = $row['route_ID'];
            $departure[$size] = $row['departure'];
            $arrival[$size] = $row['destination'];
            $eta[$size] = $row['eta'];

            $size++;
        }
    }

    $query3 = "SELECT * FROM bus_info";
    $result3 = mysqli_query($db, $query3);

    if($result3){
        for($i=0; $i<mysqli_num_rows($result3); $i++){
            $row = mysqli_fetch_array($result3);

            $route_no[$size2] = $row['route_ID'];
            $bus_no[$size2] = $row['bus_no'];
            $fare[$size2] = $row['fare'];
            $siku[$size2] = $row['op_date'];
            $available[$size2] = $row['seats']-$row['filled'];
            $size2++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/admin_route.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Routes</title>
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
                
                    <?php
                        for($i=$size-1; $i>=0; $i--){
                            echo 
                                "
                                    <div class='routes-collection'>
                                        <div class='route'>
                                            <div class='info'>
                                                <p class='area'>$departure[$i]</p>
                                                <p>To</p>
                                                <p class='area'>$arrival[$i]</p>
                                                <p class='time'>ETA: $eta[$i]hrs</p>
                                            </div>
                                        </div>
                                        <div class='show' onclick='show($i)' id='show$i'>
                                            <img src='media/icons/right-arrow.png' class='arrow' id='arrow$i'>
                                        </div>
                                        <div class='buses' id='$i'>";
                                        for($j=$size2-1; $j>=0; $j--){
                                            if($route_no[$j] === $route_ID[$i]){

                                                $op_date = str_split($siku[$j]);

                                                for($k=0; $k<10; $k++){
                                                    if($op_date[$k] === "-"){
                                                        continue;
                                                    }
                                                    else{
                                                        $op_day .= $op_date[$k];
                                                    }
                                                }

                                                $opdate = intval($op_day);

                                                if($today >= $opdate){
                                                    echo 
                                                        "
                                                            <div class='bus'>
                                                                <img src='media/icons/bus.png' class='bus-icon'>
                                                                <p>Bus No: $bus_no[$j]</p>
                                                                <p>Fare: $fare[$j]</p>
                                                                <p>Available seats: $available[$j]</p>
                                                            </div>
                                                        ";
                                                }

                                                $op_day = "";
                                                
                                            }
                                        }
                                        echo "
                                        </div>
                                    </div>
                                ";
                        }

                        if($rank === "manager"){
                            echo 
                                "
                                    <a href='buses.php?id=$id' class='see'><img src='media/icons/bus.png' class='icons'></a>
                                    <a href='routereg.php?id=$id' class='plus'>+</a>
                                ";
                        }
                    ?>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>    
</body>
<script src="js/admin_navBar.js"></script>
<script>

    let a = 0;

    function even(n){
        if(n%2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function show(value){
        let buses = document.getElementById(value);
        let arrow = document.getElementById("arrow"+value);
        let show = document.getElementById("show"+value);

        a++;

        if(even(a)){
            buses.style.display = "none";
            show.style.backgroundColor = "rgb(255, 102, 0)";
            show.style.borderRadius = "0px 0px 10px 10px";
            arrow.style.transform = "rotate(90deg)";
        }
        else{
            buses.style.display = "flex";
            show.style.backgroundColor = "rgb(227, 142, 255)";
            show.style.borderRadius = "0px";
            arrow.style.transform = "rotate(270deg)";
        }

    }

</script>
</html>