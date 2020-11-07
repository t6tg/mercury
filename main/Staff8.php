<?php
session_start();
if (
    $_SESSION['mem_id'] == null ||
    $_SESSION["mem_role"] != "customer"
) {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<?php include "connect.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page.css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <title>The Mercury Staff</title>
    <style>
        a#logout {
            background-color: red;
            text-decoration: none;
            line-height: 6em;
            color: white;
            display: inline-flex;
            border-radius: 15px;
        }

        a#logout:hover {
            background-color: rgb(252, 252, 252);
            color: red;
            transition: all 1s;
        }

        .search {
            margin-left: 48em;
        }

        .impact:hover {
            border: 4px solid #964EC2;
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
        }
    </style>
</head>

<body>
    <header>
        <img src="Pic/The_Mercury.png" alt="Logo" width="70px" height="70px" class="logo">
        <b style="margin-left: 1%;" class="head">The Mercury Staff</b>
        <a href="Search.html"><img src="Pic/Search.png" alt="Search" width="70px" height="70px" class="search"></a>
        <a name="" id="logout" href="../logout.php">LOGOUT</a>
    </header>
    <?php
    $page = $_GET["page"];
    $sss = $pdo->prepare("SELECT COUNT(staffno) FROM staff");
    $sss->execute();
    $rt = $sss->fetch();
    $no = $rt["COUNT(staffno)"];
    $pno = ceil($rt["COUNT(staffno)"] / 8);
    $stml = $pdo->prepare("SELECT * FROM staff");
    $stml->execute();
    ?>
    <hr>
    <article>
        <table>
            <?php
            for ($u = 0; $u < ($page - 1); $u++) {
                for ($y = 0; $y < 8; $y++) {
                    $stml->fetch();
                    $no--;
                }
            }
            for ($j = 0; $j < 2; $j++) {
                echo "<tr>";
                for ($i = 0; $i < 4; $i++) {
                    $row = $stml->fetch();
                    if ($no > 0) {
                        echo "<td>";
                        echo "<a href='data.php?staff_id=" . $row["staffno"] . "&branch_no=" . $row["branch_no"] . "'><img src='Pic/" . $row["staffno"] . ".jpg' width='250' height='320' class='impact'></a>" . "<br>";
                        echo $row["staffno"] . "\t";
                        echo $row["staffname"] . "<br>";
                        echo $row["price"] . " ฿";
                        echo "</td>";
                        $no--;
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
    </article>
    <nav>
        <br>
        <div class="pagination">
            <?php
            for ($i = 0; $i < $pno; $i++) {
                $o = $i + 1;
                if ($page == $o) {
                    echo "<a href='#' class ='active'>" . ($o) . "</a>";
                } else {
                    echo "<a href='Staff8.php?page=" . $o . "'>" . ($o) . "</a>";
                }
            }
            ?>
        </div>
    </nav>
</body>

</html>