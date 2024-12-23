<?php

    include "connection.php";

    $id = $_GET['id'];

    $message;

    if(isset($_POST['confirm'])){
        $key = $_POST['key'];

        $query = "SELECT * FROM admin";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($id === $row['userkey']){
                    if($key === $row['OTP']){
                        header("location:resetpass.php?id=$id");
                    }
                    else{
                        $message = "You have entered incorrect key, please <br><br> <a href='confirm2.php?id=$id'>try again</a>";
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