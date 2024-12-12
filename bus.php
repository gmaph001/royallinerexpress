<?php

    error_reporting(0);

    require "connection.php";
    $refresh = [];
    $size = 0;

    $query0 = "SELECT * FROM bus_info";
    $result0 = mysqli_query($db, $query0);

    if(isset($_POST['register'])){
        $bus_no = $_POST['bus_no'];
        $seats = $_POST['seats'];
        $class = $_POST['class'];
        $fare = $_POST['fare'];

        for($i=1; $i<6; $i++){
            if($_POST['fresh'.$i] == NULL){
                continue;
                
            }
            else{
                $refresh[$size] = $_POST['fresh'.$i];
                $size++;
            }
        }

        $from = $_POST['from'];
        $to = $_POST['to'];
        $confirm = false;
        $buses = false;
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
                $query = "INSERT INTO bus_info(bus_no, seats, class, fare) VALUES('$bus_no', '$seats', '$class', '$fare')";
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
                    $query5 = "INSERT INTO routes(departure, destination) VALUES('$from', '$to')";
                    $result5 = mysqli_query($db, $query5);
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
                    echo "Done";
                }
                else{
                    echo "Error";
                }
            }
        }

        if($buses){
            echo "The bus is already registered!";
        }
        else{
            $query = "INSERT INTO bus_info(bus_no, seats, class, fare) VALUES('$bus_no', '$seats', '$class', '$fare')";
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
                $query5 = "INSERT INTO routes(departure, destination) VALUES('$from', '$to')";
                $result5 = mysqli_query($db, $query5);
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
                echo "Done";
            }
            else{
                echo "Error";
            }
        }
        

    }