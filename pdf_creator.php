<?php

    require "vendor/autoload.php";
    require "connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $bill = $_GET['bill'];

    $message = "";

    $user = [];
    $firstname = [];
    $secondname = [];
    $lastname = [];
    $tarehe = [];
    $departure = [];
    $arrival = [];
    $fare = [];
    $seat = [];
    $bus_no = [];
    $size = 0;

    $query = "SELECT * FROM passenger_info";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($bill === $row['bill_id']){
                $user[$size] = $row['userkey'];
                $firstname[$size] = $row['firstname'];
                $secondname[$size] = $row['secondname'];
                $lastname[$size] = $row['lastname'];
                $tarehe[$size] = $row['tarehe'];
                $departure[$size] = $row['departure'];
                $arrival[$size] = $row['arrival'];
                $fare[$size] = $row['fare'];
                $seat[$size] = $row['seat_no'];
                $bus_no[$size] = $row['bus_no'];
                $size++;
            }
        }
    }

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $dompdf->setPaper("A4", "portrait");
    $html = "";

    for($j=0; $j<$size; $j++){
        $name = $firstname[$j]." ".$secondname[$j]." ".$lastname[$j];
        $html .= 
                "
                    <html>
                    <head>
                        <meta charset='UTF-8'>
                        <style>
                            body{
                                overflow-x: hidden;
                            }
                            .main{
                                padding: 15vh 15vw;
                            }
                            .ticket{
                                border-radius: 20px;
                                box-shadow: 0px 0px 5px 5px rgba(255, 102, 0, 0.502);
                                width: 60vw;
                                margin: auto;
                            }
                            .heading{
                                padding: 2vh 2vw;
                                border-radius: 20px 20px 0px 0px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                            }
                            .logo{
                                width: 50px;
                                height: 50px;
                            }
                            .header{
                                text-align: center;
                                color: rgb(82, 0, 109);
                                font-family: Baguet Script;
                            }
                            .content{
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                border: 2px solid black;
                                padding: 20px;
                                border-radius: 20px;
                                margin: auto;
                            }
                            .details{
                                padding: 2vh 2vw;
                            }
                            span{
                                color: rgb(0, 0, 0);
                                font-size: 16pt;
                                margin-bottom: 2vh;
                            }
                            .detail{
                                font-weight: bold;
                                color: rgb(255, 102, 0);
                            }
                            .footing{
                                padding: 2vh 3vw;
                                border-radius: 0px 0px 20px 20px;
                                margin: auto;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                            }
                            .motto{
                                text-align: center;
                                font-size: 14pt;
                                font-weight: bold;
                                color: aliceblue;
                                font-family:Baguet Script;
                                margin-bottom: 1vh;
                                color: rgb(82, 0, 109);
                            }
                            .social{
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                width: 10vw;
                            }
                            .icons{
                                width: 30px;
                                height: 30px;
                                border-radius: 10px;
                            }
                            .name{
                                font-size: 14pt;
                                font-weight: bold;
                                text-align: center;
                                color: rgb(82, 0, 109);
                            }
                            .contact{
                                font-size: 14pt;
                                font-weight: bold;
                                color: rgb(82, 0, 109);
                                text-align: center;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='main'>
                            <div class='ticket'>
                                <div class='heading'>
                                    <h1 class='header'>ROYAL LINER EXPRESS</h1>
                                </div>
                                <div class='content'>
                                    <div class='details'>
                                        <center><span><b>Ticket No: </b></span><span class='detail'>$user[$j]</span></center><br><br>
                                        <span>Name: </span><span class='detail'>$name</span><br><br>
                                        <span>Date of Travel: </span><span class='detail'>$tarehe[$j]</span><br><br>
                                        <span>From: </span><span class='detail'>$departure[$j]</span><br><br>
                                        <span>To: </span><span class='detail'>$arrival[$j]</span><br><br>
                                        <span>Fare: </span><span class='detail'>Tshs. $fare[$j]/=</span><br><br>
                                        <span>Seat Number: </span><span class='detail'>$seat[$j]</span><br><br>
                                        <span>Bus No: </span><span class='detail'>$bus_no[$j]</span>
                                    </div>                
                                </div>
                                <div class='footing'>
                                    <p class='motto'>Travel With Us Royally!</p>
                                    <p class='name'>@royallinerexpress</p>
                                    <p class='contact'>Tel: +255 626 303 582</p>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
                ";
    }
    $dompdf->loadHtml($html);
    $dompdf->render();
    $pdffile = "media/tickets/ticket_".$bill.".pdf";
    file_put_contents($pdffile, $dompdf->output());
    $dompdf->addInfo("Title", "ROYAL LINER TICKET NO: $bill");
    $dompdf->addInfo("Author", "ROYAL LINER EXPRESS");
    $dompdf->stream("ticket.pdf");

    $query2 = "SELECT * FROM bill_notification";
    $result2 = mysqli_query($db, $query2);

    if($result2){
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);

            if($bill === $row['bill_key']){
                $email = $row['email'];
                $name = $row['bill_name'];
            }
        }
    }

    $mail = new PHPMailer(true);

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
    $mail->Subject = 'ROYAL LINER EXPRESS TICKET.';
    $mail->Body    = "
        <h1>Dear {$name}, here is your ticket: </h1>
        $html
    ";

    if($mail->send()){
        header("location:success.php?code=101");
    }
    else{
        header("location:success.php?code=404");
    }
?>