<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $sold = 0;
    $income = 0;
    $corrected = 0;
    $billday = "";
    $today = "";

    $local = date_default_timezone_set('Africa/Nairobi');

    if($local){
        $date = date('Y-m-d');
        $day = str_split($date);
    }

    for($i=0; $i<10; $i++){
        if($day[$i] === "-"){
            continue;
        }
        else{
            $today .= $day[$i];
        }
    }

    $todate = intval($today);

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
                        for($i=0; $i<mysqli_num_rows($result2); $i++){
                            $row = mysqli_fetch_array($result2);

                            $billdate = $row['bill_date'];

                            $bill_day = str_split($billdate);

                            for($j=0; $j<10; $j++){
                                if($bill_day[$j] === "-"){
                                    continue;
                                }
                                else{
                                    $billday .= $bill_day[$j];
                                }
                            }

                            $bill_date = intval($billday);
                            $billday = "";

                            if($bill_date === $todate){
                                $sold += $row['tickets'];
                                $income += $row['income'];

                                if($row['status'] === "corrected"){
                                    $corrected += $row['no_edited'];
                                }
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

                            if($id === $row['user_ID'] && $row['financial_status'] === "open"){
                                $sold += $row['tickets'];
                                $income += $row['income'];

                                if($row['status'] === "corrected"){
                                    $corrected += $row['no_edited'];
                                }
                            }
                        }
                    }
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
                <div class="middle">
                    <div class="closing-cluster">
                        <div class="closing">
                            <?php
                                echo 
                                    "
                                        <a href='add_ticket.php?id=$id' class='btn'>Add Ticket(s)</a>
                                    ";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="top">
                    <div class="ticket-btns">
                        <?php
                            echo
                                "
                                    <a href='correct_ticket.php?id=$id' class='btn'>Correct Ticket(s)</a>
                                    <a href='close_ticket.php?id=$id' class='btn'>Close Finance</a>
                                ";
                        ?>
                    </div>
                </div>
                <div class="bottom">
                    <h1>YOUR STATISTICS</h1>
                    <div class="ticket-stats">
                        <div class="stat">
                            <p class="stat-title">
                                Sold
                            </p>
                            <p class="stat-no">
                                <?php echo $sold; ?>
                            </p>
                        </div>
                        <div class="stat">
                            <p class="stat-title">
                                Corrected
                            </p>
                            <p class="stat-no">
                            <?php echo $corrected; ?>
                            </p>
                        </div>
                        <div class="stat">
                            <p class="stat-title">
                                Income
                            </p>
                            <p class="stat-no">
                                <?php echo $income; ?>
                            </p>
                        </div>
                    </div>
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