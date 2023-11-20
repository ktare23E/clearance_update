<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require '/vendor/autoload.php';

require '../phpmailer/vendor/autoload.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';



function sendEmail($email,$subject,$message) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer();

    try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            // $mail->Host       = 'smtp@gmail.com';                     //Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            // $mail->Username   = 'kristiankharl.tare@nmsc.edu.com';                     //SMTP username
            // $mail->Password   = '2019-70227';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('student.clearance@nmsc.edu.ph', 'Online Clearance System');

            if(is_array($email)){
                foreach($email as $e){
                    $mail->addAddress($e, 'Admin');     //Add a recipient
                }

            }else{
                $mail->addAddress($email, 'Admin');     //Add a recipient
            }
            // $mail->addAddress($email, 'Admin');     //Add a recipient
            // $mail->addAddress('tare.kristian@gmail.ph');               //Name is optional
            // $mail->addReplyTo('tare.kristian@gmail.ph', 'Information');
            // $mail->addCC('tare.kristian@gmail.ph');
            // $mail->addBCC('tare.kristian@gmail.ph');
        
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            // $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}