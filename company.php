<?php
    include "connection.php";
    include "addr.php";
    include "timer.php";

    $id = $_GET['id'];
    $income = 0;
    $date = date('d/m/Y');

    $query = "SELECT * FROM billing";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $income += $row['bill'];
        }
    }

    $query2 = "SELECT * FROM admin";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

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
    <link rel="stylesheet" type="text/css" href="css/company.css">
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
                <div class="content-sidebar">
                    <div class="links">
                        <a href="company.html" class="unga current">
                            <img src="media/icons/home-icon.png" class="icons">
                            Overview
                        </a>
                        <a href="company.html" class="unga">
                            <img src="media/icons/income.png" class="icons">
                            Income
                        </a>
                        <?php echo "<a href='expense.php?id=$id' class='unga'>";?>
                            <img src="media/icons/expenses.png" class="icons">
                            Expenses
                        </a>
                        <a href="company.html" class="unga">
                            <img src="media/icons/personel.png" class="icons">
                            Personel
                        </a>
                        <?php echo "<a href='busphoto.php?id=$id' class='unga'>";?>
                            <img src="media/icons/photo.png" class="icons">
                            Photo
                        </a>
                    </div>
                </div>
                <div class="content-body">
                    <div class="date">
                        <?php echo "<p>Data as per $date</p>";?>
                    </div>
                    <div class="content-data">
                        <div class="income">
                            <p class="title">Total Income</p>
                            <?php echo "<p class='data'>Tshs. $income/=</p>";?>
                        </div>
                        <div class="expenses">
                            <p class="title">Total Expenses</p>
                            <p class="data">Tshs. 1,000,000/=</p>
                        </div>
                        <div class="profit">
                            <p class="title">Total Profit</p>
                            <p class="data">Tshs. 1,000,000/=</p>
                        </div>
                    </div>
                    <div class="content-data">
                        <div class="percent">
                            <p class="title">% Profit</p>
                            <p class="data profit-perce">+8%</p>
                        </div>
                        <div class="comment">
                            <p class="title">Comment</p>
                            <p class="data comment-data">"The Company is doing very well!"</p>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <p class="right">Pending</p>
                    <div class="list">
                        <ol type="1">
                            <li><a href="#">Fumbuka Limbu</a></li>
                            <li><a href="#">Omar Mohammed</a></li>
                            <li><a href="#">George Maphole</a></li>
                        </ol>
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