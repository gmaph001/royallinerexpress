<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $check = false;
    $message = "";

    if(isset($_POST['register_route'])){
        $from = strtoupper($_POST['from']);
        $to = strtoupper($_POST['to']);
        $eta = $_POST['eta'];

        $query = "SELECT * FROM routes";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)>0){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($row['departure'] === $from && $row['destination'] === $to){
                    $check = true;
                    break;
                }
            }
        }

        if($check){
            $message .= "Route already registered!<br><br>";
        }
        else{
            $query2 = "INSERT INTO routes(departure, destination, eta) VALUES('$from', '$to', '$eta')";
            $query3 = "INSERT INTO routes(departure, destination, eta) VALUES('$to', '$from', '$eta')";
            $result2 = mysqli_query($db, $query2);
            $result3 = mysqli_query($db, $query3);

            if($result2 && $result3){
                header("location:admin_route.php?id=$id");
            }
            else{
                $message .= "Error while registering route!<br><br>";
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