<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "../../../../";
}
(require $rootPath . 'OFstripeConfig.inc') or
  exit("Unable to include 'OFstripeConfig.inc' from root");

(require $rootPath . 'public_html/OceanForward/scripts/PHPMailer/PHPMailerAutoload.php');

    $token  = $_POST['stripeToken'];
    $email = $_POST['stripeEmail'];
    $amount = $_POST['stripeAmount'];

    $mail = new PHPMailer;
    $mail-> isSMTP();

    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "oceanforwardyachts@gmail.com";
    $mail->Password = "oceanforward1";
    $mail->setFrom('oceanforwardyachts@gmail.com', 'Orders');
    $mail->addReplyTo('oceanforwardyachts@gmail.com', 'Orders');
    $mail->addAddress($email, 'John Doe');
    $mail->Subject = 'Ocean Forward Order Confirmation';
    $mail->Body = 'Thank you for your payment of '.$amount.'. Your yacht is being processed and will ship within 2-3 business days.';

    if(!$mail->send()) {
        echo "Mailer Error: ".$mail->ErrorInfo;
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
