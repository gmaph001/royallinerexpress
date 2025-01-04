<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $userchk = false;
    $message = "";

    $siku = "";
    $siku2 = "";

    if(isset($_POST['signoff'])){
        $username = $_POST['username'];
        $departure = $_POST['depart'];
        $arrival = $_POST['arrival'];
        $bus_no = $_POST['bus_no'];

        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $date = date('Y-m-d');

            $day = intval(date('d'));
            $day++;
            $month = intval(date('m'));
            $year = intval(date('Y'));

            
            if($day > 28){
                if($day > 29){
                    if($month == 2 && $year%4 == 0){
                        $day = 1;
                        $month++;
                    }
                    else{ 
                        if($day > 30){
                            if($month == 4 || $month == 6 || $month == 9 || $month == 11){
                                $day = 1;
                                $month++;
                            }
                            else{
                                if($day > 31){
                                    if($month == 12){
                                        $day = 1;
                                        $month = 1;
                                        $year++;
                                    }
                                    else{
                                        $day = 1;
                                        $month++;
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    if($month == 2){
                        $day = 1;
                        $month++;
                    }
                }
            }

            $date2 = date("$year-$month-$day");

            // $message .= $date2."<br><br>"3
            

        }

        $query = "SELECT * FROM driver_info";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($username === $row['username']){
                    $userchk = true;
                    break;
                }
            }
        }
    }

    if($userchk){
        $query2 = "UPDATE driver_info SET bus_ID = '$bus_no', area_confirm = '$arrival', date_confirm = '$date' WHERE username = '$username'";
        $result2 = mysqli_query($db, $query2);

        if($result2){
            $message .= "Driver updated successfully! <br><br>";

            $query3 = "SELECT * FROM routes";
            $result3 = mysqli_query($db, $query3);

            if($result3){
                for($i=0; $i<mysqli_num_rows($result3); $i++){
                    $row = mysqli_fetch_array($result3);

                    if($arrival === $row['departure']){
                        $route_ID = $row['route_ID'];
                        $filled = 0;

                        $query4 = "UPDATE bus_info SET op_date = '$date2', filled = '$filled', position = '$arrival', route_ID = '$route_ID' WHERE bus_no = '$bus_no'";
                        $result4 = mysqli_query($db, $query4);

                        if($result4){
                            $message .= "Bus info updated successfully! <br><br>";

                            $query5 = "SELECT * FROM passenger_info";
                            $result5 = mysqli_query($db, $query5);

                            if($result5){
                                for($j=0; $j<mysqli_num_rows($result5); $j++){
                                    $row = mysqli_fetch_array($result5);

                                    if($bus_no === $row['bus_no']){
                                        $tarehe = str_split($row['tarehe']);

                                        for($k=0; $k<10; $k++){
                                            if($tarehe[$k] === "-"){
                                                continue;
                                            }
                                            else{
                                                $siku .= $tarehe[$k];
                                            }
                                        }

                                        $sik = intval($siku);

                                        $query7 = "SELECT * FROM bus_info";
                                        $result7 = mysqli_query($db, $query7);

                                        if($result7){
                                            for($l=0; $l<mysqli_num_rows($result7); $l++){
                                                $row = mysqli_fetch_array($result7);

                                                if($bus_no === $row['bus_no']){
                                                    $tarehe2 = str_split($row['op_date']);

                                                    for($k=0; $k<10; $k++){
                                                        if($tarehe2[$k] === "-"){
                                                            continue;
                                                        }
                                                        else{
                                                            $siku2 .= $tarehe2[$k];
                                                        }
                                                    }

                                                    $sik2 = intval($siku2);
                                                }
                                            }
                                        }

                                        if($sik >= $sik2){
                                            $filled++;

                                            $query6 = "UPDATE bus_info SET filled = '$filled' WHERE bus_no = '$bus_no'";
                                            $result6 = mysqli_query($db, $query6);

                                            if($result6){
                                                $message .= "Bus info updated successfully!<br><br>";
                                                header("location:drivers.php?id=$id");
                                            }
                                        }
                                    }

                                    $siku = "";
                                    $siku2 = "";
                                }
                            }
                        }
                        else{
                            $message .= "Error while updating bus info! <br><br>";
                        }
                    }
                }
            }
            else{
                $message .= "Error while fetching routes! <br><br>";
            }
        }
        else{
            $message .= "Error while updating driver! <br><br>";
        }

    }
    else{
        $message .= "Username not found! <br><br>";
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