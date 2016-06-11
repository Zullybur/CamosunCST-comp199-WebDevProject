<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_oegDyK8XQeqDP0JntnNHk2Nu",
  "publishable_key" => "pk_test_5DHQR6gLHBG7APGHN7daMKWj"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>

