<?php

    include "connection.php";
    include "addr.php";
    include "timer.php";

    $from = $_POST['depart'];
    $to = $_POST['destination'];
    $date = $_POST['date'];
    $id = $_GET['id'];

        
    header("location: admin_selection.php?id=$id&&from=$from&&to=$to&&date=$date");
       