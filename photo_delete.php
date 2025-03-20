<?php
    require "connection.php";
    require "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

    $query = "SELECT * FROM chk_photos";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($key === $row['photo_key']){
                $photoname = $row['photo_name'];
            }
        }
    }

    $query2 = "DELETE FROM chk_photos WHERE photo_key='$key'";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        header("location:busphoto.php?id=$id");
    }
    else{
        echo "Error while deleting data in database!";
    }