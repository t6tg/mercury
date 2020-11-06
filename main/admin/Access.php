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
<?php include "connection.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="page.css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        table,
        tr,
        td {
            border: 2px solid #50409A;
            padding: 10px;
        }

        @media only screen and (max-width: 1200px) {
            img {
                width: 7em;
                height: 7em;
            }

            .logo {
                width: 3em;
                height: 3em;
            }

            .head {
                font-size: 2em;
            }

            .search {
                margin-left: 30em;
                width: 3em;
                height: 3em;
            }

            table,
            tr,
            td {
                padding: 5px;
                font-size: 1ex;
            }
        }

        @media only screen and (max-width: 800px) {
            img {
                width: 5em;
                height: 5em;
            }

            .logo {
                width: 2em;
                height: 2em;
            }

            .head {
                font-size: 2em;
            }

            .search {
                margin-left: 10em;
                width: 3em;
                height: 3em;
            }

            table,
            tr,
            td {
                font-size: 2ex;
                padding: 2px;
            }
        }
    </style>
</head>

<body>
    <header>
        <img src="pic/The_Mercury.png" alt="Logo" width="70px" height="70px" class="logo">
        <b style="margin-left: 1% ;margin-top: 1%;" class="head">The Mercury Reservation</b>
        <?php
        $stml = $pdo->prepare("SELECT * FROM access");
        $stml->execute();
        ?>
    </header>
    <hr>
    <article>
        <table>
            <tr>
                <th>วันที่ทำการจอง</th>
                <th>ราคา</th>
                <th>สาขา</th>
                <th>สมาชิก</th>
                <th>เวลาที่เข้าใช้</th>
            </tr>
            <?php
            while ($row = $stml->fetch()) {
                echo "<tr>";
                echo "<td>" . $row["Date_access"] . "</td>";
                echo "<td>" . $row["price_access"] . "</td>";
                echo "<td>" . $row["branch_no"] . "</td>";
                echo "<td>" . $row["mem_id"] . "</td>";
                echo "<td>" . $row["usetime"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </article>
</body>

</html>