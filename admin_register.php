<?php

    require "connection.php";
    include "addr.php";

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

    include "connection.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
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
    <link rel="stylesheet" type="text/css" href="css/register.css">
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
                        echo 
                            "
                                <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'><p>1</p></a>
                                <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                            ";
                    ?>
                </div>
            </div>
            <div class="forms" style="margin-top:-3vh;">
                <div class='passenger'>
                    
                <?php

                    echo "<form name='passenger' class='register' action='admin_passenger.php?id=$id&&from=$from&&to=$to&&date=$date&&bus=$bus_no&&seats=$seat' method='POST' enctype='multipart/form-data'>";
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
                    
                        <button class='checkout' onclick='checkout()' name='register'>Register</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&copy; Royal Liner Express 2024.</p>
            </div>  
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
</html>