<?php
    require "connection.php";

    $areas = [];
    $areas2 = [];
    $size = 0;
    $size2 = 0;
    $size3 = 0;
    $size4 = 0;
    $n = 0;

    $check = false;

    $query = "SELECT * FROM routes";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $areas[$size] = $row['departure'];
            $size++;
            $areas2[$size2] = $row['destination'];
            $size2++;
        }
    }

    for($i=0; $i<$size; $i++){
        if($i>0){
            for($j=0; $j<$size3; $j++){
                if($areas[$i] === $areas[$j]){
                    $check = true;
                }
            }
            if(!$check){
                $areas[$size3] = $areas[$i];
                $size3++;
            }
        }
        else{
            $areas[$size3] = $areas[$i];
            $size3++;
        }

        $check = false;
    }

    for($i=0; $i<$size2; $i++){
        if($i>0){
            for($j=0; $j<$size4; $j++){
                if($areas2[$i] === $areas2[$j]){
                    $check = true;
                }
            }
            if(!$check){
                $areas2[$size4] = $areas2[$i];
                $size4++;
            }
        }
        else{
            $areas2[$size4] = $areas2[$i];
            $size4++;
        }

        $check = false;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Home</title>
</head>
<body>
    <div class="navigation">
        <a href="index.php"><img src="media/icons/logo.png" class="logo"></a>
        <div class="title">
            <p>ROYAL LINER EXPRESS</p>
        </div>
        <div class="horizontal_menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <img src="media/icons/menu.png" class="menu_icon">
    </div>
    <div class="body">
        <div class="vertical_menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="intro" onscroll="vuta()">
            <div class="intro_cover">
                <h1 class="intro_head">Travel Royally with Us!</h1>
                <div class="safari">
                    <form action="safari.php" method="POST" name="safari" class="safari_form" enctype="multipart/form-data">
                        <div class="input">
                            <img src="media/icons/departures.png" class="icons">
                            <select name="depart" class="areas">
                                <option value="none">Select departure</option>
                                <?php 
                                    for($i=0; $i<$size3; $i++){
                                        echo 
                                            "
                                                <option value='$areas[$i]'>$areas[$i]</option>
                                            ";
                                    }
                                ?>
                            </select>
                        </div>
                        <p class="alert" id="departalert"></p><br>
                        <div class="input">
                            <img src="media/icons/arrivals.png" class="icons">
                            <select name="destination" class="areas">
                                <option value="none">Select destination</option>
                                <?php 
                                    for($i=0; $i<$size4; $i++){
                                        echo 
                                            "
                                                <option value='$areas2[$i]'>$areas2[$i]</option>
                                            ";
                                    }
                                ?>
                            </select>
                        </div>
                        <p class="alert" id="arrival_alert"></p><br>
                        <div class="input">
                            <img src="media/icons/calendar.png" class="icons">
                            <input type="date" class="date" name="date" onpointermove="tarehe()" onfocus="tarehe()">
                        </div>
                        <p class="alert" id="date_alert"></p><br>
                        <button onclick="hakiki()" name="confirm" class="hakiki">Search Bus</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="about">
            <div class="about_exp">
                <h1 class="about_us">About Us</h1>
                <p class="maelezo">
                    Royal Liner Express ni kampuni ya mabasi ambayo imejidhatiti kukupatia wewe mteja, usafiri salama, wa kutegemeka na 
                    wa kustarehesha wenye hadhi ya kifalme. Ili kufikia lengo letu, kampuni yetu inahakikisha wewe mteja wetu mpendwa 
                    unapata kile unachostahili pale inapokuja kwenye suala la usafiri. Karibu Royal Liner Express, pata huduma za kifalme.
                </p>
            </div>
            <div class="about_pic">
                <img src="media/images/01.jpg" class="about_photo"> 
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer_content">
            <div class="footer_logo">
                <a href="index.php"><img src="media/icons/logo.jpeg" class="logo_photo"></a>
            </div>
            <div class="quick">
                <h1>Go to</h1>
                <a href="index.php">Homepage</a>
                <a href="gallery.php">Gallery</a>
                <a href="login.php">Login</a>
            </div>
            <div class="contact">
                <h1>Contact Us</h1>
                <div class="contact_icons">
                    <a href="https://instagram.com/royallinerexpress">
                        <img src="media/icons/instagram.png" class="social_icons">
                    </a>
                    <a href="https://facebook.com/royallinerexpress">
                        <img src="media/icons/facebook.jpg" class="social_icons">
                    </a>
                    <a href="https://x.com/royallinerexpress">
                        <img src="media/icons/x.jpg" class="social_icons">
                    </a>
                    <a href="https://tiktok.com/royallinerexpress">
                        <img src="media/icons/tiktok.png" class="social_icons">
                    </a>
                </div>
                <p>@royallinerexpress</p>
            </div>
            <div class="comments">
                <h1>Comment</h1>
                <form>
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                    <textarea placeholder="Write your comments here..."></textarea>
                    <button class="comment_send">Send</button>
                </form>
            </div>
        </div>
        <p>&copy; Royal Liner Express 2024.</p>
    </div>
</body>
<script src="js/navBar.js"></script>
<script src="js/home.js"></script>
</html>