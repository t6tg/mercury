<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "admin"
) {
    header("location: ../../index.html");
}
?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>branchdetail</title>
    <link rel="icon" href="mer.jpg">
    <link rel="stylesheet" href="branchshow.css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    $getnum = $_GET['num'];
    $province = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=AxqaqKbuZy1z8c5Z0vPweEzfDIQluwaR&fbclid=IwAR2V1Oz6t87jq-TVXlfs2No5XMD-H3NwzYIWOlU07Ec0uXRHr8w_mzfZNu4');
    $dataprovince = json_decode($province);
    $province_temp = $dataprovince->result[$getnum]->prov_name;
    ?>
    <?php
    $bname = $_GET['branchname'];
    $bno = $_GET['branchno'];
    $stmt = $pdo->prepare('SELECT * FROM branch WHERE branch_no = ?');
    $stmt->bindParam(1, $bno);
    $stmt->execute();
    ?>
    <header id="branchdetail">
        <h1>รายละเอียดสาขา <?= $bname ?></h1>
    </header>
    <article class="show">
        <h1 class="head">ข้อมูลสาขา</h1>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <h1>รหัสสาขา: <?= $row['branch_no']; ?></h1>
            <h1>ชื่อสาขา: <?= $row['branch_name']; ?></h1>
            <h1>ที่อยู่: <?= $row['branch_address']; ?></h1>
            <h1>จังหวัด: <?= $province_temp; ?></h1>
            <h1>สถานะ: <?= $row['branch_status']; ?></h1>
            <h1>เวลาเปิดทำการ: <?= $row['brach_open']; ?></h1>
        <?php
        }
        ?>
    </article>
    <article class="show">
        <?php
        $stmt = $pdo->prepare('SELECT * FROM member WHERE create_member = ?');
        $stmt->bindParam(1, $bno);
        $stmt->execute();
        ?>
        <h1 class="head">ข้อมูลสมาชิกที่เปิดสมาชิก</h1>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <h1>รหัสสมาชิก: <?= $row['mem_id']; ?></h1>
            <h1>ชื่อสมาชิก: <?= $row['mem_name']; ?></h1>
            <h1>เพศ: <?= $row['gender']; ?></h1>
            <h1>ปี-เดือน-วันเกิด: <?= $row['bdate']; ?></h1>
            <h1>ระดับสมาชิก: <?= $row['member_class']; ?></h1>
            <hr>
        <?php
        }

        ?>
    </article>
    <article class="show">
        <?php
        $stmt = $pdo->prepare('SELECT * FROM staff WHERE branch_no = ?');
        $stmt->bindParam(1, $bno);
        $stmt->execute();
        ?>
        <h1 class="head">ข้อมูลพนักงานประจำสาขา</h1>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <h1>รหัสประจำตัว: <?= $row['staffno']; ?></h1>
            <h1>ชื่อพนักงาน: <?= $row['staffname']; ?></h1>
            <h1>เวลาเข้างาน: <?= $row['worktime']; ?></h1>
            <h1>แผนก: <?= $row['type']; ?></h1>
            <h1>เพศ: <?= $row['gender']; ?></h1>
            <hr>
        <?php
        }
        ?>
    </article>
</body>

</html>