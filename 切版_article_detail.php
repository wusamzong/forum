<?php session_start();
// 讀取article資料表的所有資料，由新到舊
require("_connect.php");
$sql = $pdo->prepare('SELECT * FROM article WHERE ID=?');
$sql->execute([$_GET["ID"]]);
foreach ($sql->fetchAll() as $row) {
  $ID = $row["ID"];
  $title = $row["title"];
  $boardID = $row["boardID"];
  $boardName = "";

  $hideName = $row["hideName"];
  $authorID = $row["authorID"];
  $authorName = "";
  $authorPhoto = "dafault";
  
  $content = $row["content"];
  $tagIDs = $row["tagIDs"];
  $tagIDs = explode(" ", $tagIDs);
  $tagList = [];
  
  $goodPoint = $row["goodPoint"];
  $replyCount = 0;

  $postTime = $row["postTime"];
  date_default_timezone_set("Asia/Taipei");
  $currentTime = date_format(date_create(),"Y/m/d H:i:s");
  $passedTime = "";
  // 判斷現在時間和發文時間 相差幾年 或幾月 或幾日 或幾時 或幾分 需要寫很多程式碼 所以先跳過

  $myID = "";
  $myNickname = "";
  $myPhoto = "";
  $kept = 0;
  $follow = 0;

  // 看板名稱
  $sql = $pdo->prepare('SELECT name FROM board WHERE ID=?');
  $sql->execute([$boardID]);
  foreach ($sql->fetchAll() as $row) {
      $boardName = $row["name"]; }
  
  // 作者名稱和照片
  if ($hideName == 0) {
      $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE ID=?');
      $sql->execute([$authorID]);
      foreach ($sql->fetchAll() as $row) {
          $authorName = $row["nickname"];
          $authorPhoto = $row["photo"];
      }
  } else {
      $authorName = "匿名";
  }

  // 標籤名稱
  for ($i=0; $i<count($tagIDs); $i++) {
    $sql = $pdo->prepare('SELECT name FROM tag WHERE ID=?');
    $sql->execute([$tagIDs[$i]]);
    foreach ($sql->fetchAll() as $row) {
      $tagList[$i] = $row["name"];
    }
  }

  // 留言
  $sql = $pdo->prepare('SELECT * FROM reply WHERE articleID=?');
  $sql->execute([$_GET["ID"]]);
  $replyCount = $sql->rowCount();
  foreach ($sql->fetchAll() as $row) {}

  if (isset($_SESSION["userName"])) {
    // 查詢我的資料
    $sql = $pdo->prepare('SELECT ID, nickname, photo FROM account WHERE userName=?');
    $sql->execute([$_SESSION["userName"]]);
    foreach ($sql->fetchAll() as $row) {
      $myID = $row["ID"];
      $myNickname = $row["nickname"];
      $myPhoto = $row["photo"];
    }

    // 是否已收藏此文章
    $sql = $pdo->prepare('SELECT * FROM keptarticle WHERE userID=? AND articleID=?');
    $sql->execute([$myID, $ID]);
    $kept = $sql->rowCount();

    // 是否已追蹤此作者
    $sql = $pdo->prepare('SELECT * FROM followinguser WHERE userID=? AND followUserID=?');
    $sql->execute([$myID, $authorID]);
    $follow = $sql->rowCount();

    // 將此文章有的標籤的瀏覽次數加一
    for ($i=0; $i<count($tagIDs); $i++) {
		  // 搜尋以前是否有用過
      $sql = $pdo->prepare('SELECT num FROM viewedtag WHERE userID=? AND viewedTagID=?');
      $sql->execute([$myID, $tagIDs[$i]]);
      // 有用過就更新
      if ($sql->rowCount() == 1) {
        foreach ($sql->fetchAll() as $row) {
          $sql = $pdo->prepare('UPDATE viewedtag SET num=? WHERE userID=? AND viewedTagID=?');
          $newNum = $row["num"]+1;
          $sql->execute([$newNum, $myID, $tagIDs[$i]]);
        }
      } else { // 沒用過再新增
        $sql = $pdo->prepare('INSERT INTO viewedtag (userID, viewedTagID, num) VALUES (?,?,?)');
        $sql->execute([$myID, $tagIDs[$i], 1]);
      }
    }
  }
} ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <?php require('_css.php') ?>
</head>

