<!-- 頁首 -->
<header>
  <div class="d-block d-xl-none">
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
      <img id="hamburger-menu" src="./images/site/漢堡導覽列.png" alt="" height="43px;" class="p-2 ml-3" />
    </nav>
    <!--按下漢堡導覽且未登入-->
    <div id="side-nav" class=" float-left bg-white border shadow p-0 hamburgerMenu">
      <div class="d-flex align-items-center flex-column">
        <img class="my-3" src="./images/site/大頭貼.png" height="200px" alt="">
        <div class="m-2">
          <button class="btn btn-outline-primary px-3 fs-24">登入</button>
          <button class="btn btn-primary px-3 fs-24">註冊</button>
        </div>
      </div>

      <div class="list-group mt-3">
        <a class="list-group-item list-group-item-action pl-5 cursorPointer" >病痛Q&A</a>
        <a class="list-group-item list-group-item-action disabled pl-5 bg-light fs-22">看板總覽</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer" >醫事甘苦談</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer" >健康檢查</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer" >醫療議題</a>
        <a class="list-group-item list-group-item-action pl-5 cursorPointer" >飲食控制</a>
      </div>
      <div class="row m-4">
        <div class="col-3"><a href="">關於我們</a></div>
        <div class="col-7 "><a href="">最新消息</a></div>
        <div class="col-3"><a href="">人才招募</a></div>
        <div class="col-7 "><a href="">免責聲明</a></div>
        <div class="col-3"><a href="">業務合作</a></div>
        <div class="col-7 "><a href="">客服中心</a></div>
      </div>
      <a href="切版_article_write.php"><img class="articleWriteButton" src="./images/site/筆_手機版.png" width="60px" alt=""></a>
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
          <input class="form-control mr-sm-2" style="width: 80%; height: 50px;" type="search" placeholder="Search" name="search" />
          <input class="btn btn-primary my-2 my-sm-0" type="submit" name="submit" value="搜尋" />
        </form>
      </div>
      <!-- 登入/註冊 -->
      <div class="col-2 p-2 d-flex align-items-center justify-content-end">
        <a href="./切版_signin.php">登入</a>
        <a class="m-2 btn btn-primary" href="./切版_signup.php">註冊</a>
      </div>
    </div>
  </div>

</header>