<?php
    session_start();
    include "connection.php";

    $security1 = false;
    $security2 = false;
    $id = $_GET['id'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if(isset($_SESSION['userkey']) && $_SESSION['userkey'] == $id){
        if(isset($_SESSION['userID']) && $_SESSION['userID'] === $_SERVER['HTTP_USER_AGENT']){
            $security2 = true;
        }
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                if($ip === $row['security']){
                    
                    $security1 = true;
                    break;
                }
            }
        }
    }

    if(!$security1){
        header("location:login.php");
    }
    else if(!$security2){
        header("location:login.php");
    }
