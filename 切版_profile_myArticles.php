<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我看我的個人主頁</title>
    <?php require('_css.php') ?>
    <?php require('_js.php') ?>
</head>

<body>
<div class="container-md bodyMargin" >
        <div class="row">
            <div class="col-12">
                <?php require("切版_header,登入後.php"); ?>
            </div>
            <div class="col-xl-3 leftNavigationBar d-none d-xl-block">
                <?php require("切版_profile_nav.php"); ?>
            </div>
            <div class="col-9">
                <div class="d-flex align-items-center flex-column bd-highlight mb-3 flexHight">
                    <h1 class="mt-5 p-4 font-weight-bolder titleColor">已發佈的文章</h1>

                    <?php // 查詢我的ID
                    $myID = "";
                    if (isset($_SESSION["userName"])) {
                        $sql = $pdo->prepare('SELECT ID FROM account WHERE userName=?');
                        $sql->execute([$_SESSION["userName"]]);
                        foreach ($sql->fetchAll() as $row) {
                            $myID = $row["ID"]; }
                    }

                    // 讀取article資料表的所有資料，範圍是我收藏的文章
                    $sql = $pdo->prepare('SELECT * FROM article WHERE authorID=?');
                    $sql->execute([$myID]);
                    require("切版_article_preview.php"); ?>
                </div>
            </div>
        </div>
</body>