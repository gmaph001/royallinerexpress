<?php

    error_reporting(0);

    include "connection.php";
    include "addr.php";
    include "timer.php";

    $message = "";

    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['pword']);

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $query = "SELECT * FROM admin";
        $result = mysqli_query($db, $query);

        $exist = False;

        if(mysqli_num_rows($result)>0){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($username === $row['username']){
                    $hash = $row['password'];
                    if(password_verify($password, $hash)){
                        $id = $row['userkey'];
                        $querysec = "UPDATE admin SET security = '$ip' WHERE userkey = '$id'";
                        $resultsec = mysqli_query($db, $querysec);

                        session_set_cookie_params(0);
                        session_start();
                        session_regenerate_id(true);
                            

                        $_SESSION['userkey'] = $id;
                        $_SESSION['userID']  = $_SERVER['HTTP_USER_AGENT'];

                        if($resultsec){
                            $exist = True;
                            break;
                        }
                        else{
                            $message .= "Error! Code 001";
                        }
                    }
                }
            }
        }
        else{
            $message .= "There is no any registered account yet! Please, register to start. <br><br> <a href='login.php'>Register</a><br>";
        }

        if($exist){
            header("location: admin_home.php?id=$id");
        }
        else{
            $message .= "Incorrect Username or Password! <br><br> <a href='login.php'>Try Again</a><br>";
        }
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