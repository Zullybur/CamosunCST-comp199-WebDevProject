<?php
// If this file is not called by another file, set rootPath locally to root
if(!isset($rootPath)) {
    $rootPath = "./";
}

(require_once $rootPath . 'public_html/OceanForward/vendor/autoload.php') or 
    exit("Unable to include 'autoload.php' from public_html/OceanForward/vendor");

$stripe = array(
  "secret_key"      => "sk_test_oegDyK8XQeqDP0JntnNHk2Nu",
  "publishable_key" => "pk_test_5DHQR6gLHBG7APGHN7daMKWj"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>

