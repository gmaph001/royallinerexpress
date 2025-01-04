<?php

    require "connection.php";
    include "addr.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $bus_no = $_GET['bus'];
    
    $seats = $_POST['seats'];

    $id = $_GET['id'];

    header("location:admin_register.php?id=$id&&from=$from&&to=$to&&date=$date&&bus=$bus_no&&seats=$seats");