<body class="bodySpace">
  <div class="container-xl">
    <div class="row">
      <div class="col-12">
        <?php if (!isset($_SESSION["userName"])) {
          require("切版_header,登入前.php");
        } else {
          require("切版_header,登入後.php");
        } ?>
      </div>
      <div class="col-3 d-none d-xl-block">
        <?php require("切版_nav.php"); ?>
      </div>
      <div class="col-xl-9 col-lg-12 mt-4">
        <div class="border bg-white shadow rounded p-3">
          <div class="row mt-4 ml-4 mr-4">

            <!--文章的基本資料-->
            <div class="media col-6">
              <?php
              if ($authorName == "匿名") {
                echo '<img src="images/site/大頭貼_藍底.png" width="60px" class="mr-1" alt="帳戶圖片">';
              } else if ($authorPhoto == "default") {
                echo '<a href="切版_profile_others.php?ID='.$authorID.'">';
                echo '<img src="images/site/大頭貼_藍底.png" width="60px" class="mr-1" alt="帳戶圖片">';
                echo '</a>'."\n";
              } else {
                echo '<a href="">';
                echo '<img src="./images/'.$authorPhoto.'" width="60px" class="mr-1" alt="帳戶圖片">';
                echo '</a>'."\n";
              } ?>


              <div class="media-body">
                <?php if ($authorName == "匿名") {
                  echo '<span>'.$authorName.'</span>';
                } else {
                  echo '<a href="切版_profile_others.php?ID='.$authorID.'" class="mt-0 mb-1">'.$authorName.'</a>';
                } ?>
                
                <?php
                // 作者沒有匿名的時候，已登入的使用者可以追蹤別人
                if ($authorName != "匿名") {
                  if ($myID != "" && $myID != $authorID) {
                    echo '<span onclick="followUser('.$myID.','.$authorID.')" id="follow" class="badge badge-dark ml-2">';
                    if ($follow == 1) { echo '取消'; }
                    echo '追蹤</span>';
                  }
                } ?>
                <p class="m-0"><?php echo $boardName; ?></p>
              </div>
            </div>
            <div class="col-6 text-right">
              <span  onclick="history.back();location.reload()">
              <img src="./images/site/關閉.png" height="60px" alt="關閉文章"></span>
            </div>
          </div>
          <!--內文/標籤-->
          <div class=" border-top border-bottom my-3 px-4">
            <p class="my-1" style="white-space:pre-wrap;">
              <?php echo $content; ?>
            </p>
            <div class="my-1">
              <?php
              for ($i=0; $i<count($tagList); $i++) {
                echo '<a href="#" class="badge badge-primary mr-2"># '.$tagList[$i].'</a>';
              } ?>
            </div>
          </div>
          <!--數據/檢舉-->
          <div class="row m-3">
            <div class="col-6">
              <img src="./images/site/讚.png" height="40px" class="" alt="按讚" />
              <span class="mr-3"><?php echo $goodPoint; ?></span>
              <img src="./images/site/對話框.png" height="40px" class="" alt="評論" />
              <span class="mr-3"><?php echo $replyCount; ?></span>
              <?php
              // 只有已登入的使用者可以收藏別人的文章
              if ($myID != "" && $myID != $authorID) {
                  echo '<span onclick="keepArticle('.$myID.','.$ID.')" class="mr-3">';
                  echo '<img src="images/site/書籤';
                  if ($kept == 1) { echo '2'; }
                  echo '.png" height="30px" id="keep'.$ID.'" alt="收藏文章" /></span>';
              } ?>
              <span class="ml-4"><?php echo $postTime;?></span>
            </div>
            <div class="col-6 text-right">
              <?php
              // 只有自己看到自己發佈的文章時才有刪除和編輯功能
              if ($myID == $authorID) {
                echo '<img src="./images/site/垃圾桶.png" height="50px" class="" alt="刪除">';
                echo '<img src="./images/site/筆.png" height="30px" class="" alt="編輯">';
              } ?>
              <img src="./images/site/檢舉.png" height="40px" class="" alt="檢舉" />
            </div>
          </div>

          <!--留言功能-->
          <?php
          if (isset($_SESSION["userName"])) {
            echo '<div class="media m-3 mt-4">';
            if ($myPhoto == "default") {
              echo '<img src="images/site/大頭貼_藍底.png" width="60px" class="my-1" alt="帳戶圖片">';
            } else {
              echo '<img src="./images/'.$myPhoto.'" width="60px" class="my-1" alt="帳戶圖片">';
            }
            echo '<div class="media-body ml-2">';
              echo '<p class="mt-0 mb-1">'.$myNickname.'</p>';
              echo '<form name="reply" action="reply_save.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="articleID" value="'.$_GET["ID"].'"/>';
                echo '<input type="hidden" name="authorID" value="'.$myID.'"/>';
                echo '<div class="form-group">';
                  echo '<label>留言</label>';
                  echo '<textarea class="form-control" id="" name="content" style="width: 800px; height: 100px;"></textarea>';
                  echo '<input type="submit" class="btn btn-primary" value="送出"/>';
                echo '</div></form></div></div>';
          } ?>
        </div>

        <!--列出所有留言-->
        <div>
          <?php
          $sql = $pdo->prepare('SELECT * FROM reply WHERE articleID=? ORDER BY postTime ASC');
          $sql->execute([$_GET["ID"]]);
          require("切版_reply.php") ?>
        </div>

      </div>
    </div>
  </div>
  </div>
  <?php require('_js.php') ?>
</body>

</html>