<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "customer"
) {
    header("location: ../index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="data.css">
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=Staff8.php">
</head>
<script>
    alert('ชำระเงินเสร็จสมบูรณ์')
</script>
<?php
require_once dirname(__FILE__) . '/lib/Omise.php';
define('OMISE_PUBLIC_KEY', 'pkey_test_5ls6esdutigbhc82itf');
define('OMISE_SECRET_KEY', 'skey_test_5lryv7fch7ye5ka18w2');

$charge = OmiseCharge::create(array(
    'amount' => $_GET['price'],
    'currency' => 'thb',
    'card' => $_POST["omiseToken"]
));


?>