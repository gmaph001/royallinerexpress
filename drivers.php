<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $bus_no = [];
    $size = 0;

    $leave = [];
    $size2 = 0;
    $arrive = [];
    $size3 = 0;

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

    $query2 = "SELECT * FROM bus_info";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            $bus_no[$size] = $row['bus_no'];
            $size++;
        }
    }

    $query3 = "SELECT * FROM routes";
    $result3 = mysqli_query($db, $query3);

    if($result3){
        for($i=0; $i<mysqli_num_rows($result3); $i++){
            $row = mysqli_fetch_array($result3);

            $leave[$size2] = $row['departure'];
            $size2++;
            $arrive[$size3] = $row['destination'];
            $size3++;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/driver.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Drivers</title>
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
                <div class="driver">
                    <div class="card">
                        <?php
                            echo 
                                "
                                    <form action='driver_sign.php?id=$id' method='POST' class='card-form'>
                                        <div class='inputs' id='uname1'>
                                            <img src='media/icons/account.png' class='icons'>
                                            <input type='text' name='username' id='uname' placeholder='Username'>
                                        </div>
                                        <p class='alert' id='useralert'></p>
                                        <div class='inputs' id='leave1'>
                                            <img src='media/icons/departures.png' class='icons'>
                                            <select name='depart' id='leave'>
                                                <option value='none'>Departure</option>
                                            ";
                                            for($i=$size2-1; $i>=0; $i--){
                                                echo 
                                                    "
                                                        <option value='$leave[$i]'>$leave[$i]</option>
                                                    ";
                                            }
                                                
                                         echo "       
                                            </select>
                                        </div>
                                        <p class='alert' id='leavealert'></p>
                                        <div class='inputs' id='arrive1'>
                                            <img src='media/icons/arrivals.png' class='icons'>
                                            <select name='arrival' id='arrive'>
                                                <option value='none'>Arrival</option>
                                                ";
                                            for($i=$size3-1; $i>=0; $i--){
                                                echo 
                                                    "
                                                        <option value='$arrive[$i]'>$arrive[$i]</option>
                                                    ";
                                            }
                                                
                                         echo " 
                                            </select>
                                        </div>
                                        <p class='alert' id='arrivealert'></p>
                                        <div class='inputs' id='bus1'>
                                            <img src='media/icons/arrivals.png' class='icons'>
                                            <select name='bus_no' id='bus'>
                                                <option value='none'>Bus No</option>
                                                ";
                                                for($i=$size-1; $i>=0; $i--){
                                                    echo 
                                                        "
                                                            <option value='$bus_no[$i]'>$bus_no[$i]</option>
                                                        ";
                                                }
                                                
                                         echo " 
                                            </select>
                                        </div>
                                        <p class='alert' id='busalert'></p>
                                        <button class='signoff' onclick='kagua()' name='signoff'>Sign Off</button>
                                    </form>
                                ";
                        ?>
                    </div>
                </div>

                <?php

                    if($rank === "manager"){
                        echo 
                            "
                                <a href='see_driver.php?id=$id' class='see'><img src='media/icons/steering-wheel.png' class='icons'></a>
                                <a href='add_driver.php?id=$id' class='plus'>+</a>
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
    let alertmsg = "*Please fill this field!*";


    function kagua(){
        if(document.getElementById("uname").value === ""){
            document.getElementById("useralert").innerHTML = alertmsg;
            document.getElementById("uname1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("useralert").innerHTML = "";
            document.getElementById("uname1").style.border = "none";
        }

        if(document.getElementById("leave").value === "none"){
            document.getElementById("leavealert").innerHTML = alertmsg;
            document.getElementById("leave1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("leavealert").innerHTML = "";
            document.getElementById("leave1").style.border = "none";
        }

        if(document.getElementById("leave").value === document.getElementById("arrive").value){
            alert("Destination cannot be equal to departure!");
            event.preventDefault();
        }

        if(document.getElementById("arrive").value === "none"){
            document.getElementById("arrivealert").innerHTML = alertmsg;
            document.getElementById("arrive1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("arrivealert").innerHTML = "";
            document.getElementById("arrive1").style.border = "none";
        }

        if(document.getElementById("bus").value === "none"){
            document.getElementById("busalert").innerHTML = alertmsg;
            document.getElementById("bus1").style.border = "3px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("busalert").innerHTML = "";
            document.getElementById("bus1").style.border = "none";
        }
    }
</script>
</html>