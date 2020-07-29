<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>論壇</title>
    <meta charset="utf-8">
    <?php require('_css.php') ?>
</head>

<body>
    <div class="container-lg" style="margin: 0 10%;">
        <div class="row">
            <div class="col-12">
                <?php if (!isset($_SESSION["userName"])) {
                    require("切版_header,登入前.php");
                } else {
                    require("切版_header,登入後.php");
                } ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h1 class="display-4 mt-2">最新文章</h1>
                
                <?php // 查詢我的ID
                $myID = "";
                if (isset($_SESSION["userName"])) {
                    $sql = $pdo->prepare('SELECT ID FROM account WHERE userName=?');
                    $sql->execute([$_SESSION["userName"]]);
                    foreach ($sql->fetchAll() as $row) {
                        $myID = $row["ID"]; }
                }

                // 讀取article資料表的所有資料，由新到舊
                $sql = $pdo->prepare('SELECT * FROM article ORDER BY postTime DESC');
                $sql->execute();
                require("切版_article_preview.php"); ?>
            </div>
        </div>
    </div>

    <?php require('_js.php') ?>
</body>

</html>