<?php
session_start();
require_once "database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    header("Refresh:0 , url=../index.html");
    exit();
}

if ($_POST['name'] != null && $_POST['value'] != null) {
    $sql = "UPDATE product SET name = '" . trim($_POST['name']) . "' ,value = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
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
