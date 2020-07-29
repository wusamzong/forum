<?php foreach ($sql->fetchAll() as $row) {
    // 收集資料
    $ID = $row["ID"];
    $title = $row["title"];
    $boardID = $row["boardID"];
    $boardName = "";

    $hideName = $row["hideName"];
    $authorID = $row["authorID"];
    $authorName = "";
    $authorPhoto = "dafault";
    
    $content = $row["content"];
    $goodPoint = $row["goodPoint"];
    $replyCount = 0;

    $postTime = $row["postTime"];
    date_default_timezone_set("Asia/Taipei");
    $currentTime = date_format(date_create(),"Y/m/d H:i:s");
    $passedTime = "";
    // 判斷現在時間和發文時間 相差幾年 或幾月 或幾日 或幾時 或幾分 需要寫很多程式碼 所以先跳過

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

    // 留言數量
    $sql = $pdo->prepare('SELECT * FROM reply WHERE articleID=?');
    $sql->execute([$ID]);
    $replyCount = $sql->rowCount();

    // 查詢自己的帳號的ID、是否已收藏此文章
    $kept = 0;
    if (isset($_SESSION["userName"])) {
        $sql = $pdo->prepare('SELECT * FROM keptarticle WHERE userID=? AND articleID=?');
        $sql->execute([$myID, $ID]);
        $kept = $sql->rowCount();
    }

    // 輸出文章
    echo '<article><div class="row shadow m-1 p-5 border rounded" id="app">'."\n";
        // 標題、看板名稱、作者名字、作者照片
        echo '<div class="col-12" onclick="window.location.href='."'切版_article_detail.php?ID=".$ID."'".'"><h3>'.$title.'</h3></div>'."\n";
        echo '<div class="col-12 row justify-content-between border-bottom">'."\n";
            echo '<div class="col-3"><span>'.$boardName.'</span></div>';
            echo '<div class="col-3 text-right">';
            if ($authorName == "匿名") {
                echo '<span>'.$authorName;
                echo '<img src="images/site/大頭貼_藍底.png" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                echo '</span></div>'."\n";
            } else {
                if ($myID != "" && $myID == $authorID) {
                    echo '<a href="切版_profile_mine.php">'.$authorName;
                } else {
                    echo '<a href="切版_profile_others.php?ID='.$authorID.'">'.$authorName;
                }
                if ($authorPhoto == "default") {
                    echo '<img src="images/site/大頭貼_藍底.png" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                } else {
                    echo '<img src="./images/'.$authorPhoto.'" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                } echo '</a></div>'."\n";
            }
        echo '</div>'."\n";

        // 文章內容、讚數、回覆數、發文時間
        echo '<div class="col-12 articalContentPreview border-bottom text-justify" onclick="window.location.href='."'切版_article_detail.php?ID=".$ID."'".'">';
            echo '<p>'.$content.'</p>';
        echo '</div>'."\n";
        echo '<div class="col-12 row justify-content-between"><div class="col-6">'."\n";
            echo '<img src="images/site/讚.png" height="40px" class="" alt="按讚" />';
            echo '<span class="mr-3">'.$goodPoint.'</span>'."\n";
            echo '<img src="images/site/對話框.png" height="40px" class="" alt="評論" />';
            echo '<span class="mr-3">'.$replyCount.'</span>'."\n";
            // 只有已登入的使用者可以收藏別人的文章
            if ($myID != "") {
                if ($myID != $authorID) {
                    echo '<span onclick="keepArticle('.$myID.','.$ID.')" class="mr-3">';
                    echo '<img src="images/site/書籤';
                    if ($kept == 1) { echo '2'; }
                    echo '.png" height="30px" id="keep'.$ID.'" alt="收藏文章" /></span>';
                }
            }
            echo '<span>'.$postTime.'</span>'."\n";
        echo '</div>'."\n";

        // 只有自己看到自己發佈的文章時才有刪除和編輯功能
        if ($myID == $authorID) {
        echo '<div class="col-2 text-right">';
            echo '<img src="./images/site/垃圾桶.png" height="50px" class="" alt="刪除">';
            echo '<img src="./images/site/筆.png" height="30px" class="" alt="編輯">';
        echo '</div>'."\n";
        }
        echo '</div>'."\n";
    echo '</div></article>'."\n";
} ?>