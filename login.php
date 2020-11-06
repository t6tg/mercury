<?php
if (trim($_POST['mem_id']) == null || trim($_POST['password']) == null) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
    header("Refresh:0 , url=index.html");
} else {
    include "connect.php";
    session_start();
    $stmt = $pdo->prepare("SELECT mem_id,password FROM member WHERE mem_id = ? AND password = ? ");
    $stmt->bindParam(1, $_POST["mem_id"]);
    $password = md5($_POST["password"]);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!empty($row)) {
        session_regenerate_id();
        $_SESSION["mem_id"] = $row["mem_id"];
        echo "เข้าสู่ระบบสําเร็จ" . $_SESSION["mem_id"] . "<br>";
        echo "<a href='Location:main/'>ไปยังหน้าหลักของผู้ใช้</a>";
        header("Location:main/");
        session_write_close();
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        header("Refresh:0 , url=logout.php");
    }
}
