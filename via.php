<?php

    require "connection.php";

    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $bus_no = $_GET['bus'];
    
    $seats = $_POST['seats'];

    header("location:register.php?from=$from&&to=$to&&date=$date&&bus=$bus_no&&seats=$seats");