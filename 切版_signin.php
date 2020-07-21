<!DOCTYPE html>
<html>
<head>
    <title>登入</title>
    <meta charset="utf-8">
</head>

<body>
<div>
    <img src="" alt="醫聯網"/>
    <img src="" alt="圖片"/>
    <p>醫聯網的簡介</p>
</div>

<div>
    <a href="index.php">首頁</a>
    <h1>登入</h1>
    <form name="signin" onsubmit="return validateForm()" action="signin_check.php" method="POST" enctype="multipart/form-data">
        <input type="email" name="email" placeholder="電子信箱："/>
        <p id="emailError"></p>
        <input type="password" name="password" placeholder="密碼："/>
        <p id="passwordError"></p>
        <span>您尚未註冊嗎？</span>
        <a href="signup.php">現在註冊</a>
        <input type="submit" name="login" value="登入"/>
    </form>

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
</div>
</body>
</html>