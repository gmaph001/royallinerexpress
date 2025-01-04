<?php
    require "connection.php";

    $departure = $_GET['from'];
    $destination = $_GET['to'];
    $date = $_GET['date'];

    $date2 = str_split($date);
    $day = "";
    $day2 = "";

    for($i=0; $i<10; $i++){
        if($date2[$i] === "-"){
            continue;
        }
        else{
            $day.= $date2[$i];
        }
    }

    $day = intval($day);
    
    $route_ID;

    $bus_no = [];
    $class = [];
    $fare = [];
    $seats = [];
    $size = 0;
    

    $siti = 0;

    $query = "SELECT * FROM bus_info";
    $result = mysqli_query($db, $query);

    $query2 = "SELECT * FROM routes";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($departure === $row['departure'] && $destination === $row['destination']){
                $route_ID = $row['route_ID'];
            }
        }
    }

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $date3 = str_split($row['op_date']);

            for($j=0; $j<10; $j++){
                if($date3[$j] === "-"){
                    continue;
                }
                else{
                    $day2.= $date3[$j];
                }
            }

            $day2 = intval($day2);

            if($route_ID === $row['route_ID'] && $departure === $row['position'] && $day>=$day2 && $row['status'] === "available"){
                $bus_no[$size] = $row['bus_no'];
                $fare[$size] = $row['fare'];
                $class[$size] = $row['class'];
                $seats[$size] = $row['seats']-$row['filled'];

                $size++;
            }

            $day2 = "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/selection.css">
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
        <div class="body_contents">
            <?php
                if($size == 0){
                    echo 
                        "
                            <div class='bus'>
                                <div class='bus_info'>
                                    <p style='font-size: 18pt;'><b>No buses available!</b></p>
                                </div>
                            </div><br><br><br>
                        ";
                }
                else{
                    for($i=0; $i<$size; $i++){
                        echo 
                            "
                                <div class='bus'>
                                    <img src='media/icons/bus.png' class='bus_icon'>
                                    <div class='center'></div>
                                    <div class='bus_info'>
                                        <div class='top'>
                                            <p class='bus_name'>ROYAL LINER EXPRESS</p>
                                            <p class='bus_no'>Plate no: $bus_no[$i]</p>
                                            <p class='class'>Class: $class[$i]</p>
                                            <p><b> Tshs. $fare[$i]</b></p>
                                        </div>
                                        <div class='bottom'>
                                            <p class='area'>From: $departure</p>
                                            <p class='via'>4:00 Hrs</p>
                                            <p class='area'>To: $destination</p>
                                        </div>
                                        <div class='amenities'>";

                                        $query3 = "SELECT * FROM bus_info";
                                        $result3 = mysqli_query($db, $query3);

                                        if($result3){
                                            for($j=0; $j<mysqli_num_rows($result3); $j++){
                                                $row = mysqli_fetch_array($result3);

                                                if($row['bus_no'] === $bus_no[$i]){
                                                    if($row['wifi'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/wifi.png' class='lux'>
                                                                    <p class='luxname'>Wi-Fi</p>
                                                                </div>
                                                            ";
                                                    }
                                                    if($row['tv'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/tv.png' class='lux'>
                                                                    <p class='luxname'>TV</p>
                                                                </div>
                                                            ";
                                                    }
                                                    if($row['azam'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/azam.png' class='lux azam'>
                                                                    <p class='luxname'>Azam</p>
                                                                </div>
                                                            ";
                                                    }
                                                    if($row['refreshments'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/refreshment.png' class='lux'>
                                                                    <p class='luxname'>Refreshment</p>
                                                                </div>
                                                            ";
                                                    }
                                                    if($row['toilet'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/toilet.png' class='lux'>
                                                                    <p class='luxname'>Toilet</p>
                                                                </div>
                                                            ";
                                                    }
                                                    if($row['charging'] === "available"){
                                                        echo 
                                                            "
                                                                <div class='extra'>
                                                                    <img src='media/icons/charging.png' class='lux'>
                                                                    <p class='luxname'>Charging</p>
                                                                </div>
                                                            ";
                                                    }
                                                }
                                            }
                                        }                                    
                                            
                                        echo "
                                        </div>
                                    </div>
                                    <div class='center'></div>
                                    <div class='seats'>
                                        <p class='available'>$seats[$i] Seats available</p>
                                        <img src='media/icons/filled.png' class='seat_icon'>
                                        <a href='seat-select.php?from=$departure&&to=$destination&&date=$date&&bus=$bus_no[$i]' class='select'>Select seat(s)</a>
                                    </div>
                                </div>
                            ";
                    }
                }
            ?>
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
</html>