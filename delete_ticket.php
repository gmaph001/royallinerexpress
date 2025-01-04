<?php

    include "connection.php";
    include "addr.php";

    $id = $_GET['id'];
    $no = $_GET['no'];

    $tickets = 0;

    $stat = false;
    $stat2 = false;
    $stat3 = false;
    $stat4 = false;

    $query = "SELECT * FROM passenger_info";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($no === $row['userkey']){
                $billkey = $row['bill_id'];
                $bus = $row['bus_no'];
                $fare = $row['fare'];

                $delquery = "DELETE FROM passenger_info WHERE userkey = '$no'";
                $delresult = mysqli_query($db, $delquery);

                if($delresult){
                    echo "Ticket deleted successfully!";
                    $stat = true;
                    break;
                }
                else{
                    echo "Error while deleting the ticket!";
                }
            }
        }
    }

    $query2 = "SELECT * FROM performance";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($billkey === $row['bill_key']){
                $tickets = $row['tickets'];
                $income = $row['income'];
                $income -= $fare;
                $tickets--;

                $query3 = "UPDATE performance SET tickets = '$tickets', income = '$income' WHERE bill_key = '$billkey'";
                $result3 = mysqli_query($db, $query3);

                if($result3){

                    $querybill = "SELECT * FROM billing";
                    $resultbill = mysqli_query($db, $querybill);

                    if($resultbill){
                        for($i=0; $i<mysqli_num_rows($resultbill); $i++){
                            $row = mysqli_fetch_array($resultbill);

                            if($billkey === $row['bill_key']){
                                
                                $querybillup = "UPDATE billing SET bill = '$income' WHERE bill_key = '$billkey'";
                                $resbillup = mysqli_query($db, $querybillup);

                                if($resbillup){
                                    echo "Tickets updated successfully in performance!";
                                    $stat2 = true;
                                    break;
                                }
                                else{
                                    echo "Failed to update bill!";
                                }
                            }
                        }
                    }
                }
                else{
                    echo "Error while updating tickets in performance";
                }
            }
        }
    }

    $query4 = "SELECT * FROM performance";
    $result4 = mysqli_query($db, $query4);

    if($result4){
        for($i=0; $i<mysqli_num_rows($result4); $i++){
            $row = mysqli_fetch_array($result4);

            if($billkey === $row['bill_key']){
                $tickets = $row['tickets'];

                if($tickets === "0"){
                    $delquery1 = "DELETE FROM performance WHERE bill_key = '$billkey'";
                    $delresult1 = mysqli_query($db, $delquery1);

                    if($delresult1){
                        echo "Record deleted successfully in performance!";
                        $stat3 = true;
                    }
                    else{
                        echo "Error while deleting record in performance!";
                    }

                    $delquery2 = "DELETE FROM billing WHERE bill_key = '$billkey'";
                    $delresult2 = mysqli_query($db, $delquery2);

                    if($delresult2){
                        echo "Bill deleted successfully!";
                        $stat4 = true;
                        break;
                    }
                    else{
                        echo "Error while deleting bill!";
                    }
                }
            }
        }
    }

    $query5 = "SELECT * FROM bus_info";
    $result5 = mysqli_query($db, $query5);

    if($result5){
        for($i=0; $i<mysqli_num_rows($result5); $i++){
            $row = mysqli_fetch_array($result5);

            if($bus === $row['bus_no']){
                $filled = $row['filled'];
                $filled--;

                $query6 = "UPDATE bus_info SET filled = '$filled' WHERE bus_no = '$bus'";
                $result6 = mysqli_query($db, $query6);

                if($result6){
                    $stat3 = true;
                }
                else{
                    echo "Error while updating bus info!";
                }
            }
        }
    }

    if($stat && $stat2 && $stat3){
        header("location:correct_ticket.php?id=$id");
    }
    else{
        echo "check errors!";
    }