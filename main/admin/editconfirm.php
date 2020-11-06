<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "admin"
) {
    header("location: ../../index.html");
}
?>
<?php
include "../connect.php";

if ($_POST["staffname"] != null && $_POST["price"] != null) {
    $stmt = $pdo->prepare("UPDATE staff SET staffname=?, worktime=? , type=? , branch_no=? , price=? WHERE staffno=?");
    $stmt->bindParam(1, $_POST["staffname"]);
    $stmt->bindParam(2, $_POST["worktime"]);
    $stmt->bindParam(3, $_POST["type"]);
    $stmt->bindParam(4, $_POST["branch_no"]);
    $stmt->bindParam(5, $_POST["price"]);
    $stmt->bindParam(6, $_POST["staffno"]);
    if ($stmt->execute()) {
        echo "<script>alert('แก้ไขสำเร็จ');</script>";
        header("Refresh:0 , url=allstaff.php");
        exit();
    } else {
        echo "<script>alert('แก้ไขไม่สำเร็จ');</script>";
        header("Refresh:0 , url=allstaff.php");
        exit();
    }
} else {
    echo "<script>alert('กรุณากรอกข้อมูล');</script>";
    header("Refresh:0 , url=allstaff.php");
    exit();
}
