<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $no = $_GET['no'];

    $message = "";

    $checkpoint = false;
    $checkpoint2 = false;
    $checkpoint3 = false;

    if(isset($_POST['sub_info'])){
        $departure = strtoupper($_POST['from']);
        $arrival = strtoupper($_POST['to']);
        $eta = $_POST['eta'];
        $fare = $_POST['fare'];
        $position = $_POST['position'];
        $status = $_POST['status'];

        $query = "SELECT * FROM routes";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($departure === $row['departure'] && $arrival === $row['destination']){
                    $route_ID = $row['route_ID'];
                    $checkpoint = true;

                    if($eta === $row['eta']){
                        continue;
                    }
                    else{
                        $query2 = "UPDATE routes SET eta = '$eta' WHERE route_ID = '$route_ID'";
                        $result2 = mysqli_query($db, $query2);

                        if($result2){
                            $message .= "Route ID updated successfully!<br><br>";
                        }
                        else{
                            $message .= "Failed to update route!<br><br>";
                        }
                    }
                }
            }
        }

        if($checkpoint){
            $query3 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$no'";
            $result3 = mysqli_query($db, $query3);

            if($result3){
                $checkpoint2 = true;
            }
            else{
                $message .= "Failed to update route ID in bus info!<br><br>";
            }
        }
        else{
            $query4 = "INSERT INTO routes(departure, destination, eta) VALUES('$departure', '$arrival', '$eta')";
            $result4 = mysqli_query($db, $query4);
            $query5 = "INSERT INTO routes(departure, destination, eta) VALUES('$arrival', '$departure', '$eta')";
            $result5 = mysqli_query($db, $query5);

            if($result5 && $result4){
                $message .= "New route added!<br><br>";
                $checkpoint3 = true;
            }
            else{
                $message .= "Failed to add new route!<br><br>";
            }
        }

        if($checkpoint3){
            $query6 = "SELECT * FROM routes";
            $result6 = mysqli_query($db, $query6);

            if($result6){
                for($i=0; $i<mysqli_num_rows($result6); $i++){
                    $row = mysqli_fetch_array($result6);

                    if($departure === $row['departure'] && $arrival === $row['destination']){
                        $route_ID = $row['route_ID'];

                        $query7 = "UPDATE bus_info SET route_ID = '$route_ID' WHERE bus_no = '$no'";
                        $result7 = mysqli_query($db, $query7);

                        if($result7){
                            $message .= "Route ID in bus_info updated successfully!<br><br>";
                        }
                        else{
                            $message .= "Failed to update route ID in bus_info!<br><br>";
                        }
                    }
                }
            }
        }

        $query8 = "UPDATE bus_info SET fare = '$fare', position = '$position', status = '$status' WHERE bus_no = '$no'";
        $result8 = mysqli_query($db, $query8);

        if($result8){
            $message .= "Bus info updated successfully!<br><br>";
            header("location:buses.php?id=$id");
        }
        else{
            $message .= "Failed to update bus info!<br><br>";
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