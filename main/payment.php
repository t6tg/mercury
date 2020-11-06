<?php
require_once dirname(__FILE__) . '/lib/Omise.php';
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', 'pkey_test_5ls6esdutigbhc82itf');
define('OMISE_SECRET_KEY', 'skey_test_5lryv7fch7ye5ka18w2');

$charge = OmiseCharge::create(array(
    'amount' => 150000,
    'currency' => 'thb',
    'card' => $_POST["omiseToken"]
));

echo ($charge['status']);

print('<pre>');
print_r($charge);
print('</pre>');
