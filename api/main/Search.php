<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "customer"
) {
    header("location: ../index.html");
}
?>
<?php
$keyword = $_GET["username"];
$conn = mysqli_connect("13.68.244.137", "earth", "earthWebdev1*");
if ($conn) {
    mysqli_select_db($conn, "mercury");
    mysqli_query($conn, "SET NAMES utf8");
} else {
}
$count = "SELECT COUNT(staffno) FROM staff WHERE staffname LIKE '%$keyword%'";
$num = mysqli_query($conn, $count);
$r = mysqli_fetch_array($num)["COUNT(staffno)"];
$sql = "SELECT * FROM staff WHERE staffname LIKE '%$keyword%'";
$objQuery = mysqli_query($conn, $sql);
?>
<table style="text-align: center;">
    <?php
    for ($i = 0; $i < $r; $i++) {
        $row = mysqli_fetch_array($objQuery);
        if ($i % 4 == 0 && $i == 0) {
            echo "<tr>";
        } else if ($i % 4 == 0 && $i != 0) {
            echo "</tr><tr>";
        }
        echo "<td><a href='data.php?staff_id=" . $row["staffno"] . "&branch_no=" . $row["branch_no"] . "'>";
        echo "<img src='pic/" . $row["staffno"] . ".jpg' width=250 height=300 class='impact'> </a>" . "<br>";
        echo $row["staffno"] . "\t";
        echo $row["staffname"] . "<br>";
        echo $row["price"] . " ฿";
        echo "</td>";
    }
    echo "</tr>";
    ?>
</table>