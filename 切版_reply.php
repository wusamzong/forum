<?php
foreach ($sql->fetchAll() as $row) {
  // 取得資料
  $authorID = $row["authorID"];
  $authorName = "";
  $authorPhoto = "";
  $content = $row["content"];
  $postTime = $row["postTime"];
  $goodPoint = $row["goodPoint"];
  
  $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE ID=?');
  $sql->execute([$authorID]);
  foreach ($sql->fetchAll() as $row) {
    $authorName = $row["nickname"];
    $authorPhoto = $row["photo"];
  }
  if ($authorPhoto == "default") {
    $authorPhoto = "site/大頭貼_藍底.png";
  }

  // 列出留言
  echo '<div class="media border-bottom m-3">';
  echo '<img src="images/'.$authorPhoto.'" width="60px" class="mr-1" alt="帳戶圖片">';
  echo '<div class="media-body">';
    echo '<div class="row">';
      echo '<div class="col-6">';
        echo '<p class="mt-0 mb-1">'.$authorName.'</p>';
        echo '<p class="m-0">'.$postTime.'</p>';
        echo '</div>';
        echo '<div class="col-6 text-right">';
        echo '<img src="./images/site/讚.png" height="40px" alt="讚數">';
        echo '<span>'.$goodPoint.'</span>';
        echo '<img src="./images/site/檢舉.png" height="35px" alt="檢舉">';
      echo '</div>';
      echo '<p style="white-space:pre-wrap;">'.$content.'</p>';
    echo '</div></div></div>';
} ?>