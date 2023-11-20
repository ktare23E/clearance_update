<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../phpmailer/vendor/autoload.php';

require '../phpmailer/vendor/autoload.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';


function sendEmail($email, $subject, $message) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP settings for your external email provider
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Your SMTP server host
        $mail->SMTPAuth   = true;               // SMTP authentication
        $mail->Username   = 'tare.kristian@gmail.com'; // Your SMTP username
        $mail->Password   = 'sjiddzcblendjjeo';       // Your SMTP password
        $mail->SMTPSecure = 'ssl'; // Encryption method
        $mail->Port       = 465;                // SMTP port

        // Sender and recipient
        $mail->setFrom('tare.kristian@gmail.com','Signing Offices');

        if(is_array($email)){
            foreach($email as $e){
                $mail->addAddress($e, 'ICST');     //Add a recipient
            }
        }else{
            $mail->addAddress($email, 'ICST');     //Add a recipient
        }

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the plain text message body';

        // Send the email
        $mail->send();
        echo 'Email has been sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}

?>