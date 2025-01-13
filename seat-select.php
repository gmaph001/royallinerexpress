<?php

    require "connection.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $bus_no = $_GET['bus'];
    $date = $_GET['date'];
    $seats = 0;
    $n = 1;
    $n2 = 2;
    $n3 = 3;
    $n4 = 4;

    $day = "";
    $day2 = "";

    $op_day = "";
    $op_day2 = "";

    $confirm = 0;
    $confirm2 = 0;

    $namba = [];
    $idadi = 0;

    $query = "SELECT * FROM bus_info";
    $result = mysqli_query($db, $query);

    $query2 = "SELECT * FROM passenger_info";
    $result2 = mysqli_query($db, $query2);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['bus_no'] === $bus_no){
                $op_day = str_split($row['op_date']);

                for($j=0; $j<10; $j++){
                    if($op_day[$j] === "-"){
                        continue;
                    }
                    else{
                        $op_day2 .= $op_day[$j];
                    }
                }

                $op_day2 = intval($op_day2);

                $filled = $row['filled'];

                for($j=0; $j<$row['seats']; $j++){
                    $seats++;
                }
            }
        }
    }

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($bus_no === $row['bus_no']){   
                $date2 = str_split($row['tarehe']);

                for($j=0; $j<10; $j++){
                    if($date2[$j] === "-"){
                        continue;
                    }
                    else{
                        $day .= $date2[$j];
                    }
                }

                $day = intval($day);  
                
                if($filled > 0 && $day >= $op_day2){
                    $namba[$idadi] = $row['seat_no'];
                    $idadi++;
                }

                $day = "";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/seat.css">
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
        <div class="content">
            <div class="content-title">
                <p>Please, choose your favourite seat(s):</p>
            </div>
            <div class="key">
                <div class="component">
                    <img src="media/icons/filled.png" class="seat">
                    <p>Filled seat</p>
                </div>
                <div class="component">
                    <img src="media/icons/available.png" class="seat">
                    <p>Available seat</p>
                </div>
                <div class="component">
                    <img src="media/icons/chosen.png" class="seat">
                    <p>Chosen seat</p>
                </div>
            </div>
            <div class="bus">
                <div class="front">
                    <img src="media/icons/steering-wheel.png" class="driver">
                </div>
                <div class="middle">
                    <div class="left">
                        <?php
                            if(($seats-5) % 4 == 0){
                                for($i=0; $i<($seats-5)/4; $i++){
                                    for($j=0; $j<$idadi; $j++){
                                        if($n == $namba[$j]){
                                            $confirm++;
                                        }
                                        if($n2 == $namba[$j]){
                                            $confirm2++;
                                        }
                                    }


                                    echo 
                                        "
                                            <div class='row'>";
                                            if($confirm == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n)' id='$n'><p>$n</p></div>
                                                    ";
                                            }

                                            if($confirm2 == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n2</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n2)' id='$n2'><p>$n2</p></div>
                                                    ";
                                            }
                                                echo "
                                            </div> 
                                        ";
                                    
                                    $n+=4;
                                    $n2+=4;

                                    $confirm = 0;
                                    $confirm2 = 0;
                                }
                            }
                            else{
                                for($j=0; $j<$idadi; $j++){
                                    if($n == $namba[$j]){
                                        $confirm++;
                                    }
                                    if($n2 == $namba[$j]){
                                        $confirm2++;
                                    }
                                }


                                echo 
                                    "
                                        <div class='row'>";
                                        if($confirm == 1){
                                            echo 
                                                "
                                                   <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n</p></div> 
                                                ";
                                        }
                                        else{
                                            echo 
                                                "
                                                    <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n)' id='$n'><p>$n</p></div>
                                                ";
                                        }

                                        if($confirm2 == 1){
                                            echo 
                                                "
                                                   <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n2</p></div> 
                                                ";
                                        }
                                        else{
                                            echo 
                                                "
                                                    <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n2)' id='$n2'><p>$n2</p></div>
                                                ";
                                        }
                                            echo "
                                        </div> 
                                    ";
                                
                                $n+=4;
                                $n2+=4;

                                $confirm = 0;
                                $confirm2 = 0;
                                for($i=1; $i<($seats-7)/4; $i++){
                                    for($j=0; $j<$idadi; $j++){
                                        if($n == $namba[$j]){
                                            $confirm++;
                                        }
                                        if($n2 == $namba[$j]){
                                            $confirm2++;
                                        }
                                    }


                                    echo 
                                        "
                                            <div class='row'>";
                                            if($confirm == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n)' id='$n'><p>$n</p></div>
                                                    ";
                                            }

                                            if($confirm2 == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n2</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n2)' id='$n2'><p>$n2</p></div>
                                                    ";
                                            }
                                                echo "
                                            </div> 
                                        ";
                                    
                                    $n+=4;
                                    $n2+=4;

                                    $confirm = 0;
                                    $confirm2 = 0;
                                }
                            }
                        ?>
                        
                    </div>
                    <div class="left">
                        
                        <?php
                            if(($seats-5) % 4 == 0){
                                for($i=($seats-5)/4; $i<($seats-5)/2; $i++){
                                    for($j=0; $j<$idadi; $j++){
                                        if($n3 == $namba[$j]){
                                            $confirm++;
                                        }
                                        if($n4 == $namba[$j]){
                                            $confirm2++;
                                        }
                                    }


                                    echo 
                                        "
                                            <div class='row'>";
                                            if($confirm == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n3</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n3)' id='$n3'><p>$n3</p></div>
                                                    ";
                                            }

                                            if($confirm2 == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n4</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n4)' id='$n4'><p>$n4</p></div>
                                                    ";
                                            }
                                                echo "
                                            </div> 
                                        ";
                                    
                                    $n3+=4;
                                    $n4+=4;

                                    $confirm = 0;
                                    $confirm2 = 0;
                                }

                            }
                            else{
                                for($i=($seats-7)/4; $i<($seats-7)/2; $i++){
                                    for($j=0; $j<$idadi; $j++){
                                        if($n3 == $namba[$j]){
                                            $confirm++;
                                        }
                                        if($n4 == $namba[$j]){
                                            $confirm2++;
                                        }
                                    }


                                    echo 
                                        "
                                            <div class='row'>";
                                            if($confirm == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n3</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n3)' id='$n3'><p>$n3</p></div>
                                                    ";
                                            }

                                            if($confirm2 == 1){
                                                echo 
                                                    "
                                                       <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n4</p></div> 
                                                    ";
                                            }
                                            else{
                                                echo 
                                                    "
                                                        <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n4)' id='$n4'><p>$n4</p></div>
                                                    ";
                                            }
                                                echo "
                                            </div> 
                                        ";
                                    
                                    $n3+=4;
                                    $n4+=4;

                                    $confirm = 0;
                                    $confirm2 = 0;
                                }
                                $n3-=2;
                                $n4-=2;
                                
                                for($j=0; $j<$idadi; $j++){
                                    if($n3 == $namba[$j]){
                                        $confirm++;
                                    }
                                    if($n4 == $namba[$j]){
                                        $confirm2++;
                                    }
                                }


                                echo 
                                    "
                                        <div class='row'>";
                                        if($confirm == 1){
                                            echo 
                                                "
                                                   <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n3</p></div> 
                                                ";
                                        }
                                        else{
                                            echo 
                                                "
                                                    <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n3)' id='$n3'><p>$n3</p></div>
                                                ";
                                        }

                                        if($confirm2 == 1){
                                            echo 
                                                "
                                                   <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n4</p></div> 
                                                ";
                                        }
                                        else{
                                            echo 
                                                "
                                                    <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n4)' id='$n4'><p>$n4</p></div>
                                                ";
                                        }
                                            echo "
                                        </div> 
                                    ";
                                
                                $confirm = 0;
                                $confirm2 = 0;
                                    
                                $n3+=2;
                                $n4+=2;
                            }
                        ?>

                    </div>
                </div>
                <div class="back">
                    <div class="row">

                        <?php
                            if(($seats-5) % 4 == 0){
                                $n3-=2;
                            }
                            for($i=($seats-5); $i<$seats; $i++){
                                for($j=0; $j<$idadi; $j++){
                                    if($n3 == $namba[$j]){
                                        $confirm++;
                                    }
                                }
                                if($confirm == 1){
                                    echo 
                                        "
                                           <div class='seat'><img src='media/icons/filled.png' class='seat' style='cursor:default;'><p>$n3</p></div> 
                                        ";
                                }
                                else{
                                    echo 
                                        "
                                            <div class='seat'><img src='media/icons/available.png' class='seat' onclick='choose($n3)' id='$n3'><p>$n3</p></div>
                                        ";
                                }
                                $n3++;

                                $confirm = 0;
                                $confirm2 = 0;
                            }

                        ?>

                    </div>
                </div>
            </div>
            <p class="expose">Done</p>
            <div class="chosen">
                <?php echo "<form action='via.php?from=$from&&to=$to&&bus=$bus_no&&date=$date' method='POST' name='chosen' class='chosen-form'>";?>
                    <label>Chosen seat(s):</label><br>
                    <textarea name="seats" class="seats" cols="15" rows="1" id="seats"></textarea>
                    <center><button class="register" onclick="reg()" name="register">Confirm</button></center>
                </form>
            </div>
        </div>
        <div class="footer">
        <div class="footer_content">
            <div class="footer_logo">
                <a href="index.html"><img src="media/icons/logo.jpeg" class="logo_photo"></a>
            </div>
            <div class="quick">
                <h1>Go to</h1>
                <a href="index.html">Homepage</a>
                <a href="gallery.html">Gallery</a>
                <a href="login.html">Login</a>
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
                <form action="review.php" name="review" method="POST">
                    <input type="text" name="name" id="jina" placeholder="Name">
                    <p class="attent" id="nameattent"></p>
                    <input type="email" name="email" id="pepe" placeholder="Email">
                    <p class="attent" id="emailattent"></p>
                    <textarea name="commentation" id="ujumbe" placeholder="Write your comments here..."></textarea>
                    <p class="attent" id="commentattent"></p>
                    <button class="comment_send" onclick="comment()">Send</button>
                </form>
            </div>
        </div>
        <p class="last">&copy; Royal Liner Express 2024.</p>
    </div> 
</body>
<script src="js/navBar.js"></script>
<script src="js/seats.js"></script>
<script src="js/review.js"></script>
</html>