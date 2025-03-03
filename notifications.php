<?php
    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $not_key = [];
    $date = [];
    $time = [];
    $msg = "Ticket Confirmation";
    $name = [];
    $not_no = [];
    $status = [];
    $size = 0;

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

    if(mysqli_num_rows($result2)>0){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($id === $row['handler_key']){
                $not_key[$size] = $row['notify_ID'];
                $name[$size] = $row['bill_name'];
                $date[$size] = $row['bill_date'];
                $time[$size] = $row['bill_time'];
                $not_no[$size] = $row['notify_ID'];
                $status[$size] = $row['status'];

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
                    <div class="notify-sidebar-body">
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
                    <?php
                        if($size == 0){
                            echo 
                                "
                                    <a class='notification-message'>
                                        <center><p><b>You don't have any notifications for now!</b></p></center>
                                    </a>
                                ";
                        }
                    ?>
                    <h2>Unread</h2>
                    <?php
                        if($size>0){
                            for($i=$size-1; $i>=0; $i--){
                                if($status[$i] === "closed"){
                                    echo 
                                        "
                                            <a class='notification-message' href='notification_msg.php?id=$id&&key=$not_key[$i]'>
                                                <p><b>$name[$i]</b></p>
                                                <p><b>$date[$i]</b></p>
                                                <p><b>$msg</b></p>
                                                <p><b>$time[$i]</b></p>
                                            </a>
                                        ";
                                }
                            }
                        }
                    ?>
                    <h2>Read</h2>
                    <?php
                        if($size>0){
                            for($i=$size-1; $i>=0; $i--){
                                if($status[$i] === "opened"){
                                    echo 
                                        "
                                            <a class='notification-message' href='notification_msg.php?id=$id&&key=$not_key[$i]'>
                                                <p>$name[$i]</p>
                                                <p>$date[$i]</p>
                                                <p>$msg</p>
                                                <p>$time[$i]</p>
                                            </a>
                                        ";
                                }
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
<script src="js/notifications.js"></script>
</html>