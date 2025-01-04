<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $message = "";

    $local = date_default_timezone_set('Africa/Nairobi');

    if($local){
        $date = date('Y-m-d');
        $todate = str_split($date);

        $day = "";

        for($i=0; $i<10; $i++){
            if($todate[$i] === "-"){
                continue;
            }
            else{
                $day .= $todate[$i];
            }
        }

        $today = intval($day);
    }

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $rank = $row['rank'];

                if($rank === "manager"){

                    $query2 = "SELECT * FROM performance";
                    $result2 = mysqli_query($db, $query2);
                    

                    if($result2){
                        for($i=0; $i<mysqli_num_rows($result2); $i++){
                            $row = mysqli_fetch_array($result2);

                            $billkey = $row['bill_key'];
                            $date2 = $row['bill_date'];

                            $todate2 = str_split($date2);

                            $day2 = "";

                            for($j=0; $j<10; $j++){
                                if($todate2[$j] === "-"){
                                    continue;
                                }
                                else{
                                    $day2 .= $todate2[$j];
                                }
                            }

                            $theday = intval($day2);

                            if($today === $theday){
                                $query3 = "UPDATE performance SET financial_status = 'closed' WHERE bill_key = '$billkey'";
                                $result3 = mysqli_query($db, $query3);

                                if($result3){
                                    header("location:admin_tickets.php?id=$id");
                                }
                                else{
                                    $message .= "Error while closing financial day!<br><br>";
                                }
                            }
                            
                        }
                    }
                }
                else{

                    $query4 = "SELECT * FROM performance";
                    $result4 = mysqli_query($db, $query4);

                    if($result4){
                        for($i=0; $i<mysqli_num_rows($result4); $i++){
                            $row = mysqli_fetch_array($result4);

                            if($id === $row['user_ID']){
                                $billkey = $row['bill_key'];
                                $date2 = $row['bill_date'];

                                $todate2 = str_split($date2);

                                $day2 = "";

                                for($j=0; $j<10; $j++){
                                    if($todate2[$j] === "-"){
                                        continue;
                                    }
                                    else{
                                        $day2 .= $todate2[$j];
                                    }
                                }

                                $theday = intval($day2);

                                if($today === $theday){
                                    $query5 = "UPDATE performance SET financial_status = 'closed' WHERE bill_key = '$billkey'";
                                    $result5 = mysqli_query($db, $query5);

                                    if($result5){
                                        header("location:admin_tickets.php?id=$id");
                                    }
                                    else{
                                        $message .= "Error while closing financial day!<br><br>";
                                    }
                                }
                                else{
                                    $message .= "Cannot close financial day since you are overdue!<br><br>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Driver</title>
</head>
<body>
    <div class="body">
        <div class="result">
            <p><?php echo $message ?></p>
        </div>
    </div>
</body>
</html>