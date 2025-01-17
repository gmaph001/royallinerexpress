<?php

    include "connection.php";

    $message1 = "";
    $message2 = "";
    

    if(isset($_POST['rev_send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['commentation'];

        $message = mysqli_real_escape_string($db, $comment);

        $reviewkey = rand(100000000, 999999999);
        $status = "not approved";

        $query0 = "SELECT * FROM reviews";
        $result0 = mysqli_query($db, $query0);

        if(mysqli_num_rows($result0)>0){
            for($i=0; $i<mysqli_num_rows($result0); $i++){
                $row = mysqli_fetch_array($result0);

                if($reviewkey === $row['reviewkey']){
                    $reviewkey = rand(100000000, 999999999);
                }
            }
        }

        $query = "INSERT INTO reviews(name, email, message, status, reviewkey) VALUES('$name', '$email', '$message', '$status', '$reviewkey')";
        $result = mysqli_query($db, $query);

        if($result){
            $message1 .= "Thank you for your review!";
        }
        else{
            $message .= "Error while submitting review!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="review.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Review</title>
</head>
<body>
    <div class="content">
        <?php
            if($message2 === ""){
                echo 
                    "
                        <div class='message'>
                            <img src='media/icons/check.png' class='check'>
                            <p>$message1</p>
                        </div>
                    ";
            }
            else{
                echo 
                    "
                        <div class='message'>
                            <img src='media/icons/warning.png' class='check'>
                            <p>$message1</p>
                        </div>
                    ";
            }
        ?>
    </div>
</body>
</html>