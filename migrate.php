<?php

    require "connection.php";

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $pass = $row['password'];
            $userkey = $row['userkey'];

            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $query2 = "UPDATE admin SET password = '$hash' WHERE userkey = '$userkey'";
            $result2 = mysqli_query($db, $query2);

            if($result2){
                echo "User: $userkey updated succefully!";
            }
            else{
                echo "Failed to update User: $userkey!";
            }
        }
    }