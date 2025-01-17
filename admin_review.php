<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $name = [];
    $email = [];
    $message = [];
    $status = [];
    $key = [];
    $size = 0;

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                $photo = $row['photo'];
            }
        }
    }

    $query2 = "SELECT * FROM reviews";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            $name[$size] = $row['name'];
            $email[$size] = $row['email'];
            $message[$size] = $row['message'];
            $status[$size] = $row['status'];
            $key[$size] = $row['reviewkey'];

            $size++;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/admin_review.css">
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
                <?php
                    for($i=$size-1; $i>=0; $i--){
                        echo 
                            "
                                <div class='review-card'>
                                    <div class='review'>
                                        <div class='credentials'>
                                            <p>From: <span class='address'>$name[$i]</span></p>
                                            <p>Email: <span class='address'>$email[$i]</span></p>
                                        </div>
                                        <div class='message'>
                                            <p>'$message[$i]'</p>
                                        </div>
                                    </div>
                                    <div class='status'>
                                        <p>Status: $status[$i]</p>
                                    </div>
                                    <div class='btns'>
                                        <a href='post_review.php?id=$id&&key=$key[$i]' class='post'>Post</a>
                                        <a href='post_review2.php?id=$id&&key=$key[$i]' class='post'>Drop</a>
                                    </div>
                                </div>
                            ";
                    }
                ?>
                
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>
<script src="js/admin_navBar.js"></script>    
</body>
</html>