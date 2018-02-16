<?php

require 'PHPMailer-master/PHPMailerAutoload.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
} else {

    $mail = new PHPMailer();
//    $name = 'r';
//    $email = 'hrupanjan@gmail.com';
//    $phone = '98';
//    $msg = 'hello';

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $msg = $_REQUEST['message'];

    $body = '<html>
<body>
    <div style="border-left: 15px solid #330066;border-right: 15px solid #330066">
        <div>
            <div style="background-color: #9933cc;height: 20vh">
            <img src="https://bizcalteam.000webhostapp.com/res/img/logo.png" alt="logo" style="height:90px;width:90px;padding:2vh">
            
            </div>
            <div>
           <center> <p>
           



<pre>
    ' . $msg . '
    </pre>
    


            </p></center>
              <center><input type="button" style="background-color: #9933cc;border:0;width: 80%;color:white;font-weight: bold" value="User Message"></center><br/><br/><br/>
            </div>
            <div style="background-color: #312b36;height: 40vh;background-image: url(https://bizcalteam.000webhostapp.com/res/img/overlay.png)">
            <center>
                <p style="color: white;font-size: 4vmin;padding-top: 2vh">Mail by</p>
                <p style="color: white;font-size: 5vmin">' . $name . ' (' . $phone . ')</p>
                <a href="' . $email . '" style="color: white;font-size: 3vmin">' . $email . '</a>
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
    $mail->setFrom($email, $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress('bizcalteam@gmail.com', 'FastCourier');
    $mail->Subject = 'User Message';
    $mail->isHTML(true);
    $mail->Body = $body;
    $mail->AltBody = 'This is a plain-text message body';
//$mail->addAttachment('PHPMailer-master/examples/images/phpmailer_mini.png');
    if (!$mail->send()) {
        die("Mailer Error: " . $mail->ErrorInfo);
    } else {
        die("Your message has been sent...");
    }
}
?>