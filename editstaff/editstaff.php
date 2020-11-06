<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <form action="workshop9_9editmember.php" method="post">
        หมายเลขพนักงาน : <input type="text" name="staffno" value="<?= $row["staffno"] ?>"><br><br>
        ชื่อพนักงาน : <input type="text" name="staffname" value="<?= $row["staffname"] ?>"><br><br>
        เวลาเข้างาน : <input type="text" name="worktime" value="<?= $row["worktime"] ?>"><br><br>
        เพศ : <input type="text" name="gender" value="<?= $row["gender"] ?>"><br><br>
        ประเภท : <input type="text" name="type" value="<?= $row["type"] ?>"><br><br>
        สาขาที่ทำงาน : <input type="text" name="branch_no" value="<?= $row["branch_no"] ?>"><br><br>
        ราคา : <input type="text" name="price" value="<?= $row["price"] ?>"><br><br>
        <input type="submit" value="แก้ไขข้อมูล">
    </form>
</body>

</html>