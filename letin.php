<?php

    include "connection.php";

    $id = $_GET['id'];

    if(isset($_POST['confirm'])){
        $confirm = $_POST['key'];
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($id === $row['userkey']){
                if($confirm === $row['confirmkey']){
                    header("location:admin_home.php?id=$id");
                }
                else{
                    $delquery = "DELETE FROM admin WHERE userkey = $id";
                    $delresult = mysqli_query($db, $delquery);

                    if($delquery){
                        echo "For Security, your account was deleted!";
                    }
                    else{
                        echo "Error while deleting account!";
                    }
                }
            }
        }
    }