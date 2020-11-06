<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "admin"
) {
    header("location: ../../index.html");
}
?>
<!DOCTYPE html>
<?php include "../connect.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขพนักงาน</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="section">
        <h1>แก้ไขพนักงาน</h1>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM staff");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        ?>
            <img src="./img/<?= $row["staffno"] ?>.jpg" alt="Responsive image" width='150' class="rounded"><br>
            <p>หมายเลขพนักงาน : <?= $row["staffno"] ?><br>
                ชื่อพนักงาน : <?= $row["staffname"] ?><br>
                เวลาเข้างาน : <?= $row["worktime"] ?><br>
                เพศ : <?= $row["gender"] ?><br>
                ประเภท : <?= $row["type"] ?><br>
                สาขาที่ทำงาน : <?= $row["branch_no"] ?><br>
                ราคา : <?= $row["price"] ?><br>
                <a href='editstaff.php?staffno=<?= $row["staffno"] ?>'>แก้ไข</a></p>
            <hr>
        <?php
        }
        ?>
    </div>
</body>

</html>