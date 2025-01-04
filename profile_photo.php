<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['sub_photo'])){
        $photo = $_FILES['photo']['tmp_name'];
        $photofile = $_FILES['photo']['name'];

        $folder = "media/images/profiles/".$photofile;

        move_uploaded_file($photo, $folder);

        $query = "UPDATE admin SET photo = '$folder' WHERE userkey = '$id'";
        $result = mysqli_query($db, $query);

        if($result){
            header("location:account.php?id=$id");
        }
        else{
            $message = "Error when updating photo!";
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