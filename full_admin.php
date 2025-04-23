<?php

    include "connection.php";

    $id = $_GET['id'];


    if(isset($_POST['register'])){

        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $office = $_POST['office'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $marriage = $_POST['marry'];
        $residential = $_POST['residential'];
        $rank = $_POST['rank'];
        
        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $reg_date = date('Y-m-d');
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

    }

    

    $query0 = "SELECT * FROM admin";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($id === $row['userkey']){
                $query = "UPDATE admin SET firstname = '$firstname', secondname = '$secondname', lastname = '$lastname', birthdate = '$birthdate', gender = '$gender', marital_status = '$marriage', phone_no = '$phone', residential = '$residential', rank = '$rank', reg_date = '$reg_date', office = '$office', security = '$ip' WHERE userkey = '$id'";
                $result = mysqli_query($db, $query);

                if($result){
                    header("location:via2.php?id=$id");
                }
                else{
                    echo "Error during registration!";
                }
            }
        }
    }