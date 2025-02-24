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
            
            $query4 = "SELECT * FROM bill_notification";
            $result4 = mysqli_query($db, $query4);

            if($result4){
                for($i=0; $i<mysqli_num_rows($result4); $i++){
                    $row1 = mysqli_fetch_array($result4);

                    if($key === $row1['notify_ID']){
                        $billkey = $row1['bill_key'];

                        $query5 = "SELECT * FROM passenger_info";
                        $result5 = mysqli_query($db, $query5);

                        if($result5){
                            for($i=0; $i<mysqli_num_rows($result5); $i++){
                                $row2 = mysqli_fetch_array($result5);

                                if($billkey === $row2['bill_id']){
                                    $userkey = $row2['userkey'];
                                    $status = "paid";

                                    $query6 = "UPDATE passenger_info SET pay_status = '$status' WHERE userkey = '$userkey'";
                                    $result6 = mysqli_query($db, $query6);

                                    if($result6){
                                        header("location:notifications.php?id=$id");
                                    }
                                    else{
                                        echo "Error while updating passenger info!";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            echo "Error while updating notification table!";
        }
    }
    else{
        echo "Error while updating admin table!";
    }