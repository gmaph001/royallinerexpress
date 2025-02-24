<?php

    require("connection.php");
    require("addr.php");

    $id = $_GET['id'];
    $key = $_GET['key'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                $unread = $row['unread'];
            }
        }
    }

    if($unread == 0){
        $unread = 0;
    }
    else{
        $unread--;
    }
    $status = "opened";

    $query2 = "UPDATE admin SET unread = '$unread' WHERE userkey = '$id'";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        echo "Admin Table updated successfully!";
        $query3 = "UPDATE bill_notification SET status = '$status' WHERE notify_ID = '$key'";
        $result3 = mysqli_query($db, $query3);

        if($result3){
            echo "Notification table updated successfully!";
        }
        else{
            echo "Error while updating notification table!";
        }
    }
    else{
        echo "Error while updating admin table!";
    }