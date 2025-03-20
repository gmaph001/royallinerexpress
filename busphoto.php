<?php
    require "connection.php";
    require "addr.php";

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
    <link rel="stylesheet" type="text/css" href="css/busphoto.css">
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
                <div class="pic-form">
                    <div class="note">
                        <p>You can upload the photos of your bus here!</p>
                    </div>
                    <img src="media/icons/plus.png" class="add-pic"><br><br>
                    <?php echo "<form action='getbusphoto.php?id=$id' name='photo' enctype='multipart/form-data' method='POST'>";?>
                        <input type="file" name="pic" id="picha" onchange="showup()"><br>
                        <p class="alertmsg" id="altmsg"></p><br>
                        <button class="submit" name="kusanya" onclick="check()">Submit</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>    
</body>
<script src="js/admin_navBar.js"></script>
<script>
    function showup(){
        let input = document.getElementById("picha").value;
        let output = document.getElementById("showpic");

        output = input;

        console.log(output);
    }

    function check(){
        if(document.photo.pic.value === ""){
            document.getElementById("altmsg").innerHTML = "Please choose photo";
            document.photo.pic.style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("altmsg").innerHTML = "";
            document.photo.pic.style.border = "none";
        }
    }
</script>
</html>