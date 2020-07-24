<!DOCTYPE html>
<html class="m-0 p-0">
<head>
  <title>登入</title>
  <meta charset="utf-8">
  <?php require('_css.php') ?>
  <?php require('_js.php') ?>
</head>

<body style="height:100vh; overflow:hidden;" class="p-0 m-0">
  <div class="row">
    <div class="col-xl-6 d-flex flex-column align-items-center border-right ">
      <img class="d-none d-lg-block m-5" src="./images/site/Logo.png" width="250px" alt="醫聯網" />
      <img class="d-none d-lg-block" src="./images/site/login.png" width="750px" alt="圖片" />
      <p class="d-none d-xl-block">醫聯網的簡介</p>
    </div>
    <div class="col-12 d-xl-none m-0 p-0 ">
      <?php require('切版_header,登入前.php')?>
    </div>
    <div class="col-xl-6 p-5 mt-5 clearfix">
      <div class="float-right mt-5"><a href="index.php" class="text-right" style="font-size: 25px;">首頁</a></div><br>
        <form class="mt-5 input-group input-group-lg d-flex align-items-center flex-column" name="signin" onsubmit="return validateForm()" action="signin_check.php" method="POST" enctype="multipart/form-data">
          <h1 class="display-2 text-primary mt-5">登入</h1>
          <input type="email" name="email" class="form-control mt-3" placeholder="電子信箱：" style="width: 425px; height: 60px; font-size: 28px;"/>
          <p id="emailError"></p>
          <input type="password" name="password" class="form-control mt-3" placeholder="密碼：" style="width: 425px; height: 60px; font-size: 28px;"/>
          <p id="passwordError"></p>
          <span>您尚未註冊嗎？<a href="signup.php">現在註冊</a></span>
          
          <input class="btn btn-primary m-4 px-3 py-2" style="font-size: 25px;" type="submit" name="login" value="登入"/>
        </form>
    </div>
  </div>
  <script>
    function validateForm() {
      var email = document.forms["signin"]["email"].value;
      if (email == "") {
        document.getElementById("emailError").innerHTML = "請輸入帳號（email）";
        return false;
      }

      var password = document.forms["signin"]["password"].value;
      if (password == "") {
        document.getElementById("passwordError").innerHTML = "請輸入密碼";
        return false;
      }
    }
  </script>

</body>
</html>