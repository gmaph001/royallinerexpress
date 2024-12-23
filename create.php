<?php

    include "connection.php";

    if(isset($_POST['sajili'])){

        $username = $_POST['username2'];
        $email = $_POST['email'];
        $password = $_POST['password1'];
        $userkey = rand(100000000, 999999999);

        $query0 = "SELECT * FROM admin";
        $result0 = mysqli_query($db, $query0);

        if(mysqli_num_rows($result0)>0){
            for($i=0; $i<mysqli_num_rows($result0); $i++){
                $row = mysqli_fetch_array($result0);

                if($userkey === $row['userkey']){
                    $userkey = rand(100000000, 999999999);
                }
            }
        }
        
        $query = "INSERT INTO admin(username, email, password, userkey) VALUES('$username', '$email', '$password', '$userkey')";
        $result = mysqli_query($db, $query);

        if($result){
            header("location:more_info.php?id=$userkey");
        }
        else{
            echo "Error while registering!";
        }


    }