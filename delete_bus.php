<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $no = $_GET['no'];

    $message = "";

    $query = "DELETE FROM bus_info WHERE bus_no = '$no'";
    $result = mysqli_query($db, $query);

    if($result){
        header("location:buses.php?id=$id");
    }
    else{
        $message .= "Failed to delete bus with no: $no!<br><br>";
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