<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "customer"
) {
    header("location: ../index.php");
}
include "./connect.php";
if (isset($_GET['staff_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM staff WHERE staffno=?");
    $staff_id = $_GET['staff_id'];
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
            <img class="staff_pic" src="Pic/<?= $_GET['staff_id'] . ".jpg" ?>" alt="staff_pic" laading="lazy">
        </div>
        <div class="payment">
            <form method="get" id="regis_form" action="payment.php">
                <h1>ชื่อ : <?= $data['staffname'] ?></h1><br />
                <h2>รายละเอียด</h2>
                <div class="detail">
                    <h3>เพศ : <?= $data['gender'] ?></h3>
                    <h3>ราคา : <?= $data['price'] ?></h3>
                </div>
                <br />
                <h3>เวลาเข้าใช้บริการ</h3>
                <input name="date" type="date" id="date" required />
                <input type="time" name="time" id="time" required><br /><br />
                <input type="hidden" name="price" value="<?= $data['price'] ?>">
                <input type="hidden" name="branch_no" value="<?= $_GET['branch_no'] ?>">
                <input type="submit" class="omise-checkout-button-x" value="เข้าใช้บริการและชำระเงิน">
            </form>
            <br />
            <div class="link">
                <a href="./Staff8.php">กลับหน้าหลัก</a>
            </div>
        </div>
    </main>
    <script>

    </script>
</body>

</html>