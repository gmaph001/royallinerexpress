<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
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
    <link rel="stylesheet" type="text/css" href="css/add_driver.css">
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
                <div class="form">
                    <div class="intro">
                        <img src="media/icons/logo.png" class="form-logo">
                        <h1 class="heading">REGISTRATION FORM</h1>
                    </div>
                    <?php echo "<form action='reg_driver.php?id=$id' name='more' enctype='multipart/form-data' method='POST'>";?>
                        <div class="form-content">
                            <div class="left">
                                <div class="input" id="firstname">
                                    <img src="media/icons/user.png" class="icons">
                                    <input type="text" name="firstname" placeholder="First Name">
                                </div>
                                <p class="alert" id="firstalert"></p>
                                <div class="input" id="secondname">
                                    <img src="media/icons/user.png" class="icons">
                                    <input type="text" name="secondname" placeholder="Middle Name">
                                </div>
                                <p class="alert" id="secondalert"></p>
                                <div class="input" id="lastname">
                                    <img src="media/icons/user.png" class="icons">
                                    <input type="text" name="lastname" placeholder="Last Name">
                                </div>
                                <p class="alert" id="lastalert"></p>
                                <div class="input" id="birthdate">
                                    <img src="media/icons/age (1).png" class="icons">
                                    <input type="date" name="birthdate" placeholder="Birth Date" id="birth">
                                </div>
                                <p class="alert" id="birthalert"></p>
                                <div class="input" id="phone">
                                    <img src="media/icons/phone.png" class="icons">
                                    <input type="number" name="phone" placeholder="Phone Number" id="phone">
                                </div>
                                <p class="alert" id="phonealert"></p>
                                <div class="input" id="email">
                                    <img src="media/icons/mail.png" class="icons">
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <p class="alert" id="emailalert"></p>
                            </div>
                            <div class="center"></div>
                            <div class="left">
                                <div class="input" id="gender">
                                    <img src="media/icons/gender.png" class="icons">
                                    <select name="gender">
                                        <option value="none">Select your gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <p class="alert" id="genderalert"></p>
                                <div class="input" id="marry">
                                    <img src="media/icons/marital-status.png" class="icons">
                                    <select name="marry">
                                        <option value="none">Marital Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                </div>
                                <p class="alert" id="marryalert"></p>
                                <div class="input" id="residential">
                                    <img src="media/icons/home.png" class="icons">
                                    <input type="text" name="residential" placeholder="Residential Address">
                                </div>
                                <p class="alert" id="homealert"></p>
                                <div class="input" id="user">
                                    <img src="media/icons/account.png" class="icons">
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                                <p class="alert" id="useralert"></p>
                                <div class="input" id="licencenumb">
                                    <img src="media/icons/driver-license.png" class="icons">
                                    <input type="text" name="licence" placeholder="Licence Number">
                                </div>
                                <p class="alert" id="licencealert"></p>
                                <div class="input" id="exp">
                                    <img src="media/icons/steering-wheel.png" class="icons">
                                    <input type="number" name="experience" placeholder="Experience">
                                </div>
                                <p class="alert" id="expalert"></p>
                            </div>
                        </div>
                        <button onclick="sajili()" name="register" class="register">Register</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/admin_navBar.js"></script>
<script>
    let alertmsg = "*Please fill this field!*";
    let phonealert = "*Please input correct phone number!*";
    let confirmalert = "*Please input correct confirmation key!*";

    function sajili(){

        if(document.more.firstname.value === ""){
            document.getElementById("firstalert").innerHTML = alertmsg;
            document.getElementById("firstname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("firstalert").innerHTML = "";
            document.getElementById("firstname").style.border = "none";
        }

        if(document.more.secondname.value === ""){
            document.getElementById("secondalert").innerHTML = alertmsg;
            document.getElementById("secondname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("secondalert").innerHTML = "";
            document.getElementById("secondname").style.border = "none";
        }

        if(document.more.lastname.value === ""){
            document.getElementById("lastalert").innerHTML = alertmsg;
            document.getElementById("lastname").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("lastalert").innerHTML = "";
            document.getElementById("lastname").style.border = "none";
        }

        if(document.more.birthdate.value === ""){
            document.getElementById("birthalert").innerHTML = alertmsg;
            document.getElementById("birthdate").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("birthalert").innerHTML = "";
            document.getElementById("birthdate").style.border = "none";
        }

        if(document.more.phone.value === ""){
            document.getElementById("phonealert").innerHTML = alertmsg;
            document.getElementById("phone").style.border = "2px solid red";
            event.preventDefault();
        }
        else if(document.more.phone.value.length !== 10){
            document.getElementById("phonealert").innerHTML = phonealert;
            document.getElementById("phone").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("phonealert").innerHTML = "";
            document.getElementById("phone").style.border = "none";
        }

        if(document.more.gender.value === "none"){
            document.getElementById("genderalert").innerHTML = alertmsg;
            document.getElementById("gender").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("genderalert").innerHTML = "";
            document.getElementById("gender").style.border = "none";
        }

        if(document.more.marry.value === "none"){
            document.getElementById("marryalert").innerHTML = alertmsg;
            document.getElementById("marry").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("marryalert").innerHTML = "";
            document.getElementById("marry").style.border = "none";
        }

        if(document.more.residential.value === ""){
            document.getElementById("homealert").innerHTML = alertmsg;
            document.getElementById("residential").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("homealert").innerHTML = "";
            document.getElementById("residential").style.border = "none";
        }

        if(document.more.username.value === ""){
            document.getElementById("useralert").innerHTML = alertmsg;
            document.getElementById("user").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("useralert").innerHTML = "";
            document.getElementById("user").style.border = "none";
        }
        if(document.more.email.value === ""){
            document.getElementById("emailalert").innerHTML = alertmsg;
            document.getElementById("email").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("emailalert").innerHTML = "";
            document.getElementById("email").style.border = "none";
        }

        if(document.more.experience.value === ""){
            document.getElementById("expalert").innerHTML = alertmsg;
            document.getElementById("exp").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("expalert").innerHTML = "";
            document.getElementById("exp").style.border = "none";
        }

        if(document.more.licence.value === ""){
            document.getElementById("licencealert").innerHTML = alertmsg;
            document.getElementById("licencenumb").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("licencealert").innerHTML = "";
            document.getElementById("licencenumb").style.border = "none";
        }
        
    }
</script>
</html>