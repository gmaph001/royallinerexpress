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
                $photo = $row['photo'];
                $rank = $row['rank'];
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
    <link rel="stylesheet" type="text/css" href="css/admin_home.css">
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
                <div class="performance">
                    <div class="performance-data">
                        <div class="sold">
                            <p class="big">180</p>
                            <p><b>Sold</b></p>
                        </div>
                        <div class="given">
                            <p class="big">200</p>
                            <p><b>Given</b></p>
                        </div>
                        <div class="percentage">
                            <p class="big">98%</p>
                            <p><b>Sales</b></p>
                        </div>
                    </div>
                    <div class="center"></div>
                    <div class="performance-curve">
                        <p class="curve-head">Performance Graph</p>
                        <p><b><i>Performance</i></b></p><br>
                        <div class="bar-graph">
                            <div class="graph">
                                <div class="bar" style="height: 98%;">fgsf</div>
                                <div class="bar" style="height: 40%;">fgsf</div>
                                <div class="bar" style="height: 80%;">fgsf</div>
                                <div class="bar" style="height: 20%;">fgsf</div>
                            </div>
                            <p class="time"><b><i>Months</i></b></p>
                        </div>
                    </div>
                </div>
                <div class="quick">
                    <h1>Quick Access</h1>
                    <div class="quick-access">
                        <?php
                            if($rank === "manager"){
                                echo 
                                    "
                                        <a href='admin_tickets.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Tickets</p>
                                                </div>
                                                <p class='exp'>
                                                    Enter your tickets here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='drivers.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Drivers</p>
                                                </div>
                                                <p class='exp'>
                                                    Monitor your Drivers here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='buses.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Buses</p>
                                                </div>
                                                <p class='exp'>
                                                    Monitor your buses here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='admin_route.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Routes</p>
                                                </div>
                                                <p class='exp'>
                                                    Check routes available here...
                                                </p>
                                            </div>
                                        </a>
                                        
                                    ";
                            }
                            else if($rank === "main"){
                                echo 
                                    "
                                        <a href='admin_tickets.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Tickets</p>
                                                </div>
                                                <p class='exp'>
                                                    Enter your tickets here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='drivers.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Drivers</p>
                                                </div>
                                                <p class='exp'>
                                                    Sign off drivers here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='admin_route.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Routes</p>
                                                </div>
                                                <p class='exp'>
                                                    Check routes available here...
                                                </p>
                                            </div>
                                        </a>
                                        
                                    ";
                            }
                            else{
                                echo 
                                    "
                                        <a href='admin_tickets.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Tickets</p>
                                                </div>
                                                <p class='exp'>
                                                    Enter your tickets here...
                                                </p>
                                            </div>
                                        </a>
                                        <a href='admin_route.php?id=$id'>
                                            <div class='access'>
                                                <div class='access-header'>
                                                    <p class='access-head'>Routes</p>
                                                </div>
                                                <p class='exp'>
                                                    Check routes available here...
                                                </p>
                                            </div>
                                        </a>
                                        
                                    ";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
</html>