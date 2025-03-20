<?php

    require "connection.php";
    require "addr.php";

    $id = $_GET['id'];

    if(isset($_POST['subExp'])){
        echo "Matumizi";
    }

    if(isset($_POST['subFuel'])){
        echo "Mafuta!";
    }