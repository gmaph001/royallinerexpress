<?php
    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $date = [];
    $time = [];
    $msg = "Ticket Confirmation";
    $name = [];
    $not_no = [];
    $size = 0;

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
                $rank = $row['rank'];
            }
        }
    }

    $query2 = "SELECT * FROM bill_notification";
    $result2 = mysqli_query($db, $query2);

    if(mysqli_num_rows($result2)>0){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($id === $row['handler_key']){
                $name[$size] = $row['bill_name'];
                $date[$size] = $row['bill_date'];
                $time[$size] = $row['bill_time'];
                $not_no[$size] = $row['notify_ID'];

                $size++;
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
                <div class="notify-sidebar">
                    <div class="title">
                        <h1>Notification</h1>
                    </div>
                    <div class="notify-sidebar-body">
                        <a class="notify-sidebar-header" href="notification.html">Ticket Mails</a>
                        <a class="notify-sidebar-header">Agent Mails</a>
                        <a class="notify-sidebar-header">Main Ag. Mails</a>
                        <a class="notify-sidebar-header">CEO Mails</a>
                    </div>
                </div>
                <div class="notify-content">
                    <?php
                        if($size>0){
                            for($i=$size-1; $i>=0; $i--){
                                echo 
                                    "
                                        <a class='notification-message' href='notification_msg.html'>
                                            <p><b>$name[$i]</b></p>
                                            <p><b>$date[$i]</b></p>
                                            <p><b>$msg</b></p>
                                            <p><b>$time[$i]</b></p>
                                        </a>
                                    ";
                            }
                        }
                        else{
                            echo 
                                "
                                    <a class='notification-message'>
                                        <center><p><b>You don't have any notifications for now!</b></p></center>
                                    </a>
                                ";
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