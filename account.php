<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $firstname = $row['firstname'];
                $secondname = $row['secondname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $phone = $row['phone_no'];
                $username = $row['username'];
                $marital_status = $row['marital_status'];
                $birthdate = $row['birthdate'];
                $residential = $row['residential'];
                $photo = $row['photo'];
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
    <link rel="stylesheet" type="text/css" href="css/account.css">
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
                <div class="profile">
                    <div class="profile-photo">
                        <?php echo "<form action='profile_photo.php?id=$id' name='profile' enctype='multipart/form-data' method='POST'>";?>
                            <div class="photo-hold">
                                <center>
                                    <?php echo "<img src='$photo' class='photo'>";?>
                                </center>
                            </div>
                            <div class="change-photo">
                                <img src="media/icons/change-photo.png" class="icons">
                                <input type="file" name="photo" id="pic" placeholder="Change Photo">
                            </div>
                            <p class="alertphoto" id="photoalert"></p>
                            <center><button onclick="photog()" class="profile-button" name="sub_photo">Change Photo</button></center>
                        </form>
                    </div>
                    <div class="center"></div>
                    <div class="profile-info">
                        <?php
                            echo 
                                "
                                    <form action='profile_info.php?id=$id' name='prof_info' enctype='multipart/form-data' method='POST'>
                                        <div class='input-grp' name='input'>
                                            <div class='left' name='cluster'>
                                                <div class='inputs' id='fname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='firstname' id='fname' placeholder='$firstname' value='$firstname'>
                                                </div>
                                                <p class='alert' id='firstalert'></p>
                                                <div class='inputs' id='sname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='secondname' id='sname' placeholder='$secondname' value='$secondname'>
                                                </div>
                                                <p class='alert' id='secondalert'></p>
                                                <div class='inputs' id='lname1'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='lastname' id='lname' placeholder='$lastname' value='$lastname'>
                                                </div>
                                                <p class='alert' id='thirdalert'></p>
                                                <div class='inputs' id='phone1'>
                                                    <img src='media/icons/phone.png' class='icons'>
                                                    <input type='text' name='phone' id='number' placeholder='$phone' value='$phone'>
                                                </div>
                                                <p class='alert' id='phonealert'></p>
                                            </div>
                                            <div class='left' name='cluster'>                                
                                                <div class='inputs' id='birth1'>
                                                    <img src='media/icons/age (1).png' class='icons'>
                                                    <input type='date' name='birthdate' id='birth' value='$birthdate' placeholder='$birthdate'>
                                                </div>
                                                <p class='alert' id='birthalert'></p>
                                                <div class='inputs' id='marry1'>
                                                    <img src='media/icons/marital-status.png' class='icons'>
                                                    <p style='font-size: 14pt; width:50%; margin-left: 10px; font-weight: bold;'>$marital_status</p>
                                                    <select name='marry' id='marriage'>
                                                        <option value='none'>Change</option>
                                                        <option value='single'>Single</option>
                                                        <option value='married'>Married</option>
                                                        <option value='divorced'>Divorced</option>
                                                    </select>
                                                </div>
                                                <p class='alert' id='marryalert'></p>
                                                <div class='inputs' id='home1'>
                                                    <img src='media/icons/home.png' class='icons'>
                                                    <input type='text' name='residential' id='home' placeholder='$residential' value='$residential'>
                                                </div>
                                                <p class='alert' id='homealert'></p>
                                                <div class='inputs' id='user1'>
                                                    <img src='media/icons/account.png' class='icons'>
                                                    <input type='text' name='username' id='user' placeholder='$username' value='$username'>
                                                </div>
                                                <p class='alert' id='useralert'></p>
                                                <div class='inputs' id='email1'>
                                                    <img src='media/icons/mail.png' class='icons'>
                                                    <input type='email' name='email' id='mail' placeholder='$email' value='$email'>
                                                </div>
                                                <p class='alert' id='emailalert'></p>
                                            </div>
                                        </div>
                                        <center><button onclick='info()' class='info-button' name='sub_info'>Change Info</button></center>
                                    </form>
                                ";
                        ?>
                    </div>
                </div>
                <div class="profile2">
                    <center>
                        <fieldset>
                            <legend>Security</legend>
                            <div class="security">
                                <?php echo "<form action='profile_secure.php?id=$id' name='profile' enctype='multipart/form-data' method='POST'>";?>
                                    <div class="inputs" id="pword1">
                                        <img src="media/icons/lock.png" class="icons">
                                        <input type="password" name="password" id="pword" placeholder="Old Password">
                                        <img src="media/icons/hide.png" class="icons hide hide1" onclick="fichua(1)">
                                    </div>
                                    <p class="alertphoto" id="palert"></p>
                                    <div class="inputs" id="nword1">
                                        <img src="media/icons/lock.png" class="icons">
                                        <input type="password" name="newpassword" id="nword" placeholder="New Password">
                                        <img src="media/icons/hide.png" class="icons hide hide2" onclick="fichua(2)">
                                    </div>
                                    <p class="alertphoto" id="nalert"></p>
                                    <div class="inputs" id="cword1">
                                        <img src="media/icons/lock.png" class="icons">
                                        <input type="password" name="conpassword" id="cword" placeholder="Confirm Password">
                                        <img src="media/icons/hide.png" class="icons hide hide3" onclick="fichua(3)">
                                    </div>
                                    <p class="alertphoto" id="calert"></p>
                                    <center><button onclick="ulinzi()" class="profile-button" name="sub_secure">Change Password</button></center>
                                </form>
                            </div>
                        </fieldset>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
<script src="js/account.js"></script>
</html>