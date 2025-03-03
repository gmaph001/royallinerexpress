<?php

    require "connection.php";
    require "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
                $rank = $row['rank'];
                $notification = $row['unread'];
            }
        }
    }

    $query2 = "SELECT * FROM bill_notification";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($key === $row['notify_ID']){
                $billkey = $row['bill_key'];
                $name = $row['bill_name'];
                $method = $row['method'];
                $number = $row['account_no'];
                $bill = $row['bill'];
                $date = $row['bill_date'];
                $time = $row['bill_time'];
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
    <link rel="stylesheet" type="text/css" href="css/notification.css">
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
                        if($notification == 0){
                            echo 
                                "
                                    <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'></a>
                                    <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                    <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                                ";
                        }
                        else{
                            echo 
                                "
                                    <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'><p>$notification</p></a>
                                    <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                    <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                                ";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="notify-sidebar">
                    <div class="title">
                        <h1>Notification</h1>
                    </div>
                    <div class='notify-sidebar-body'>
                    <?php
                        echo 
                            "
                                <a class='notify-sidebar-header' href='notifications.php?id=$id'>Ticket Mails</a>
                                <a class='notify-sidebar-header'>Agent Mails</a>
                                <a class='notify-sidebar-header'>Main Ag. Mails</a>
                                <a class='notify-sidebar-header'>CEO Mails</a>
                            ";
                    ?>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="dropdown_btn">
                        <img src="media/icons/dropdown.png" class="drop">
                    </div>
                    <div class="dropdown_menu">
                        <?php
                            echo 
                                "
                                    <a class='notify-sidebar-header' href='notifications.php?id=$id'>Ticket Mails</a>
                                    <a class='notify-sidebar-header'>Agent Mails</a>
                                    <a class='notify-sidebar-header'>Main Ag. Mails</a>
                                    <a class='notify-sidebar-header'>CEO Mails</a>
                                ";
                        ?>
                    </div>
                </div>
                <div class="notify-content">
                    <div class="message-body">
                        <?php
                            echo 
                                "
                                    <div class='msg-title'>
                                        <h1>Ticket Confirmation</h1>
                                    </div>
                                    <div class='msg-body'>
                                        <p>Bill No: <b>$billkey</b> named: <b>$name</b> wants confirmation 
                                            for ticket payment of <b>Tshs. $bill/=</b> requested on <b>$date</b> 
                                            at <b>$time</b> paid via <b>$method</b> through <b>$number</b>.
                                        </p>
                                    </div>
                                    <a href='approve.php?id=$id&&key=$key' class='approve'>Confirmed</a>
                                ";
                        ?>
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
<script src="js/notifications.js"></script>
</html>