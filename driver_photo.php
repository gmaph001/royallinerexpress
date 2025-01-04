<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

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

    $query2 = "SELECT * FROM driver_info";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($key === $row['driver_key']){
                $dri_photo = $row['photo'];
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
    <link rel="stylesheet" type="text/css" href="css/photo.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Driver Photo</title>
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
                    <div class="profile-photo">
                        <?php echo "<form action='photo.php?id=$id&&key=$key' name='profile' enctype='multipart/form-data' method='POST'>";?>
                            <div class="photo-hold">
                                <?php echo "<center><img src='$dri_photo' class='photo'></center>";?>
                            </div>
                            <div class="change-photo">
                                <img src="media/icons/change-photo.png" class="icons">
                                <input type="file" name="photo" id="pic" placeholder="Change Photo">
                            </div>
                            <p class="alertphoto" id="photoalert"></p>
                            <center><button onclick="photog()" class="profile-button" name="sub_photo">Change Photo</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
<script src="js/account.js"></script>
</html>