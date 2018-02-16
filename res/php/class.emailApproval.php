<?php

require 'PHPMailer-master/PHPMailerAutoload.php';

class emailApproval {

    function mail_status($sname, $shipemail, $consign_no, $st) {
        $mail = new PHPMailer();
        $name = $sname;
        $email = $shipemail;
        $id = $consign_no;
        $status = ucwords($st);
        $message = '<html>
<body>
    <div style="border-left: 15px solid #330066;border-right: 15px solid #330066">
        <div>
            <div style="background-color: #9933cc;height: 20vh">
            <img src="https://bizcalteam.000webhostapp.com/res/img/logo.png" alt="logo" style="height:90px;width:90px;padding:2vh">
            <p style="float:right;color: white;font-weight: bold;padding: 7vh;font-size: 2vmin">Status: ' . $status . '</p>
            </div>
            <div>
           <center> <p>
            Hi ' . $name . ',<br/><br/>
                Your percel has been ' . $status . '!<br/><br/>
                Your percel with unique id ' . $id . ' has been ' . $status . ' successsfully. Hope you like our service.<br/>
                Thank you.<br/><br/>
            </p></center>
              <center><a href="https://bizcalteam.000webhostapp.com/track.php"><input type="button" style="background-color: #9933cc;border:0;width: 80%;color:white;font-weight: bold" value="Track Your Percel"></a></center><br/><br/><br/>
            </div>
            <div style="background-color: #312b36;height: 40vh;background-image: url(https://bizcalteam.000webhostapp.com/res/img/overlay.png)">
            <center>
                <p style="color: white;font-size: 4vmin;padding-top: 2vh">To send us feedback or your query e-mail us at</p>
                <a href="bizcalteam@gmail.com" style="color: white;font-size: 5vmin">FastCourier@gmail.com</a>
                <p style="color: white;font-size: 4vmin">For more information visit</p>
            <a href="" ><img src="https://bizcalteam.000webhostapp.com/res/img/Facebook.png" style="width: 30px;height: 30px"></a>
            <a href="" ><img src="https://bizcalteam.000webhostapp.com/res/img/Google+.png" style="width: 30px;height: 30px"></a>
            <a href="" ><img src="https://bizcalteam.000webhostapp.com/res/img/Twitter.png" style="width: 30px;height: 30px"></a></center>
                    
            </div>
            <div style="background-color: #9933cc;height: auto">
            <p style="float:right;color: white;font-weight: bold;padding: 2vh;font-size: 2vmin">FastCourier</p>
            <img src="https://bizcalteam.000webhostapp.com/res/img/logo.png" alt="logo" style="height:50px;width:50px;padding:1vh">
            </div>
        </div>
    </div>
</body>
</html>';
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "bizcalteam@gmail.com";
        $mail->Password = "ENQUIRYbizcal";
//$mail->isSendmail();
        $mail->setFrom('bizcalteam@gmail.com', 'FastCourier');
        $mail->addReplyTo('noreply@noreply.com', 'FastCourier');
        $mail->addAddress($shipemail, $name);
        $mail->Subject = 'FastCourier Shipment Status';
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->AltBody = 'This is a plain-text message body';
//$mail->addAttachment('PHPMailer-master/examples/images/phpmailer_mini.png');
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo " An acknowledgement message sent to " . $name;
        }
    }

}

?>