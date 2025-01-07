<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $no = $_GET['no'];

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

    $query2 = "SELECT * FROM bus_info";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($no === $row['bus_no']){
                $fare = $row['fare'];
                $route_ID = $row['route_ID'];
                $availability = $row['status'];
                $position = $row['position'];
            }
        }
    }

    $query3 = "SELECT * FROM routes";
    $result3 = mysqli_query($db, $query3);

    if($result3){
        for($i=0; $i<mysqli_num_rows($result3); $i++){
            $row = mysqli_fetch_array($result3);

            if($route_ID === $row['route_ID']){
                $departure = $row['departure'];
                $arrival = $row['destination'];
                $eta = $row['eta'];
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
    <link rel="stylesheet" type="text/css" href="css/account.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Home</title>
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
                <div class="profile">
                    <center>
                    <div class="profile-info">
                        <?php
                            echo 
                                "
                                    <form action='profile_info_bus.php?id=$id&&no=$no' name='prof_info' enctype='multipart/form-data' method='POST'>
                                        <h1>Bus NO: $no</h1>
                                        <div class='input-grp' name='input'>
                                            <div class='left' name='cluster'>
                                                <div class='inputs' id='fname1'>
                                                    <img src='media/icons/departures.png' class='icons'>
                                                    <input type='text' name='from' id='fname' value='$departure'>
                                                </div>
                                                <p class='alert' id='firstalert'></p>
                                                <div class='inputs' id='sname1'>
                                                    <img src='media/icons/arrivals.png' class='icons'>
                                                    <input type='text' name='to' id='sname' value='$arrival'>
                                                </div>
                                                <p class='alert' id='secondalert'></p>
                                                <div class='inputs' id='lname1'>
                                                    <img src='media/icons/clock.png' class='icons'>
                                                    <input type='text' name='eta' id='lname' value='$eta'>
                                                </div>
                                                <p class='alert' id='thirdalert'></p>
                                            </div>
                                            <div class='left' name='cluster'>
                                                <div class='inputs' id='phone1'>
                                                    <img src='media/icons/money.png' class='icons'>
                                                    <input type='number' name='fare' id='number' value='$fare'>
                                                </div>
                                                <p class='alert' id='phonealert'></p>
                                                <div class='inputs' id='licence1'>
                                                    <img src='media/icons/home.png' class='icons'>
                                                    <input type='text' name='position' id='licence_no' value='$position'>
                                                </div>
                                                <p class='alert' id='licencealert'></p>
                                                <div class='inputs' id='marry1'>
                                                    <img src='media/icons/marital-status.png' class='icons'>
                                                    <p style='font-size: 14pt; width:50%; margin-left: 10px; font-weight: bold;'>$availability</p>
                                                    <select name='status' id='marriage'>
                                                        <option value='none'>Change</option>
                                                        <option value='available'>available</option>
                                                        <option value='not available'>not available</option>
                                                    </select>
                                                </div>
                                                <p class='alert' id='marryalert'></p>
                                            </div>
                                        </div>  
                                        <center><button onclick='info()' class='info-button' name='sub_info'>Change Info</button></center>
                                    </form>
                                ";
                        ?>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
<script>
    

    let alertmsg = "*Please, choose photo!*";
    let infoalert = "*Please fill this field!*";
    let phonealert = "*Please enter correct phone number!*";
    let passalert = "*Your password must contain at least 9 characters!*";
    let confirmalert = "*You have confirmed your password incorrectly!*";

    let hide1 = document.querySelector('.hide1');
    let hide2 = document.querySelector('.hide2');
    let hide3 = document.querySelector('.hide3');

    let a = 0;
    let b = 0;
    let c = 0;

    function info(){
        if(document.getElementById("fname").value === ""){
            document.getElementById("firstalert").innerHTML = infoalert;
            document.getElementById("fname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("firstalert").innerHTML = "";
            document.getElementById("fname1").style.border = "none";
        }

        if(document.getElementById("sname").value === ""){
            document.getElementById("secondalert").innerHTML = infoalert;
            document.getElementById("sname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("secondalert").innerHTML = "";
            document.getElementById("sname1").style.border = "none";
        }

        if(document.getElementById("fname").value === document.getElementById("sname").value){
            alert("Departure must not be equal to destination!");
            event.preventDefault();
        }

        if(document.getElementById("lname").value === ""){
            document.getElementById("thirdalert").innerHTML = infoalert;
            document.getElementById("lname1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("thirdalert").innerHTML = "";
            document.getElementById("lname1").style.border = "none";
        }

        if(document.getElementById("number").value === ""){
            document.getElementById("phonealert").innerHTML = infoalert;
            document.getElementById("phone1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("phonealert").innerHTML = "";
            document.getElementById("phone1").style.border = "none";
        }

        if(document.getElementById("marriage").value === "none"){
            document.getElementById("marryalert").innerHTML = infoalert;
            document.getElementById("marry1").style.border = "3px solid blue";
            event.preventDefault();
        }
        else{
            document.getElementById("marryalert").innerHTML = "";
            document.getElementById("marry1").style.border = "none";
        }
    }
</script>
</html>