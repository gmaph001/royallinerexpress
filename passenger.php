<?php

    require "connection.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $bus_no = $_GET['bus'];
    $seats = $_GET['seats'];
    $class;
    $fare;
    $filled;

    $firstname = [];
    $secondname = [];
    $lastname = [];
    $seat = [];
    $userkey = [];
    $size = 0;

    $k = 0;

    $siti = [];
    $size = 0;

    $query0 = "SELECT * FROM bus_info";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($bus_no === $row['bus_no']){
                $class = $row['class'];
                $fare = $row['fare'];
                $filled = $row['filled'];
            }
        }
    }

    $billkey = rand(100000000, 999999999);

    $querybill = "SELECT * FROM billing";
    $resultbill = mysqli_query($db, $querybill);

    if(mysqli_num_rows($resultbill)>0){
        for($i=0; $i<mysqli_num_rows($resultbill); $i++){
            $row = mysqli_fetch_array($resultbill);

            if($billkey === $row['bill_key']){
                $billkey = rand(100000000, 999999999);
            }
        }
    }

    if(isset($_POST['register'])){
        $number = $_POST['watu'];

        for($i=0; $i<$number; $i++){
            $firstname[$size] = $_POST['firstname'.$i+1];
            $secondname[$size] = $_POST['secondname'.$i+1];
            $lastname[$size] = $_POST['lastname'.$i+1];
            $seat[$size] = $_POST['seat'.$i+1];
            $fare = $_POST['fare'.$i+1];

            $userkey[$size] = rand(100000000, 999999999);

            $size++;
        }
    }

    for($j=0; $j<$size; $j++){
        $query = "INSERT INTO passenger_info(firstname, secondname, lastname, departure, arrival, class, fare, bus_no, seat_no, tarehe, userkey, bill_id) VALUES('$firstname[$j]', '$secondname[$j]', '$lastname[$j]', '$from', '$to', '$class', '$fare', '$bus_no', '$seat[$j]', '$date', '$userkey[$j]', '$billkey')";
        $result = mysqli_query($db, $query);

        if($result){
            echo "Done!";
        }
        else{
            echo "Error while registering!";
        }
        echo "<br>";
    }

    echo "<br>";

    $filled+=$size;

    $query2 = "UPDATE bus_info SET filled = '$filled' WHERE bus_no='$bus_no'";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        echo "Bus info altered!";
    }
    else{
        echo "failed to alter the bus info!";
    }