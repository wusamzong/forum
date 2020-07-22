<!-- 頁首 -->
<header>
  
  <div class="d-flex bd-highlight mb-3 align-items-center border-bottom">
    <!-- Logo -->
    <div class="ml-3 mr-auto p-2 bd-highlight">
      <a href="index.php"><img src="./images/site/Logo.png" alt="" width="260px"></a>
    </div>
    <!-- 搜尋 -->
    <div class="p-2 bd-highlight">
      <form class="form-inline mx-4 active-cyan-6 text-right" method="POST" action="" enctype="multipart/form-data">
        <input class="form-control mr-sm-2" style="width: 900px; height: 50px;" type="search" placeholder="Search" name="search" />
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="搜尋" />
      </form>
    </div>
    <!-- 新增文章 -->
    <div class="p-2 bd-highlight">
      <a href="切版_article_write.php"><img src="./images/site/筆.png" height="30px" alt=""></a>
    </div>
    <!-- 下拉選單 -->
    <div class="p-2 bd-highlight d-flex align-items-center">
      <div class="dropdown">
        <a style="font-size:22px;" class="dropdown-toggle m-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="p-2" src="./images/site/大頭貼.png" height="50px" alt=""><span >Name</span>
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

</header>