<!-- 頁首 -->
<header>
  <div class="d-block d-xl-none mb-1">
    <!--右下角新增文章按鈕-->
    <a href="切版_article_write.php"><img class="articleWriteButton" src="./images/site/筆_手機版.png" width="80px" alt=""></a>
    <nav class="navbar navbar-expand-xl navbar-primary bg-primary d-flex">
      <img id="hamburger-menu" src="./images/site/漢堡導覽列.png" alt="" height="43px;" class="p-2 ml-3" />
      <img id="searchIcon" src="./images/site/搜尋.png" alt="" height="45px;" class="p-2 ml-3" />
    </nav>
    <!--搜尋-->
    <div id="searchBar" class="bg-light p-2">
      <form class="form-inline mx-5 my-2">
        <input class="form-control mr-sm-2 p-3 searchInputSize" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0 px-3" type="submit">Search</button>
      </form>
    </div>
    <!--按下漢堡導覽且已登入-->
    <div id="side-nav" class=" float-left bg-white border shadow p-0 hamburgerMenu">
      <div class="media ml-5 mt-4">
        <?php require("_connect.php");
        $sql = $pdo->prepare('SELECT nickname,photo,email FROM account WHERE userName=?');
        $sql->execute([$_SESSION["userName"]]);
        foreach ($sql->fetchAll() as $row) {
          if ($row["photo"] == "default") {
            echo '<img class="p-2" src="images/site/大頭貼_藍底.png" height="75px" alt="帳戶圖片">';
          } else {
            echo '<img class="p-2" src="images/' . $row["photo"] . '" height="75px" alt="帳戶圖片">';
          }
          echo '<div class="media-body">';
          echo '<h2>' . $row["nickname"] . '</h2>';
          echo '<h6>' . $row["email"] . '</h6>';
          echo '</div>';
        } ?>
      </div>

      <div class="list-group mt-3">
        <a class="list-group-item list-group-item-action pl-5 cursorPointer fs-22">病痛Q&A</a>
        <a class="list-group-item list-group-item-action disabled pl-5 bg-light fs-22">看板總覽</a>
        <form name="board" onsubmit="return validateForm()" action="切版_board.php" method="POST" enctype="multipart/form-data">
          <?php
          require("connect.php");
          $sql = $pdo->prepare('SELECT ID,name FROM board');
          $sql->execute();
          foreach ($sql->fetchAll() as $row) {
            // echo '<a class="list-group-item list-group-item-action" href="切版_board.php" onclick="chooseBoard(' . "'" . $row["ID"] . "'" . ')">' . $row["name"] . '</a>';
            echo '<input class="list-group-item list-group-item-action pl-5" type="submit" name="boardName" value="' . $row["name"] . '"/>';
          }
          ?>
        </form>
        <a class="list-group-item list-group-item-action disabled pl-5 bg-light fs-22">會員專區</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer">基本資料</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer">帳號密碼</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer">收藏文章</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer">已發佈文章</a>
      </div>
      <div class="row m-4">
        <div class="col-3"><a href="">關於我們</a></div>
        <div class="col-7 "><a href="">最新消息</a></div>
        <div class="col-3"><a href="">人才招募</a></div>
        <div class="col-7 "><a href="">免責聲明</a></div>
        <div class="col-3"><a href="">業務合作</a></div>
        <div class="col-7 "><a href="">客服中心</a></div>
      </div>
    </div>
  </div>

  <div class="d-none d-xl-block">
    <div class="row mb-3 align-items-center border-bottom ">
      <!-- Logo -->
      <div class="col-3 p-2">
        <a href="index.php"><img src="./images/site/Logo.png" alt="" width="260px"></a>
      </div>
      <!-- 搜尋 -->
      <div class="col-7 p-2" width="70%">
        <form class="form-inline ml-5 active-cyan-6 pl-5" method="POST" action="" enctype="multipart/form-data">
          <input class="form-control mr-sm-2 searchInputSize" type="search" placeholder="Search" name="search" />
          <input class="btn btn-primary my-2 my-sm-0" type="submit" name="submit" value="搜尋" />
        </form>
      </div>
      <!-- 新增文章 -->
      <div class="col-2 d-flex align-items-center">
        <a href="切版_article_write.php"><img src="./images/site/筆.png" height="30px" alt=""></a>
        <div class="dropdown">
          <a style="font-size:22px;" class="dropdown-toggle m-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php require("_connect.php");
            $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE userName=?');
            $sql->execute([$_SESSION["userName"]]);
            foreach ($sql->fetchAll() as $row) {
              if ($row["photo"] == "default") {
                echo '<img class="p-2" src="images/site/大頭貼_藍底.png" height="50px" alt="帳戶圖片">';
              } else {
                echo '<img class="p-2" src="images/' . $row["photo"] . '" height="50px" alt="帳戶圖片">';
              }
              echo '<span>' . $row["nickname"] . '</span>';
            } ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">個人主頁</a>
            <a class="dropdown-item" href="#">基本資料</a>
            <a class="dropdown-item" href="#">已收藏文章</a>
            <a class="dropdown-item" href="#">已發佈文章</a>
            <a class="dropdown-item" href="#">登出</a>
          </div>
        </div>
      </div>

    </div>
  </div>



</header>

<!-- 頁首 -->