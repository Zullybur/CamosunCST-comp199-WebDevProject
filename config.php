<?php

#Require files for stripe API integration

require_once('vendor/autoload.php');

$stripe = array(
	"secret_key" => "sk_test_MmBAlSGsAbRYk7w1Wh4U13io",
	"publishable_key" => "pk_test_5DHQR6gLHBG7APGHN7daMKWj";
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
