<!DOCTYPE html>
<html>
<head>
    <title>註冊</title>
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
    <form name="signup" onsubmit="return validateForm()" action="signup_check.php" method="POST" enctype="multipart/form-data">
    <div>
        <h1>註冊</h1>
        <input type="text" name="realName" placeholder="真實姓名：" />
        <p id="realNameError"></p>
        <input type="text" name="nickname" placeholder="暱稱："/>
        <p id="nicknameError"></p>
        <input type="email" name="email" placeholder="電子信箱："/>
        <p id="emailError"></p>
        <input type="password" name="password" placeholder="密碼："/>
        <p id="passwordError"></p>
        <p>您已經註冊了嗎？<a href="signin.php">現在登入</a></p>
        <button>下一步</button>
    </div>

    <div>
        <button>&lt;</button>
        <h1>選擇喜好</h1>
        <div>
            <div>
            <?php require("_connect.php");
            $sql = $pdo->prepare('SELECT * FROM tag');
            $sql->execute();
            foreach ($sql->fetchAll() as $row) {
                echo '<span id="'.$row['ID'].'" onclick="deleteTag('."'".$row["ID"]."'".')">'.$row['name'].'</span>';
            }?>
            <!-- "X"用偽元素::after製作 -->
            <span>至少選三項</span>
            </div>

            <ul id="tags">
            <p id="rowCount"><?php echo $sql->rowCount(); ?></p>
            <?php
            $sql = $pdo->prepare('SELECT * FROM tag');
            $sql->execute();
            foreach ($sql->fetchAll() as $row) {
                echo '<li onclick="chooseTag('."'".$row["ID"]."'".')">'.$row['name'].'</li>';
            }
            ?>
            <p id="tagError"></p>
            <input type="text" id="tagCount" name="tagCount"/>
            </ul>
            </div>
        </div>
        <input type="submit" value="註冊"/>

        <script>
            // 標籤處理
            // 標籤的個數，所有標籤的瀏覽次數，初始化
            let tagsQuantity = document.getElementById("rowCount").innerHTML;
            let tagCount = [];
            for (let i=0; i<=tagsQuantity; i++) { tagCount[i] = 0; }
            // 選擇與取消
            function chooseTag(ID) {
                tagCount[ID]  = 10;
                document.getElementById(ID).style.display = "inline";
                tagTotal();
            }
            function deleteTag(ID) {
                tagCount[ID]  = 0;
                document.getElementById(ID).style.display = "none";
                tagTotal();
            }
            function tagTotal() {
                tagCount[0] = 0;
                for (let i=0; i<=tagsQuantity; i++) {
                    tagCount[0] += tagCount[i];
                }
                document.getElementById("tagCount").value = tagCount.join(" ");
            }

            // 檢查欄位是否皆有填寫
            function validateForm() {
                var realName = document.forms["signup"]["realName"].value;
                if (realName == "") {
                    document.getElementById("realNameError").innerHTML = "請輸入真實姓名";
                    return false;
                } else { document.getElementById("realNameError").innerHTML = ""; }

                var nickname = document.forms["signup"]["nickname"].value;
                if (nickname == "") {
                    document.getElementById("nicknameError").innerHTML = "請輸入暱稱";
                    return false;
                } else { document.getElementById("nicknameError").innerHTML = ""; }

                var email = document.forms["signup"]["email"].value;
                if (email == "") {
                    document.getElementById("emailError").innerHTML = "請輸入帳號（email）";
                    return false;
                } else { document.getElementById("emailError").innerHTML = ""; }

                var password = document.forms["signup"]["password"].value;
                if (password == "") {
                    document.getElementById("passwordError").innerHTML = "請輸入密碼";
                    return false;
                } else { document.getElementById("passwordError").innerHTML = ""; }

                if (tagCount[0] < 30) {
                    document.getElementById("tagError").innerHTML = "請選擇至少三個標籤";
                    return false;
                } else { document.getElementById("tagError").innerHTML = ""; }
            }
            </script>
    </div>
    </form>
</div>
</body>
</html>