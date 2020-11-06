<?php
session_start();
if ($_SESSION['mem_id'] == null) {
  echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
  header("Refresh:0 , url=../logout.php");
}
$mem_id = $_SESSION['mem_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>index</title>
</head>

<body>
  ยินดีต้อนรับ
  <?php echo $mem_id; ?>
  <a name="" id="" href="../logout.php">LOGOUT</a>
</body>

</html>