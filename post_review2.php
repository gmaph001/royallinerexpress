<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $key = $_GET['key'];

    $status = " not approved";

    $message = "";

    $query = "SELECT * FROM reviews";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($key === $row['reviewkey']){
                $query2 = "UPDATE reviews SET status = '$status' WHERE reviewkey = '$key'";
                $result2 = mysqli_query($db, $query2);

                if($result2){
                    $message .= "Review updated successfully!";
                    header("location: admin_review.php?id=$id");
                }
                else{
                    $message .= "Failed to update review!";
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