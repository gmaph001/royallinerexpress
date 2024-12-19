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

    // Initiate payment
    list($response, $externalId) = azampay::mnocheckout($accountNumber, $amount, $currency, $provider);

    // Check if the payment initiation was successful
    if (isset($response->success) && $response->success) {
        echo "Payment initiated successfully. Please wait for confirmation...";
        // Redirect to callback handler
        header("Location:azam/callback_url.php?externalId=$externalId&name=$name&email=$email&&bill=$billkey");
    } else {
        echo "Payment initiation failed. Please try again.";
    }


    // $query = "INSERT INTO billing(bill_name, phone, email, bill, bill_time, bill_date, bill_key) VALUES('$name', '$phone', '$email', '$total', '$time', '$date', '$billkey')";
    // $result = mysqli_query($db, $query);



    // if($result){
    //     echo "Bill registered!";
    // }
    // else{
    //     echo "Error registering bill!";
    // }