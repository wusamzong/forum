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
    <h1>註冊</h1>
    <form name="signup" onsubmit="return validateForm()" action="signup_check.php" method="POST" enctype="multipart/form-data">
        <div>
        <h1>註冊</h1>
        <input type="hidden" name="ID"/>
        <input type="text" name="realName" placeholder="真實姓名：" />
        <!-- <span>真實姓名的錯誤訊息</span> -->
        <input type="text" name="nickname" placeholder="暱稱："/>
        <input type="email" name="email" placeholder="電子信箱："/>
        <input type="password" name="password" placeholder="密碼："/>
        <input type="hidden" name="photo" value="site/default_photo.png"/>
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
            <p id="count"></p>
            <script>
                // 標籤的個數
                let tagsQuantity = document.getElementById("rowCount").innerHTML;
                 // 所有標籤的瀏覽次數
                let tagCount = [];
                // 初始化
                for (let i = 0; i <= tagsQuantity; i++) { tagCount[i] = 0; }
                function chooseTag(ID) {
                    tagCount[ID]  = tagCount[ID]%10 +10;
                    document.getElementById(ID).style.display = "inline";
                    document.getElementById("count").innerHTML = tagCount.join(" ");
                }
                function deleteTag(ID) {
                    tagCount[ID]  = tagCount[ID]%10;
                    document.getElementById(ID).style.display = "none";
                    document.getElementById("count").innerHTML = tagCount.join(" ");
                }
            </script>
        </ul>
        </div>
        </div>
        <input type="submit" name="signup" value="註冊"/>
    </div>
    </form>

    <!-- 註冊成功/失敗 確定 X -->
    <!-- signup_check.php 接 signin_check.php -->

</div>
</body>
</html>