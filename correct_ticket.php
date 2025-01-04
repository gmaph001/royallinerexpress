<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $billkey = [];
    $size = 0;

    $passkey = [];
    $firstname = [];
    $secondname = [];
    $lastname = [];
    $fare = [];
    $size2 = 0;

    $local = date_default_timezone_set('Africa/Nairobi');

    if($local){
        $date = date('Y-m-d');
        $todate = str_split($date);

        $day = "";

        for($i=0; $i<10; $i++){
            if($todate[$i] === "-"){
                continue;
            }
            else{
                $day .= $todate[$i];
            }
        }

        $today = intval($day);
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
                $rank = $row['rank'];

                if($rank === "manager"){
                    $query2 = "SELECT * FROM performance";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        for($k=0; $k<mysqli_num_rows($result2); $k++){
                            $row = mysqli_fetch_array($result2);
                            $date2 = $row['bill_date'];

                            $todate2 = str_split($date2);

                            $day2 = "";

                            for($j=0; $j<10; $j++){
                                if($todate2[$j] === "-"){
                                    continue;
                                }
                                else{
                                    $day2 .= $todate2[$j];
                                }
                            }

                            $theday = intval($day2);

                            if($theday === $today){
                                $billkey[$size] = $row['bill_key'];
                                $size++;
                            }
                        }
                    }
                }
                else{
                    $query2 = "SELECT * FROM performance";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        for($i=0; $i<mysqli_num_rows($result2); $i++){
                            $row = mysqli_fetch_array($result2);
                            $status = $row['financial_status'];

                            if($id === $row['user_ID'] && $status === "open"){
                                $billkey[$size] = $row['bill_key'];
                                $size++;
                            }
                        }
                    }
                }
            }
        }
    }

    for($j=0; $j<$size; $j++){
        $query3 = "SELECT * FROM passenger_info";
        $result3 = mysqli_query($db, $query3);

        if($result3){
            for($i=0; $i<mysqli_num_rows($result3); $i++){
                $row = mysqli_fetch_array($result3);

                if($billkey[$j] === $row['bill_id']){
                    $passkey[$size2] = $row['userkey'];
                    $firstname[$size2] = $row['firstname'];
                    $secondname[$size2] = $row['secondname'];
                    $lastname[$size2] = $row['lastname'];
                    $fare[$size2] = $row['fare'];
                    $size2++;
                }
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
    <link rel="stylesheet" type="text/css" href="css/correct_ticket.css">
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

                <?php
                    if($size2 == 0){
                        echo 
                            "
                                <div class='ticket'>
                                    <h1>The financial day has been closed, start the financial day by adding tickets!</h1>
                                </div>
                            ";
                    }
                    else{
                        for($k=$size2-1; $k>=0; $k--){
                            echo 
                                "
                                    <div class='ticket'>
                                        <h1>Ticket No: $passkey[$k]</h1>
                                        <form class='edit' action='update_ticket.php?id=$id&&no=$passkey[$k]' method='POST'>
                                            <div class='details'>
                                                <div class='inputs' id='fname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='firstname' id='fname' required='required' value='$firstname[$k]'>
                                                </div>
                                                <div class='inputs' id='sname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='secondname' id='sname' required='required' value='$secondname[$k]'>
                                                </div>
                                                <div class='inputs' id='lname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='lastname' id='lname' required='required' value='$lastname[$k]'>
                                                </div>
                                            </div>
                                            <div class='btns'>
                                                <button class='update' name='update'>Update</button>
                                                <a href='delete_ticket.php?id=$id&&no=$passkey[$k]' class='delete'>Delete</a>
                                            </div>
                                        </form>
                                    </div>
                                ";
                        }
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
</html>