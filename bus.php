<?php

    error_reporting(0);

    require "connection.php";

    $id = $_GET['id'];
    $refresh = [];
    $size = 0;

    $message = "";

    $query0 = "SELECT * FROM bus_info";
    $result0 = mysqli_query($db, $query0);

    if(isset($_POST['register'])){
        $bus_no = $_POST['bus_no'];
        $seats = $_POST['seats'];
        $class = $_POST['class'];
        $fare = $_POST['fare'];

        $local = date_default_timezone_set('Africa/Nairobi');

        if($local){
            $day = date('d')+1;

            $date = date('Y-m-'.$day);
        }

        for($i=1; $i<7; $i++){
            if($_POST['fresh'.$i] == NULL){
                continue;     
            }
            else{
                $refresh[$size] = $_POST['fresh'.$i];
                $size++;
            }
        }

        $from = strtoupper($_POST['from']);
        $to = strtoupper($_POST['to']);
        $eta = $_POST['eta'];
        $confirm = false;
        $buses = false;
        $buses2 = false;
        $route_ID;

        if($result0){
            if(mysqli_num_rows($result0)>0){
                for($i=0; $i<mysqli_num_rows($result0); $i++){
                    $row = mysqli_fetch_array($result0);

                    if($row['bus_no'] === $bus_no){
                        $buses = true;
                        break;
                    }

                }
            }
            else{
                $buses2 = true;
                $query = "INSERT INTO bus_info(bus_no, seats, class, fare, position, op_date) VALUES('$bus_no', '$seats', '$class', '$fare', '$from', '$date')";
                $result = mysqli_query($db, $query);

                for($i=0; $i<$size; $i++){
                    $query2 = "UPDATE bus_info SET $refresh[$i] = 'available' WHERE bus_no = '$bus_no'";
                    $result2 = mysqli_query($db, $query2);
                }

                $query3 = "SELECT * FROM routes";
                $result3 = mysqli_query($db, $query3);

                if($result3){
                    if(mysqli_num_rows($result3)>0){
                        for($i=0; $i<mysqli_num_rows($result3); $i++){
                            $row = mysqli_fetch_array($result3);

                            if($row['departure'] === $from && $row['destination'] === $to){
                                $route_ID = $row['route_ID'];
                                $confirm = true;
                                break;
                            }
                        }
                    }
                }

                if($confirm){
                    $query4 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$bus_no'";
                    $result4 = mysqli_query($db, $query4);
                }
                else{
                    $query5 = "INSERT INTO routes(departure, destination, eta) VALUES('$from', '$to', '$eta')";
                    $result5 = mysqli_query($db, $query5);
                    $queryx = "INSERT INTO routes(departure, destination, eta) VALUES('$to', '$from', '$eta')";
                    $resultx = mysqli_query($db, $queryx);
                }

                $query3 = "SELECT * FROM routes";
                $result3 = mysqli_query($db, $query3);

                if($result3){
                    for($i=0; $i<mysqli_num_rows($result3); $i++){
                        $row = mysqli_fetch_array($result3);

                        if($row['departure'] === $from && $row['destination'] === $to){
                            $route_ID = $row['route_ID'];
                            $query4 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$bus_no'";
                            $result4 = mysqli_query($db, $query4);
                            break;
                        }
                    }
                }

                if($result && $result2 && $result4){
                    header("location:buses.php?id=$id");
                }
                else{
                    $message .= "Error<br><br>";
                }
            }
        }

        if($buses){
            $message .= "The bus is already registered!<br><br>";
        }
        else if(!$buses2){
            $query = "INSERT INTO bus_info(bus_no, seats, class, fare, position, op_date) VALUES('$bus_no', '$seats', '$class', '$fare', '$from', '$date')";
            $result = mysqli_query($db, $query);

            for($i=0; $i<$size; $i++){
                $query2 = "UPDATE bus_info SET $refresh[$i] = 'available' WHERE bus_no = '$bus_no'";
                $result2 = mysqli_query($db, $query2);
            }

            $query3 = "SELECT * FROM routes";
            $result3 = mysqli_query($db, $query3);

            if($result3){
                if(mysqli_num_rows($result3)>0){
                    for($i=0; $i<mysqli_num_rows($result3); $i++){
                        $row = mysqli_fetch_array($result3);

                        if($row['departure'] === $from && $row['destination'] === $to){
                            $route_ID = $row['route_ID'];
                            $confirm = true;
                            break;
                        }
                    }
                }
            }

            if($confirm){
                $query4 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$bus_no'";
                $result4 = mysqli_query($db, $query4);
            }
            else{
                $query5 = "INSERT INTO routes(departure, destination, eta) VALUES('$from', '$to', '$eta')";
                $result5 = mysqli_query($db, $query5);
                $queryx = "INSERT INTO routes(departure, destination, eta) VALUES('$to', '$from', '$eta')";
                $resultx = mysqli_query($db, $queryx);
            }

            $query3 = "SELECT * FROM routes";
            $result3 = mysqli_query($db, $query3);

            if($result3){
                for($i=0; $i<mysqli_num_rows($result3); $i++){
                    $row = mysqli_fetch_array($result3);

                    if($row['departure'] === $from && $row['destination'] === $to){
                        $route_ID = $row['route_ID'];
                        $query4 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$bus_no'";
                        $result4 = mysqli_query($db, $query4);
                        break;
                    }
                }
            }

            if($result && $result2 && $result4){
                header("location:buses.php?id=$id");
            }
            else{
                $message .= "Error<br><br>";
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