<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

    $query = "SELECT * FROM driver_info";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['driver_key'] === $key){
                $delquery = "DELETE FROM driver_info WHERE driver_key = '$key'";
                $delresult = mysqli_query($db, $delquery);

                if($delresult){
                    header("location:see_driver.php?id=$id");
                }
                else{
                    echo "Error while deleting driver!";
                }
            }
        }
    }