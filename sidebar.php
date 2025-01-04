<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $rank = $row['rank'];
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
        <title>ROYAL LINER | Administrator | My Account</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                transition: all 0.5s ease-in-out;
            }
            body{
                border: none;
                padding: 2% 5%;
                background-color: rgb(72, 0, 96);
            }
            ::-webkit-scrollbar{
                width: 2px;
            }
            ::-webkit-scrollbar-track{
                background: rgb(107, 0, 143);;
            }
            .sidebar{
                background-color: rgb(72, 0, 96);
                width: max-content;
                width: 90vw;
                position: absolute;
                scrollbar-width: 5px;
                scrollbar-color: transparent;
                z-index: 100;
                min-height: 100vh;
                height: fit-content;
                animation: slide 1.5s ease-in-out normal;
            }
            .header{
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 5%;
                border-bottom: 2px solid rgb(255, 102, 0);
            }
            .icons{
                width: 35px;
                height: 35px;
            }
            .head{
                background-color: white;
                padding: 2%;
                cursor: pointer;
                border-radius: 10px;
                width: 20px;
                height: 20px;
                box-shadow: 0px 0px 2px 2px rgba(0, 0, 255, 0);
            }
            .head:hover{
                box-shadow: 0px 0px 2px 2px rgba(0, 0, 255, 0.529);
            }
            .header h1{
                font-size: 18pt;
                font-family: candara;
                width: 15vw;
                color: white;
            }
            .vertical_menu{
                display: flex;
                flex-direction: column;
                align-items: left;
                justify-content: center;
                padding: 2vh 1vw;
            }
            .vertical_menu a{
                text-decoration: none;
                color: rgb(255, 255, 255);
                background-color: rgb(107, 0, 143);
                margin-bottom: 3vh;
                padding: 5px 10px;
                font-size: 14pt;
                border-radius: 10px;
                font-weight: bold;
                font-family: candara;
            }
            .vertical_menu a:hover{
                background-color: rgb(255, 102, 0);
                color: white;
            }
            .leave-enter{
                padding-top: 7vh;
                padding: 2vh 1vw;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 80%;
            }
            .leave-enter a{
                text-decoration: none;
                color: white;
                background-color: rgb(255, 102, 0);
                padding: 5px 10px;
                font-size: 14pt;
                font-family: candara;
                border-radius: 10px;
                font-weight: bold;
                width: 100%;
                text-align: center;
                margin: 2vh auto;
            }
            .leave-enter a:hover{
                color: white;
                background-color: black;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="header">
                <h1>ADMIN Panel</h1>
            </div>
            <div class="vertical_menu">
                <?php
                    if($rank === "manager"){
                        echo 
                            "
                                <a href='admin_home.php?id=$id' target='_blank'>Home</a>
                                <a href='admin_tickets.php?id=$id' target='_blank'>Tickets</a>
                                <a href='drivers.php?id=$id' target='_blank'>My Drivers</a>
                                <a href='company.php?id=$id' target='_blank'>My Company</a>
                                <a href='admin_review.php?id=$id' target='_blank'>Review</a>
                            ";
                    }
                    else if($rank === "main"){
                        echo 
                            "
                                <a href='admin_home.php?id=$id' target='_blank'>Home</a>
                                <a href='admin_tickets.php?id=$id' target='_blank'>Tickets</a>
                                <a href='drivers.php?id=$id' target='_blank'>Drivers</a>
                                <a href='admin_review.php?id=$id' target='_blank'>Review</a>
                            ";
                    }
                    else{
                        echo 
                            "
                                <a href='admin_home.php?id=$id' target='_blank'>Home</a>
                                <a href='admin_tickets.php?id=$id' target='_blank'>Tickets</a>
                                <a href='admin_review.php?id=$id' target='_blank'>Review</a>
                            ";
                    }
                    
                ?>
            </div> 
            <div class="leave-enter">
            <?php
                echo 
                    "
                        <a href='index.php' target='_blank'>Go to Client</a>
                    ";
            ?>
            </div>
        </div>
    </body>
</html>