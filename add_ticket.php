<?php
    require "connection.php";
    include "addr.php";

    $areas = [];
    $areas2 = [];
    $size = 0;
    $size2 = 0;
    $size3 = 0;
    $size4 = 0;
    $n = 0;

    $check = false;

    $query = "SELECT * FROM routes";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $areas[$size] = $row['departure'];
            $size++;
            $areas2[$size2] = $row['destination'];
            $size2++;
        }
    }

    for($i=0; $i<$size; $i++){
        if($i>0){
            for($j=0; $j<$size3; $j++){
                if($areas[$i] === $areas[$j]){
                    $check = true;
                }
            }
            if(!$check){
                $areas[$size3] = $areas[$i];
                $size3++;
            }
        }
        else{
            $areas[$size3] = $areas[$i];
            $size3++;
        }

        $check = false;
    }

    for($i=0; $i<$size2; $i++){
        if($i>0){
            for($j=0; $j<$size4; $j++){
                if($areas2[$i] === $areas2[$j]){
                    $check = true;
                }
            }
            if(!$check){
                $areas2[$size4] = $areas2[$i];
                $size4++;
            }
        }
        else{
            $areas2[$size4] = $areas2[$i];
            $size4++;
        }

        $check = false;
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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Ticket</title>
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
            <div class="intro" onscroll="vuta()">
                <div class="intro_cover">
                    <h1 class="intro_head">Travel Royally with Us!</h1>
                    <div class="safari">
                        <?php echo "<form action='admin_safari.php?id=$id' method='POST' name='safari' class='safari_form' enctype='multipart/form-data'>";?>
                            <div class="input">
                                <img src="media/icons/departures.png" class="icons">
                                <select name="depart" class="areas">
                                    <option value="none">Select departure</option>
                                    <?php 
                                        for($i=0; $i<$size3; $i++){
                                            echo 
                                                "
                                                    <option value='$areas[$i]'>$areas[$i]</option>
                                                ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <p class="alert" id="departalert"></p><br>
                            <div class="input">
                                <img src="media/icons/arrivals.png" class="icons">
                                <select name="destination" class="areas">
                                    <option value="none">Select destination</option>
                                    <?php 
                                        for($i=0; $i<$size4; $i++){
                                            echo 
                                                "
                                                    <option value='$areas2[$i]'>$areas2[$i]</option>
                                                ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <p class="alert" id="arrival_alert"></p><br>
                            <div class="input">
                                <img src="media/icons/calendar.png" class="icons">
                                <input type="date" class="date" name="date" onpointermove="tarehe()" onfocus="tarehe()">
                            </div>
                            <p class="alert" id="date_alert"></p><br>
                            <button onclick="hakiki()" name="confirm" class="hakiki">Search Bus</button>
                        </form>
                    </div>
                </div>
            </div>
        <div class="footer">
            <p>&copy; Royal Liner Express 2024.</p>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
<script src="js/add_ticket.js"></script>
</html>