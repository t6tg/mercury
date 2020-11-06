<!DOCTYPE html>
<?php include "../connect.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขพนักงาน</title>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM staff");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    ?>
        หมายเลขพนักงาน : <?= $row["staffno"] ?><br>
        ชื่อพนักงาน : <?= $row["staffname"] ?><br>
        เวลาเข้างาน : <?= $row["worktime"] ?><br>
        เพศ :<?= $row["gender"] ?><br>
        ประเภท :<?= $row["type"] ?><br>
        สาขาที่ทำงาน :<?= $row["branch_no"] ?><br>
        ราคา :<?= $row["price"] ?><br>
        <img src="./img/<?= $row["username"] ?>.jpg" alt="" width='100'><br>
        <a href='editstaff.php?staffno=<?= $row["staffno"] ?>'>แก้ไข</a>
        <hr>
    <?php
    }
    ?>
</body>

</html>