<?php
    require_once('./config.php');
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