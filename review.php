<?php

    include "connection.php";
    

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
            echo "Review submitted successfully!";
        }
        else{
            echo "Error while submitting review!";
        }
    }