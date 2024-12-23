<?php

    include "connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $id = $_GET['id'];

    $confirm = false;

    $confirmkey = rand(100000, 999999);

    $firstname;

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $firstname = $row['firstname'];
                $secondname = $row['secondname'];
                $lastname = $row['lastname'];
                $rank = $row['rank'];

                $queryconfirm = "UPDATE admin SET confirmkey = '$confirmkey' WHERE userkey = '$id'";
                $resultconf = mysqli_query($db, $queryconfirm);

                if($resultconf){
                    echo "Done!";
                }
                else{
                    echo "Failed!";
                }
            }
        }
    }

    $query0 = "SELECT * FROM admin";
    $result0 = mysqli_query($db, $query0);

    if($result0){
        for($i=0; $i<mysqli_num_rows($result0); $i++){
            $row = mysqli_fetch_array($result0);

            if($row['rank'] === "manager"){

                
                $email = $row['email'];
                $subject = 'Your OTP is: ';

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
                        <h1>The key for {$firstname} {$secondname} {$lastname}, who wants to be {$rank} is: </h1>
                        <h2>{$confirmkey}</h2>
                        <p>Please if you consent, send him/her this key for confirmation of the account.</p>
                    ";
                
                    if ($mail->send()) {
                        header("location:confirm.php?id=$id");
                    } else {
                        echo "Message could not be sent. <br> Mailer Error: {$mail->ErrorInfo}";
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. <br> Mailer Error: {$mail->ErrorInfo}";
                }
                
            }
        }
    }