<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="editconfirm.php">
            <div class="form-group">
                <label>ชื่อพนักงาน</label>
                <input type="text" class="form-control" value="<?php echo $_GET['name']; ?>" name="name" required />
            </div>
            <div class="form-group">
                <label>จำนวน</label>
                <input type="text" class="form-control" name="value" required />
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <button type="submit">แก้ไข</button>
        </form>
    </div>
</body>

</html>