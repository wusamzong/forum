<header>
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php"><img src="./images/MedNetLogo.png" alt="" width="120px"></a>
                </li>
            </ul>
            
            <form class="form-inline my-2 ml-auto active-cyan-6" method="POST" action="" enctype="multipart/form-data">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" />
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="搜尋" />
            </form>


            <?php
            if (!isset($_SESSION["userName"])) {
                echo '
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">註冊</a>
                    </li>
                    <li class="nav-item">
                        <a href="signin.php" class="nav-link">登入</a>
                    </li>
                </ul>';
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

        </nav>



    </div>
</header>