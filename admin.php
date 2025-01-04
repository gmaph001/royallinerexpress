<?php

    error_reporting(0);

    include "connection.php";

    $message;

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['pword'];

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)>0){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($username === $row['username']){
                if($password === $row['password']){
                    $id = $row['userkey'];
                    $querysec = "UPDATE admin SET security = '$ip' WHERE userkey = '$id'";
                    $resultsec = mysqli_query($db, $querysec);

                    if($resultsec){
                        header("location:admin_home.php?id=$id");
                    }
                    else{
                        $message = "Error! Code 001";
                    }
                }
                else{
                    $message = "Incorrect Password! Please, <br> <a href='login.php'><i>try again</i></a>";
                }
            }
            else{
                $message = "Incorrect Username! Please, <br><br> <a href='login.php'><i>try again</i></a> <br>";
            }
        }
    }
    else{
        $message = "There is no any registered account yet! Please, register to start. <br><br> <a href='login.php'>Register</a><br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | login</title>
</head>
<body>
    <div class="body">
        <div class="result">
            <p><?php echo $message ?></p>
        </div>
    </div>
</body>
</html>