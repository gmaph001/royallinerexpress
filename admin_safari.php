<?php

    include "addr.php";

    $from = $_POST['depart'];
    $to = $_POST['destination'];
    $date = $_POST['date'];
    $id = $_GET['id'];

        
    header("location: admin_selection.php?id=$id&&from=$from&&to=$to&&date=$date");
       