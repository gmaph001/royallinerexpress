<?php

    require "connection.php";

    $billkey = $_GET['bill'];
    $total = 0;

    $query0 = "SELECT * FROM passenger_info";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($row['bill_id'] === $billkey){
                $total += $row['fare'];
            }
        }
    }

    if(isset($_POST['reg_bill'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $time = date('H:m');
            $date = date('Y-m-d');
        }
    }

    $query = "INSERT INTO billing(bill_name, phone, email, bill, bill_time, bill_date, bill_key) VALUES('$name', '$phone', '$email', '$total', '$time', '$date', '$billkey')";
    $result = mysqli_query($db, $query);

    if($result){
        echo "Bill registered!";
    }
    else{
        echo "Error registering bill!";
    }