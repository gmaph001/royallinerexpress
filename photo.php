<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

    $message = "";

    if(isset($_POST['sub_photo'])){
        $photofile = $_FILES['photo']['tmp_name'];
        $photoname = $_FILES['photo']['name'];
      
        $photo = "media/images/drivers/".$photoname;

        move_uploaded_file($photofile, $photo);

        $query = "SELECT * FROM driver_info";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($key === $row['driver_key']){
                    $query2 = "UPDATE driver_info SET photo = '$photo' WHERE driver_key = '$key'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        header("location:drivers.php?id=$id");
                    }
                    else{
                        $message .= "Error while updating photo!<br><br>";
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