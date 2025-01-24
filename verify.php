<?php

    require "connection.php";

    include 'azam/azampay.php';

    $billkey = $_GET['bill'];
    $amount = 0;

    $query0 = "SELECT * FROM passenger_info";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($row['bill_id'] === $billkey){
                $amount += $row['fare'];
            }
        }
    }

    if(isset($_POST['reg_bill'])){
        $name = $_POST['name'];
        $accountNumber = $_POST['phone'];
        $email = $_POST['email'];
        $provider = $_POST['method'];
        $currency = "TZS";

        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $time = date('H:m');
            $date = date('Y-m-d');
        }
    }

    $query2 = "SELECT * FROM passenger_info";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($row['bill_id'] === $billkey){
                $departure = $row['departure'];
            }
        }
    }

    $query3 = "SELECT * FROM admin";
    $result3 = mysqli_query($db, $query3);

    if($result3){
        for($i=0; $i<mysqli_num_rows($result3); $i++){
            $row = mysqli_fetch_array($result3);

            if($row['office'] === $departure && $row['rank'] === "agent"){
                $handler = $row['userkey'];
                break;
            }
        }
    }

    $billquery = "INSERT INTO bill_notification(bill_key, bill_name, method, account_no, email, bill, bill_time, bill_date, handler_key) VALUES('$billkey', '$name', '$provider', '$accountNumber', '$email', '$amount', '$time', '$date', '$handler')";
    $billresult = mysqli_query($db, $billquery);

    if($billresult){
        echo "Bill sent successfully!";
    }
    else{
        echo "Error while registering bill!";
    }