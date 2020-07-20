<!-- 頁首 -->
<header>
    <a href="index.php"><img src="" alt="醫聯網"/></a>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="search" name="search"/>
        <input type="submit" name="submit" value="搜尋"/>
    </form>
    
    <?php
    if (!isset($_SESSION["userName"])) {
        echo '<a href="signup.php">註冊</a>';
        echo '<a href="signin.php">登入</a>';
    } else {
        echo '<img src="" alt="新增文章"/>';

        require("_connect.php");
        $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE userName=?');
        $sql->execute([$_SESSION["userName"]]);
        foreach ($sql->fetchAll() as $row) {
            echo '<img src="images/'.$row["photo"].'" alt="個人照片"/>';
            echo '<span>'.$row["nickname"].'</span>';
            echo '<img src="" alt="下拉選單"/>';
        }

        // 下拉選單與登出功能尚未製作
    }
    ?>
</header>