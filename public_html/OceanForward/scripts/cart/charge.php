<?php
    require_once('./config.php');
    require('PHPMailer/PHPMailerAutoload.php');
    // require('PHPMailer/PHPMailerAutoload.php');
    // echo "DEBUG:<br>\n"; print_r($_POST); echo "END<br>\n";
    $token  = $_POST['stripeToken'];
    $email = $_POST['stripeEmail'];
    $amount = $_POST['stripeAmount'];
    // $amount = $_POST['amount'];
    // $mail = new PHPMailer;
    /* Send Confirmation Email here.
    See https://github.com/PHPMailer/PHPMailer/blob/master/ examples/gmail.phps
    as example using Gmail as Mail Server with PHPMailer
    */

    $mail = new PHPMailer;
    $mail-> isSMTP();

    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "oceanforwardyachts@gmail.com"
    $mail->Password = "oceanforward1"
    $mail->setForm('oceanforwardyachts@gmail.com', 'Info');
    $mail->addRepltTo('oceanforwardyachts@gmail.com', 'Info');
    $mail->addAddress($email, 'John Doe');
    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->Body = 'Body of message';

    if(!mail->send()) {
        echo "Mailer Error: ".$mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

    $customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source' => $token
    ));
    $charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount' => $amount,
    'currency' => 'cad'
    ));
    // $amount = number_format(($amount / 100), 2);
    echo "<h1>Successfully charged $amount!</h1>";
?>