<?php

    require "connection.php";

    include 'azam/azampay.php';

    $billkey = $_GET['bill'];
    $amount = 0;
    $agents = [];
    $notify = [];
    $unread = [];
    $size = 0;

    $addunread = 0;

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
                $agents[$size] = $row['userkey'];
                $notify[$size] = $row['notifications'];
                $unread[$size] = $row['unread'];
                $size++;
            }
        }
    }

    $low = 0;
    $lowpart = $notify[$low];
    $theone = 0;
    $notifier = true;

    for($i=0; $i<$size; $i++){
        echo "$agents[$i] : $notify[$i]";
        echo "<br>";
    }

    echo $low;
    echo "<br>";

    for($j=1; $j<$size; $j++){
        if($notify[$low] === $notify[$j]){
            continue;
        }
        else{
            $notifier = false;
            $theone += $j;
            break;
        }
    }

    if($notifier){
        $handler = $agents[$low];
        $notification = $notify[$low];
        $addunread += $unread[$low];
    }
    else{
        $handler = $agents[$theone];
        $notification = $notify[$theone];
        $addunread += $unread[$theone];
    }

    $notification++;
    $addunread++;
    

    echo "$handler <br> $theone <br>";


    $billquery = "INSERT INTO bill_notification(bill_key, bill_name, method, account_no, email, bill, bill_time, bill_date, handler_key) VALUES('$billkey', '$name', '$provider', '$accountNumber', '$email', '$amount', '$time', '$date', '$handler')";
    $billresult = mysqli_query($db, $billquery);

    if($billresult){
        echo "Bill sent successfully!<br>";
    }
    else{
        echo "Error while registering bill!<br>";
    }

    $query4 = "SELECT * FROM admin";
    $result4 = mysqli_query($db, $query4);

    for($i=0; $i<mysqli_num_rows($result4); $i++){
        $row = mysqli_fetch_array($result4);

        if($handler === $row['userkey']){
            $query5 = "UPDATE admin SET notifications = '$notification', unread = '$addunread' WHERE userkey = '$handler'";
            $result5 = mysqli_query($db, $query5);

            if($result5){
                echo "Admin Table updated successfully!";
                header("location: payUp.php?key=$billkey");
            }
            else{
                echo "Error while updating admin table!";
            }
        }
    }