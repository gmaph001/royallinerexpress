<?php

    $from = $_POST['depart'];
    $to = $_POST['destination'];
    $date = $_POST['date'];

        
    header("location: selection.php?from=$from&&to=$to&&date=$date");
       