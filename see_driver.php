<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $birth = "";
    $birthmonth = "";
    $bday = "";

    $firstname = [];
    $secondname = [];
    $lastname = [];
    $birthdate = [];
    $username = [];
    $marital_status = [];
    $home = [];
    $phone = [];
    $email = [];
    $licence = [];
    $dri_photo = [];
    $key = [];
    $size = 0;

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                $photo = $row['photo'];
                $rank = $row['rank'];
            }
        }
    }

    $query2 = "SELECT * FROM driver_info";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            $firstname[$size] = $row['firstname'];
            $secondname[$size] = $row['secondname'];
            $lastname[$size] = $row['lastname'];
            $username[$size] = $row['username'];
            $birthdate[$size] = $row['birthdate'];
            $username[$size] = $row['username'];
            $marital_status[$size] = $row['marital_status'];
            $home[$size] = $row['residential'];
            $phone[$size] = $row['phone_no'];
            $email[$size] = $row['email'];
            $licence[$size] = $row['licence_no'];
            $dri_photo[$size] = $row['photo'];
            $key[$size] = $row['driver_key'];

            $today = date('Y-m-d');

            $year = intval(date('Y'));
            $month = intval(date('m'));
            $day = intval(date('d'));

            $birthday = str_split($birthdate[$size]);
            
            for($j=0; $j<4; $j++){
                $birth .= $birthday[$j]; 
            }

            $years[$size] = $year - intval($birth);

            for($j=5; $j<7; $j++){
                $birthmonth .= $birthday[$j];
            }

            for($j=8; $j<10; $j++){
                $bday .= $birthday[$j];
            }

            if($month < intval($birthmonth)){
                $years[$size]--;
            }
            else{
                if($month == intval($birthmonth) && $day < intval($bday)){
                    $years[$size]--;
                }
            }

            $birth = "";
            $birthmonth = "";
            $bday = "";            

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
    <link rel="stylesheet" type="text/css" href="css/see_driver.css">
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
                    if($size == 0){
                        echo 
                            "
                                <div class='ticket'>
                                    <h1>No driver registered! Please, go back and register your drivers!</h1>
                                </div>
                            ";
                    }
                    for($i=$size-1; $i>=0; $i--){
                        echo 
                            "   
                                <div class='prompt' id='$i'>
                                    <div class='dialogue'>
                                        <p>Are you sure you want to delete the driver with username: <b><i>$username[$i]</i></b>?</p>
                                        <div class='promptbtns'>
                                            <a href='delete_driver.php?id=$id&&key=$key[$i]' class='p-delete'>Yes</a>
                                            <p class='p-donot' onclick='hide($i)'>No</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='ticket'>
                                    <h1>User: $username[$i]</h1>
                                    <div class='edit'>
                                        <div class='prof-photo'>
                                            <img src='$dri_photo[$i]' class='photo'>
                                        </div>
                                        <div class='info'>
                                            <div class='details'>
                                                <p class='name'>$firstname[$i]</p>
                                                <p class='name'>$secondname[$i]</p>
                                                <p class='name'>$lastname[$i]</p>
                                            </div>
                                            <div class='btns'>
                                                <a href='update_driver.php?id=$id&&key=$key[$i]' class='update'>Update</a>
                                                <a class='delete' onclick='show($i)'>Delete</a>
                                            </div>
                                        </div>
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
</body>
<script src="js/admin_navBar.js"></script>
<script>
    let delbtn = document.querySelector('.delete');
    let promptbox = document.querySelector('.prompt');
    let no = document.querySelector('.p-donot');

    delbtn.addEventListener('click', function(){
        promptbox.style.display = "block";
    })

    no.addEventListener('click', function(){
        promptbox.style.display = "none";
    })

    function show(value){
        promptbox = document.getElementById(value);

        promptbox.style.display = "block";
    }

    function hide(value){
        promptbox = document.getElementById(value);

        promptbox.style.display = "none";
    }

</script>
</html>