<?php
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

    // 輸出文章
    echo '<article><div class="row shadow m-1 p-5 border rounded" id="app" onclick="window.location.href='."'切版_article_detail.php?ID=".$ID."'".'">'."\n";
        // 標題、看板名稱、作者名字、作者照片
        echo '<div class="col-12"><h3>'.$title.'</h3></div>'."\n";
        echo '<div class="col-12 row justify-content-between border-bottom">'."\n";
            echo '<div class="col-3"><span>'.$boardName.'</span></div>';
            echo '<div class="col-3 text-right">';
            if ($authorName == "匿名") {
                echo '<span>'.$authorName;
                echo '<img src="images/site/大頭貼_藍底.png" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                echo '</span></div>'."\n";
            } else if ($authorPhoto == "default") {
                echo '<a href="">'.$authorName;
                echo '<img src="images/site/大頭貼_藍底.png" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                echo '</a></div>'."\n";
            } else {
                echo '<a href="">'.$authorName;
                echo '<img src="./images/'.$authorPhoto.'" height="25px" class="mb-2 ml-1" alt="帳戶圖片">';
                echo '</a></div>'."\n";
            }
        echo '</div>'."\n";

        // 文章內容、讚數、回覆數、發文時間
        echo '<div class="col-12 articalContentPreview border-bottom text-justify">';
            echo '<p>'.$content.'</p>';
        echo '</div>'."\n";
        echo '<div class="col-12 row justify-content-between"><div class="col-5">'."\n";
            echo '<img src="./images/site/讚.png" height="40px" class="" alt="按讚" />';
            echo '<span class="mr-3">'.$goodPoint.'</span>'."\n";
            echo '<img src="./images/site/對話框.png" height="40px" class="" alt="評論" />';
            echo '<span class="mr-3">'.$replyCount.'</span>'."\n";
            echo '<img src="./images/site/書籤.png" height="30px" class="" alt="收藏文章" />';
            echo '<span>　</span>';
            echo '<span>'.$postTime.'</span>'."\n";
        echo '</div>'."\n";

        // 只有自己看到自己發佈的文章時才有刪除和編輯功能
        if (isset($myID)) {
            if ($myID == $authorID) {
        echo '<div class="col-2 text-right">';
            echo '<img src="./images/site/垃圾桶.png" height="50px" class="" alt="刪除">';
            echo '<img src="./images/site/筆.png" height="30px" class="" alt="編輯">';
        echo '</div>'."\n";
        }}
        echo '</div>'."\n";
    echo '</div></article>'."\n";
}
?>