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

    $query2 = "SELECT * FROM chk_photos";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($key === $row['photo_key']){
                $busphoto = $row['photo_name'];
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
    <link rel="stylesheet" type="text/css" href="css/busphoto.css">
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
                <div class="pic-form">
                    <div class="note">
                        <p>Is this the photo you want to upload?</p>
                    </div>
                    <?php echo "<img src='$busphoto' class='photo'><br><br>";?>
                    <div class="btns">
                        <?php
                            echo 
                                "
                                    <a href='photo_upload.php?id=$id&&key=$key' class='submit'>Confirm</a>
                                    <a href='photo_delete.php?id=$id&&key=$key' class='reject'>Reject</a>
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
</html>