<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Mercury</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet" />
  <link rel="icon" href="mer.jpg" />
</head>

<body>
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Promotion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img width="100%" src="https://en.pimg.jp/054/575/997/1/54575997.jpg" alt="promotion" />
        </div>
        <div style="padding: 20px">
          <span><input type="checkbox" name="no-show" id="no-show" onchange="getShow()" />:ไม่ต้องการให้แสดงอีก</span>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <h1>เข้าสู่ระบบ</h1>
    <br />
    <div class="container">
      <form method="POST" action="login.php">
        <div class="form-group">
          <input type="text" class="form-control" name="mem_id" pattern="[A-Za-z0-9]{4,15}" placeholder="ชื่อผู้ใช้" required="" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>" />
        </div>
        <br />
        <div class="form-group">
          <input type="password" class="form-control" name="password" pattern="[A-Za-z0-9._%+-]{5,20}" placeholder="รหัสผ่าน" required="" />
        </div>
        <br />
        <button type="submit">เข้าสู่ระบบ</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script>
    var decodedCookie = decodeURIComponent(document.cookie);
    if (decodedCookie.search("show") < 0) {
      $("#myModal").modal("show");
    }

    function getShow() {
      const valueShow = document.getElementById("no-show").value;
      if (valueShow === "on") document.cookie = "show=on";
    }
  </script>
</body>

</html>