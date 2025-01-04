<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $no = $_GET['no'];
    $edited = 0;

    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $lastname = $_POST['lastname'];

        $query = "UPDATE passenger_info SET firstname = '$firstname', secondname = '$secondname', lastname = '$lastname' WHERE userkey = '$no'";
        $result = mysqli_query($db, $query);

        if($result){

            $query2 = "SELECT * FROM passenger_info";
            $result2 = mysqli_query($db, $query2);

            if($result2){
                for($i=0; $i<mysqli_num_rows($result2); $i++){
                    $row = mysqli_fetch_array($result2);

                    if($no === $row['userkey']){
                        $billkey = $row['bill_id'];

                        $query3 = "SELECT * FROM performance";
                        $result3 = mysqli_query($db, $query3);

                        if($result3){
                            for($j=0; $j<mysqli_num_rows($result3); $j++){
                                $row = mysqli_fetch_array($result3);
                                $status = "corrected";
                                $edited = $row['no_edited'];
                                $edited++;

                                if($billkey === $row['bill_key']){
                                    $query4 = "UPDATE performance SET status = '$status', no_edited = '$edited' WHERE bill_key = '$billkey'";
                                    $result4 = mysqli_query($db, $query4);

                                    if($result4){
                                        header("location:correct_ticket.php?id=$id");
                                    }
                                    else{
                                        echo "Error while updating performance!";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            echo "Error while updating passenger's info!";
        }
    }