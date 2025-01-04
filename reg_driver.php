<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $userchk = false;

    $message = "";

    if(isset($_POST['register'])){
        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $marital_status = $_POST['marry'];
        $home = $_POST['residential'];
        $licence = $_POST['licence'];
        $experience = $_POST['experience'];
        $email = $_POST['email'];
        $key = rand(100000000, 999999999);

        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $reg_date = date('Y-m-d');
        }

        $query = "SELECT * FROM driver_info";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($username === $row['username']){
                    $userchk = true;
                    break;
                }

                if($key === $row['driver_key']){
                    $key = rand(100000000, 999999999);
                }
            }
        }
        else{
            $userchk = false;
        }
    }

    if(!$userchk){
        $query2 = "INSERT INTO driver_info(firstname, secondname, lastname, username, birthdate, phone_no, gender, marital_status, residential, licence_no, experience, email, joining_date, driver_key) VALUES('$firstname', '$secondname', '$lastname', '$username', '$birthdate', '$phone', '$gender', '$marital_status', '$home', '$licence', '$experience', '$email', '$reg_date', '$key')";
        $result2 = mysqli_query($db, $query2);

        if($result2){
            header("location:driver_photo.php?id=$id&&key=$key");
        }
        else{
            $message .= "Error while inserting data! <br><br>";
        }
    }
    else{
        $message .= "Username already exists, choose another username! <br><br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Driver</title>
</head>
<body>
    <div class="body">
        <div class="result">
            <p><?php echo $message ?></p>
        </div>
    </div>
</body>
</html>