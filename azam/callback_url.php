<?php
    include '../connection.php'; // Include your database connection file

    // Read callback data from Azampay
    $callbackData = file_get_contents("php://input");
    $callbackData = json_decode($callbackData, true);

    if (!$callbackData) {
        http_response_code(400);
        echo "Invalid callback data.";
        exit;
    }

    // Extract required information
    $externalId = $callbackData['externalId'] ?? null;
    $status = $callbackData['status'] ?? null;

    // Validate the payment status
    if ($status === "SUCCESS") {
        // Update the database with payment success
        $stmt = $conn->prepare("UPDATE passenger_info SET pay_status = ? WHERE bill_Id = ?");
        $pay_status = "Success";
        $stmt->bind_param("ss", $pay_status);

        if ($stmt->execute()) {
            echo "Payment successfully updated for Transaction ID: $externalId.";
        } else {
            echo "Error updating payment status: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Handle failure or other status
        echo "Payment not successful. Status: $status";
    }

    $conn->close();
?>
