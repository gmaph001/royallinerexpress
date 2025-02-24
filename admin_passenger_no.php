<?php

    require "connection.php";

    $id = $_GET['id'];
    $bill = $_GET['bill'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
                $notification = $row['unread'];
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
    <link rel="stylesheet" type="text/css" href="css/pay.css">
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
            <div class="pay">
                <div class="form">
                    <p class="intro">Confirm Key</p>
                    <p class="exp">
                        Note: Enter the Phone number of passenger for communication!
                    </p>
                    <?php echo "<form action='bill_phone.php?id=$id' class='pay_form' name='billing' method='POST' enctype='multipart/form-data'>";?>
                        <div class="pay_info">
                            <div class="inputs" id="key">
                                <img src="media/icons/phone.png" class="icons">
                                <input type="text" name="key" placeholder="Passenger's Phone">
                            </div>
                            <p class="alert" id="namealert"></p>
                            <?php
                                echo 
                                    "
                                        <div class='inputs' style='display:none;'>
                                            <img src='media/icons/phone.png' class='icons'>
                                            <input type='text' name='billkey' placeholder='Passenger's Phone' value='$bill'>
                                        </div>
                                    ";
                            ?>
                        </div>
                        <button class="bill" name="confirm" onclick="verify()">Register Number</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&copy; Royal Liner Express 2025.</p>
            </div> 
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
<script src="js/confirm.js"></script>
</html>