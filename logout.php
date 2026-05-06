<?php

    require "connection.php";

    session_destroy();
    session_unset();    

    $id = $_GET['id'];
    $nothing = "out";

    $query1 = "SELECT * FROM admin";
    $result1 = mysqli_query($db, $query1);

    for($i=0; $i<mysqli_num_rows($result1); $i++){
        $row = mysqli_fetch_array($result1);

        if($id === $row['userkey']){
            $query = "UPDATE admin SET security = '$nothing' WHERE userkey = '$id'";
            $result = mysqli_query($db, $query);

            if($result){
                header("Location: login.php");
            }
            else{
                echo "Error while updating data!";
            }
        }
    }

?>