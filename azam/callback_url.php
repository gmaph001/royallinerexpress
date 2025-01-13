<?php
    include '../connection.php'; // Include your database connection file

    $billkey = $_GET['bill'];

    
    $rawData = file_get_contents('php://input');

    
    $headers = getallheaders();
    file_put_contents('debug.log', "Headers:\n" . print_r($headers, true));

    
    if (isset($headers['Content-Type']) && $headers['Content-Type'] !== 'application/json') {
        echo "Invalid Content-Type header.";
        exit;
    }

    
    file_put_contents('debug.log', "Raw Body:\n" . $rawData . "\n", FILE_APPEND);

    
    if (empty($rawData)) {
        echo "Empty request body.";
        exit;
    }

    
    $callbackData = json_decode($rawData, true);

    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON decoding error: " . json_last_error_msg();
        exit;
    }

    
    $externalId = $callbackData['externalId'] ?? null;
    $status = $callbackData['status'] ?? null;
    $amount = $callbackData['amount'] ?? null; // Optional, depending on your needs

    
    if ($externalId === null || $status === null) {
        echo "Missing necessary data.";
        exit;
    }

    
    if ($status === "SUCCESS") {
        
        $stmt = $conn->prepare("UPDATE passenger_info SET pay_status = ? WHERE bill_Id = ?");
        $pay_status = $status;
        $stmt->bind_param("ss", $pay_status, $externalId); 

        if ($stmt->execute()) {
            echo "Payment successfully updated for Transaction ID: $externalId.";
        } else {
            echo "Error updating payment status: " . $stmt->error;
        }
        $stmt->close();
    } else {
        
        echo "Payment not successful. Status: $status";
    }

    $conn->close();
?>
