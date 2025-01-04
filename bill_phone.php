<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['confirm'])){
        $phone = $_POST['key'];
        $billkey = $_POST['billkey'];

        $query = "SELECT * FROM billing";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($row['bill_key'] === $billkey){
                    $query2 = "UPDATE billing SET phone = '$phone' WHERE bill_key = '$billkey'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        header("location:admin_tickets.php?id=$id");
                    }
                    else{
                        echo "Error while registering phone number!";
                    }
                }
            }
        }
    }