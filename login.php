<?php
if (trim($_POST['mem_id']) == null || trim($_POST['password']) == null) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
    header("Refresh:0 , url=index.html");
} else {
    include "./main/connect.php";
    session_start();
    $stmt = $pdo->prepare("SELECT mem_id,password,mem_role FROM member WHERE mem_id = ? AND password = ?");
    $stmt->bindParam(1, $_POST["mem_id"]);
    $password = md5($_POST["password"]);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!empty($row)) {
        session_regenerate_id();
        $_SESSION["mem_id"] = $row["mem_id"];
        $_SESSION["mem_role"] = $row["mem_role"];
        if ($_SESSION["mem_role"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
            Header("Refresh:0 , url=main/admin/index.php");
            session_write_close();
        }

        if ($_SESSION["mem_role"] == "customer") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            Header("Refresh:0 , url=main/Staff8.php");
            session_write_close();
        }
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        Header("location: index.html");
    }
}
