<?php

    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Bus Register</title>
</head>
<body>
    <div class="body">
        <div class="form">
            <div class="intro">
                <img src="media/icons/logo.png" class="logo">
                <h1 class="heading">REGISTRATION FORM</h1>
            </div>
            <?php echo "<form action='full_admin.php?id=$id' name='more' enctype='multipart/form-data' method='POST'>";?>
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
                        <div class="input" id="rank">
                            <img src="media/icons/ranking.png" class="icons">
                            <select name="rank">
                                <option value="none">Input Rank</option>
                                <option value="manager">Manager</option>
                                <option value="main">Main Agent</option>
                                <option value="agent">Agent</option>
                            </select>
                        </div>
                        <p class="alert" id="rankalert"></p>
                        <div class="input" id="confirmkey">
                            <img src="media/icons/padlock.png" class="icons">
                            <input type="number" name="confirmkey" placeholder="Confirmation Key">
                        </div>
                        <p class="alert" id="confirmalert"></p>
                    </div>
                </div>
                <button onclick="sajili()" name="register" class="register">Register</button>
            </form>
        </div>
    </div>
</body>
<script src="js/more_info.js"></script>
</html>