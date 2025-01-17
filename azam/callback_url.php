<?php
    include '../connection.php'; // Include your database connection file

    // Log incoming request data for debugging
    $rawData = file_get_contents('php://input');

    // Check and log headers to ensure 'Content-Type' is correct
    $headers = getallheaders();
    file_put_contents('debug.log', "Headers:\n" . print_r($headers, true));

    // Check if the Content-Type is application/json
    if (isset($headers['Content-Type']) && $headers['Content-Type'] !== 'application/json') {
        echo "Invalid Content-Type header.";
        exit;
    }

    // Log raw input to verify the body content
    file_put_contents('debug.log', "Raw Body:\n" . $rawData . "\n", FILE_APPEND);

    // Check if raw data is empty
    if (empty($rawData)) {
        echo "Empty request body.";
        exit;
    }

    // Decode JSON data
    $callbackData = json_decode($rawData, true);

    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON decoding error: " . json_last_error_msg();
        exit;
    }

    // Extract the relevant fields from the callback data
    $externalId = $callbackData['externalId'] ?? null;
    $status = $callbackData['status'] ?? null;
    $amount = $callbackData['amount'] ?? null; // Optional, depending on your needs

    // Validate if we have the necessary data
    if ($externalId === null || $status === null) {
        echo "Missing necessary data.";
        exit;
    }

    // Validate payment status
    if ($status === "SUCCESS") {
        // Update the database with payment success
        $stmt = $conn->prepare("UPDATE passenger_info SET pay_status = ? WHERE bill_Id = ?");
        $pay_status = "Success";
        $stmt->bind_param("ss", $pay_status, $externalId); // Assuming 'bill_Id' corresponds to 'externalId'

        if ($stmt->execute()) {
            echo "Payment successfully updated for Transaction ID: $externalId.";
        } else {
            echo "Error updating payment status: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Handle failure or other statuses
        echo "Payment not successful. Status: $status";
    }

    $conn->close();
?>
