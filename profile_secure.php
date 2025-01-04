<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['sub_secure'])){
        $oldpassword = $_POST['password'];
        $newpassword = $_POST['newpassword'];

        $querycheck = "SELECT * FROM admin";
        $check = mysqli_query($db, $querycheck);

        if($check){
            for($i=0; $i<mysqli_num_rows($check); $i++){
                $row = mysqli_fetch_array($check);

                if($row['userkey'] === $id){
                    if($row['password'] === $oldpassword){
                        $query = "UPDATE admin SET password = '$newpassword' WHERE userkey = '$id'";
                        $result = mysqli_query($db, $query);

                        if($result){
                            header("location:account.php?id=$id");
                        }
                        else{
                            $message = "Error while updating password!";
                        }
                    }
                    else{
                        $message = "You have entered incorrect old password! Please confirm your password! <br><br> <a href='account.php?id=$id'>Try Again</a><br><br>";
                    }
                }
            }
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