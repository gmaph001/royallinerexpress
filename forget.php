<?php

    include "connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $key = rand(100000, 999999);

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if(isset($_POST['confirm'])){

        $email = $_POST['key'];

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($email === $row['email']){

                    $id = $row['userkey'];
                    $firstname = $row['firstname'];

                    $mail = new PHPMailer(true);

                    try {
                        
                        $mail->isSMTP(); 
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'gmaphtechnologies@gmail.com';
                        $mail->Password   = 'zsltnnonpqwwzzgi';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;
                    
                        
                        $mail->SMTPOptions = [
                            'ssl' => [
                                'verify_peer'       => false,
                                'verify_peer_name'  => false,
                                'allow_self_signed' => true,
                            ],
                        ];
                    
                        
                        $mail->setFrom('gmaphtechnologies@gmail.com', 'ROYAL LINER EXPRESS');
                        $mail->addAddress($email);
                    
                        
                        $mail->isHTML(true);
                        $mail->Subject = 'Key Confirmation.';
                        $mail->Body    = "
                            <h1>Dear {$firstname}, your OTP is: </h1>
                            <h2>{$key}</h2>
                        ";
                    
                        if ($mail->send()) {
                            $query2 = "UPDATE admin SET OTP = '$key' WHERE userkey = '$id'";
                            $result2 = mysqli_query($db, $query2);
                            if($result2){
                                header("location:confirm2.php?id=$id");
                            }
                            else{
                                $message = "There was an error!";
                            }
                        } else {
                            $message = "Key could not be sent. <br> Mailer Error: {$mail->ErrorInfo}";
                        }
                    } catch (Exception $e) {
                        $message = "Key could not be sent. <br> Mailer Error: {$mail->ErrorInfo}";
                    }
                    break;
                }
                else{
                    $message = "Sorry! The account with this email was not found!";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Forget Password</title>
</head>
<body>
    <div class="body">
        <div class="result">
            <p><?php echo $message ?></p>
        </div>
    </div>
</body>
</html>