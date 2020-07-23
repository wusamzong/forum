<!-- 頁首 -->
<header>
  <div class="d-block d-lg-none d-xl-block">
    <div>
      <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <img src="./images/site/漢堡導覽列.png" alt="" height="43px;" class="p-2 ml-3">
      </nav>
      <!--按下漢堡導覽且未登入-->
      <div class="float-left bg-white border shadow p-0" style="width: 60%; height: 100vh;">
        <div class="d-flex align-items-center flex-column">
          <img class="my-3" src="./images/site/大頭貼.png" height="200px" alt="">
          <div class="m-2">
            <button class="btn btn-outline-primary px-3" style="font-size: 24px;">登入</button>
            <button class="btn btn-primary px-3" style="font-size: 24px;">註冊</button>
          </div>
        </div>
        
        <div style="list-style: none; " class="list-group mt-3">
          <a class="list-group-item list-group-item-action pl-5" style="cursor: pointer;">病痛Q&A</a>
          <a class="list-group-item list-group-item-action disabled pl-5 bg-light" style="font-size: 22px ;">看板總覽</a>
          <a class="list-group-item list-group-item-action pl-5" style="cursor: pointer;">醫事甘苦談</a>
          <a class="list-group-item list-group-item-action pl-5" style="cursor: pointer;">健康檢查</a>
          <a class="list-group-item list-group-item-action pl-5" style="cursor: pointer;">醫療議題</a>
          <a class="list-group-item list-group-item-action pl-5" style="cursor: pointer;">飲食控制</a>
        </div>
      </div> 
    </div>
  </div>

  <div class="d-none d-xl-block">
    <div class="d-flex bd-highlight mb-3 align-items-center border-bottom ">
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
      <!-- 登入/註冊 -->
      <div class="p-2 bd-highlight d-flex align-items-center">
        <a href="./切版_signin.php">登入</a>
        <a class="m-2 btn btn-primary" href="./切版_signup.php">註冊</a>
      </div>
    </div>
  </div>

</header>