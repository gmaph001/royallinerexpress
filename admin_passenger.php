<?php

    require "connection.php";
    include "addr.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $bus_no = $_GET['bus'];
    $seats = $_GET['seats'];
    $id = $_GET['id'];

    $message = "";

    $stat = false;
    $stat2 = false;
    $stat3 = false;
    $stat4 = false;

    $paystatus = "paid";
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
        $query = "INSERT INTO passenger_info(firstname, secondname, lastname, departure, arrival, class, fare, bus_no, seat_no, pay_status, tarehe, userkey, bill_id) VALUES('$firstname[$j]', '$secondname[$j]', '$lastname[$j]', '$from', '$to', '$class', '$fare', '$bus_no', '$seat[$j]', '$paystatus', '$date', '$userkey[$j]', '$billkey')";
        $result = mysqli_query($db, $query);

        if($result){
            $stat = true;
        }
        else{
            $message .= "Error registering passenger!".$i."<br><br>";
            $stat = false;
            break;
        }
        echo "<br>";
    }

    echo "<br>";

    $filled+=$size;
    $fare*=$size;

    $query2 = "UPDATE bus_info SET filled = '$filled' WHERE bus_no='$bus_no'";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        $stat2 = true;
    }
    else{
        $message .= "Error while updating bus info!<br><br>";
        $stat2 = false;
    }

    $adminquery = "SELECT * FROM admin";
    $adminres = mysqli_query($db, $adminquery);

    if($adminres){
        for($i=0; $i<mysqli_num_rows($adminres); $i++){
            $row = mysqli_fetch_array($adminres);

            if($id === $row['userkey']){
                $name = $row['username'];
                $email = $row['email'];
                $phone = $row['phone_no'];
            }
        }
    }

    $local = date_default_timezone_set('Africa/Nairobi');

    if($local){
        $bill_time = Date('H:i:s');
        $bill_date = Date('Y-m-d');
    }

    $query = "INSERT INTO billing(bill_name, phone, email, bill, bill_time, bill_date, bill_key) VALUES('$name', '$phone', '$email', '$fare', '$bill_time', '$bill_date', '$billkey')";
    $result = mysqli_query($db, $query);

    if($result){
        $stat3 = true;
    }
    else{
        $message .= "Failed to enter bill!<br><br>";
        $stat3 = false;
    }

    $query4 = "INSERT INTO performance(user_ID, income, tickets, bill_key, bill_date) VALUES('$id', '$fare', '$size', '$billkey', '$bill_date')";
    $result4 = mysqli_query($db, $query4);

    if($result4){
        $stat4 = true;
    }
    else{
        $message .= "Failed to update Performance!<br><br>";
        $stat4 = false;
    }

    if($stat && $stat2 && $stat3 && $stat4){
        header("location:admin_passenger_no.php?id=$id&&bill=$billkey");
    }
    else{
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
<?php

    }
?>