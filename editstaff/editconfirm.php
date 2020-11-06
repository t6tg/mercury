<?php
session_start();
include "connect.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}

if ($stmt->execute())
    header("location: workshop9_9.php");

if ($_POST['name'] != null && $_POST['value'] != null) {
    $stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=? , mobile=? , email=? WHERE username=?");
    $stmt->bindParam(1, $_POST["password"]);
    $stmt->bindParam(2, $_POST["name"]);
    $stmt->bindParam(3, $_POST["address"]);
    $stmt->bindParam(4, $_POST["mobile"]);
    $stmt->bindParam(5, $_POST["email"]);
    $stmt->bindParam(6, $_POST["username"]);
    if ($conn->query($sql)) {
        echo "<script>alert('แก้ไขสำเร็จ');</script>";
        header("Refresh:0 , url=editstaff.php");
        exit();
    } else {
        echo "<script>alert('แก้ไขไม่สำเร็จ');</script>";
        header("Refresh:0 , url=editstaff.php");
        exit();
    }
    echo $_POST['text_todo'];
} else {
    echo "<script>alert('กรุณากรอกข้อมูล');</script>";
    header("Refresh:0 , url=editstaff.php");
    exit();
}
