<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['sub_info'])){
        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $marry = $_POST['marry'];
        $phone = $_POST['phone'];
        $residential = $_POST['residential'];

        $query = "UPDATE admin SET firstname = '$firstname', secondname = '$secondname', lastname = '$lastname', username = '$username', birthdate = '$birthdate', marital_status = '$marry', phone_no = '$phone', email = '$email', residential = '$residential' WHERE userkey = '$id'";
        $result = mysqli_query($db, $query);

        if($result){
            header("location:account.php?id=$id");
        }
        else{
            $message = "Error when updating info!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | login</title>
</head>
<body>
    <div class="body">
        <div class="result">
            <p><?php echo $message ?></p>
        </div>
    </div>
</body>
</html>