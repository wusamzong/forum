<!-- 頁首 -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mx-5">
                <a href="index.php"><img src="./images/site/Logo.png" alt="" width="260px"></a>
            </li>
        </ul>

        <div class="d-flex justify-content-end align-items-center">
            <div><form class="form-inline mx-4 active-cyan-6 text-right" method="POST" action="" enctype="multipart/form-data">
                <input class="form-control mr-sm-2" style="width: 900px; height: 50px;" type="search" placeholder="Search" name="search" />
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="搜尋" />
            </form></div>
        <?php
        if (!isset($_SESSION["userName"])) {
            echo '

                <div><ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">註冊</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="btn btn-primary" href="signin.php" class="nav-link">登入</a>
                    </li>
                    </div></ul>';
        } else {
            echo '<img src="" alt="新增文章"/>';

            require("connect.php");
            $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE userName=?');
            $sql->execute([$_SESSION["userName"]]);
            foreach ($sql->fetchAll() as $row) {
                echo '<img src="images/' . $row["photo"] . '" alt="個人照片"/>';
                echo '<span>' . $row["nickname"] . '</span>';
                echo '<img src="" alt="下拉選單"/>';
            }

            // 下拉選單與登出功能尚未製作
        }
        ?>
        </div>
    </nav>
</header>