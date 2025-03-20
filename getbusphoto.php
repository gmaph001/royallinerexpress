<?php

    require "connection.php";
    require "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['kusanya'])){
        $file = $_FILES['pic']['tmp_name'];
        $filename = $_FILES['pic']['name'];

        $folder = "media/images/".$filename;
        $photo = "media/images/".$filename;

        move_uploaded_file($file, $folder);

        $photokey = rand(100000000, 999999999);

        $querychk = "SELECT * FROM chk_photos";
        $resultchk = mysqli_query($db, $querychk);

        if(mysqli_num_rows($resultchk)>0){
            for($i=0; $i<mysqli_num_rows($resultchk); $i++){
                $row = mysqli_fetch_array($resultchk);

                if($photokey === $row['photo_key']){
                    $photokey = rand(100000000, 999999999);
                }
            }
        }

        $query = "INSERT INTO chk_photos(photo_name, photo_key) VALUES('$photo', '$photokey')";
        $result = mysqli_query($db, $query);

        if($result){
            header("location:photo_prep.php?id=$id&&key=$photokey");
        }
        else{
            echo "Error while inserting photo in database!";
        }
    }