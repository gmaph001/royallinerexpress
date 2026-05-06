<?php

    include "connection.php";
    include "addr.php";
    include "timer.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if(isset($_POST['reset'])){

        $password = $_POST['newpass'];
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($id === $row['userkey']){
                    $query2 = "UPDATE admin SET password = '$hashed' WHERE userkey = '$id'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        header("location:admin_home.php?id=$id");
                    }
                    else{
                        echo "Error!";
                    }
                }
            }
        }
    }