<?php

    require "connection.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $bus_no = $_GET['bus'];
    $seat = $_GET['seats'];
    $class;
    $fare;

    $k = 0;

    $siti = [];
    $size = 0;

    $query0 = "SELECT * FROM bus_info";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($bus_no === $row['bus_no']){
                $class = $row['class'];
                $fare = $row['fare'];
            }
        }
    }

    $seats = str_split($seat);

    for($i=0; $i<sizeof($seats); $i++){
        if($seats[$i] === " "){
            $siti[$i] = "space";
            $size++;
        }
        else{
            $siti[$size] = $seats[$i];
            $size++;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
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
        <div class="forms">
            <div class='passenger'>
                
            <?php

                echo "<form name='passenger' class='register' action='passenger.php?from=$from&&to=$to&&date=$date&&bus=$bus_no&&seats=$seat' method='POST' enctype='multipart/form-data'>";
                for($j=0; $j<$size; $j++){

                    if($j+1 == $size){
                        
                        $k++;
                        if($j == 0){
                            $no = $siti[$j];
                        }
                        elseif($siti[$j-1] !== "space"){
                            $no = $siti[$j-1].$siti[$j];
                        }
                        else{
                            $no = $siti[$j];
                        }

                        echo 
                            "
                                
                                    <h1>Seat No:$no</h1>
                                    <p class='intro'>Please fill out your Information below:</p>
                                    
                                        <div class='columns'>
                                            <div class='side'>
                                                <div class='inputs'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='firstname$k' placeholder='First Name' required='required'>
                                                </div>
                                                <p class='alert' id='alert1'></p>
                                                <div class='inputs'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='lastname$k' placeholder='Last Name' required='required'>
                                                </div>
                                                <p class='alert' id='alert2'></p>
                                                <div class='inputs' style='display: none;'>
                                                    <img src='media/icons/chosen.png' class='icons'>
                                                    <input type='text' name='seat$k' placeholder='$no' value='$no'>
                                                </div>
                                                <p class='alert' id='alert3'></p>
                                            </div>
                                            <div class='center'></div>
                                            <div class='side'>
                                                <div class='inputs'>
                                                    <img src='media/icons/user.png' class='icons'>
                                                    <input type='text' name='secondname$k' placeholder='Middle Name' required='required'>
                                                </div>
                                                <p class='alert' id='alert4'></p>
                                                <div class='inputs'>
                                                    <img src='media/icons/gender.png' class='icons'>
                                                    <select class='gender' name='gender$k' id='gender' required='required' onchange='if(document.getElementById('gender').value === 'none'){document.getElementById('alert5').innerHTML='Choose gender!'}'>
                                                        <option value='none'>Gender</option>
                                                        <option value='male'>Male</option>
                                                        <option value='female'>Female</option>
                                                    </select>
                                                </div>
                                                <p class='alert' id='alert5'></p>
                                                <div class='inputs' style='display: none;'>
                                                    <img src='media/icons/money.png' class='icons'>
                                                    <input type='text' name='fare$k' placeholder='$fare' value='$fare'>
                                                </div>
                                                <p class='alert' id='alert6'></p>
                                            </div>
                                        </div>
                                        
                            ";

                    }
                    else{    
                        
                        if($siti[$j] === "space"){
                            $k++;
                            if($j>1){
                                if($siti[$j-2] !== "space"){
                                    $no = $siti[$j-2].$siti[$j-1];
                                }
                                else{
                                    $no = $siti[$j-1];
                                }
                            }
                            else{
                                $no = $siti[$j-1];
                            }

                            echo 
                                "
                                    
                                        <h1>Seat No:$no</h1>
                                        <p class='intro'>Please fill out your Information below:</p>
                                        <form name='passenger' class='register'>
                                            <div class='columns'>
                                                <div class='side'>
                                                    <div class='inputs'>
                                                        <img src='media/icons/user.png' class='icons'>
                                                        <input type='text' name='firstname$k' placeholder='First Name' required='required'>
                                                    </div>
                                                    <p class='alert' id='alert1'></p>
                                                    <div class='inputs'>
                                                        <img src='media/icons/user.png' class='icons'>
                                                        <input type='text' name='lastname$k' placeholder='Last Name' required='required'>
                                                    </div>
                                                    <p class='alert' id='alert2'></p>
                                                    <div class='inputs' style='display: none;'>
                                                        <img src='media/icons/chosen.png' class='icons'>
                                                        <input type='text' name='seat$k' placeholder='$no' value='$no'>
                                                    </div>
                                                    <p class='alert' id='alert3'></p>
                                                </div>
                                                <div class='center'></div>
                                                <div class='side'>
                                                    <div class='inputs'>
                                                        <img src='media/icons/user.png' class='icons'>
                                                        <input type='text' name='secondname$k' placeholder='Middle Name' required='required'>
                                                    </div>
                                                    <p class='alert' id='alert4'></p>
                                                    <div class='inputs'>
                                                        <img src='media/icons/gender.png' class='icons'>
                                                        <select class='gender' name='gender$k' id='gender' required='required' onchange='if(document.getElementById('gender').value === 'none'){document.getElementById('alert5').innerHTML='Choose gender!'}'>
                                                            <option>Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <p class='alert' id='alert5'></p>
                                                    <div class='inputs' style='display: none;'>
                                                        <img src='media/icons/money.png' class='icons'>
                                                        <input type='text' name='fare$k' placeholder='$fare' value='$fare'>
                                                    </div>
                                                    <p class='alert' id='alert6'></p>
                                                </div>
                                            </div>
                                            
                                ";
                        }

                    }

                }

                $total = $fare*$k;

                echo 
                    "
                        <br>
                        <p class='total'>The total fare is Tshs. $total/=</p>
                        <input type='number' name='watu' value='$k' style='display: none;'>
                        <br>
                    ";

            ?>
                
                    <button class='checkout' onclick='checkout()' name='register'>Checkout</button>
                </form>
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
</html>