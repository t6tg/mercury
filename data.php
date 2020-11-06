<?php
session_start();
include "connect.php";
// $user_id = "MB00001";
if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];
    $stmt = $pdo->prepare("SELECT * FROM staff WHERE staffno=?");
    $stmt->bindParam(1, $staff_id);
    $stmt->execute();
    $data = $stmt->fetch();
} else {
    echo "Error";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <title><?= $staff_id . " | " . $data['staffname'] ?></title>
</head>

<body>
    <h1 id="keyword">ชำระเงิน</h1>
    <main class="container">
        <div>
            <img class="staff_pic" src="https://pbs.twimg.com/media/DoBJxFRUwAEDZz7.jpg" alt="staff_pic" laading="lazy">
        </div>
        <div class="payment">
            <form action="" method="post">
                <h1>ชื่อ : <?= $data['staffname'] ?></h1>
                <h3>เวลาเข้างาน : <?= $data['worktime'] ?></h3>
                <h3>เพศ : <?= $data['gender'] ?></h3>
                <input name="datedepart" type="date" />
                <input type="time" name="" id=""><br />
            </form>
            <form name="checkoutForm" method="POST" action="payment.php">
                <script type="text/javascript" src="https://cdn.omise.co/omise.js" data-key="pkey_test_5ls6esdutigbhc82itf" data-image="https://trello-attachments.s3.amazonaws.com/5f8ff8a690b30d7ac410c7cd/5fa4251eea8d8a8d7db8ec75/2128ae530014f8494306fbcdd5fef5a8/The_Mercury.png" data-frame-label="The Mercury" data-button-label="ใช้บริการ" data-submit-label="Submit" data-location="no" data-amount="150000" data-currency="thb">
                </script>
                <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
            </form>
            <a href="../" style="text-align: center">กลับหน้าหลัก</a>
        </div>
    </main>
    <script>

    </script>
</body>

</html>