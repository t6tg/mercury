<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>branchshow</title>
    <link rel="icon" href="mer.jpg">
    <link rel="stylesheet" href="branchshow.css">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM branch");
    $stmt->execute();
    ?>
    <header id="manage">
        <h1>จัดการร้าน</h1>
        <a name="" id="logout" href="../../logout.php">LOGOUT</a>
        <a name="" id="fix" href="./allstaff.php">แก้ไข</a>
    </header>
    <article>
        <div class="grid2x2">
            <?php
            $i = 0;
            while ($row = $stmt->fetch()) {
            ?>
                <div class="box"><a href="branchdetail.php?branchno=<?= $row['branch_no'] ?>&branchname=<?= $row['branch_name'] ?>&num=<?= $i ?>">
                        <p><?= $row['branch_name'] . "  :  " . $row['branch_status']; ?></p>
                    </a></div>
            <?php
                $i++;
            }
            ?>
        </div>
    </article>
</body>

</html>