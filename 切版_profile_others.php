<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>別人看我的個人主頁</title>
    <?php require('_css.php') ?>
    <?php require('_js.php') ?>
</head>

<body>

    <div class="container-md" style="margin: 0 10%;">
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
            <div class="col-lg-9 col-md-9 col-sm-12 mt-4" style="height:250px; background:#4899D0;">

                <div class="row">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="col-4">
                        <?php require("_connect.php");
	                    $sql = $pdo->prepare('SELECT photo,nickname,intro FROM account WHERE ID=?');
	                    $sql->execute([$_GET["ID"]]);
	                    $photo = "";
                        $nickname = "";
                        $intro = "";
	                    foreach ($sql->fetchAll() as $row) {
                            $photo = $row["photo"];
                            $nickname = $row["nickname"];
                            $intro = $row["intro"];
                        }
                        
                        if ($photo == "default") {
                            echo '<img src="images/site/大頭貼_白底.png" height="150px" alt="個人照片" class="mt-2 ml-4" />';
                        } else {
                            echo '<img src="images/'.$photo.'" height="150px" alt="個人照片" class="mt-2 ml-4" />"';
                        } ?>
                        </div>
                        <div class="col-4 " style="margin-top:60px ;margin-left:60px ;">
                            <h1 style="color: white"><?php echo $nickname; ?></h1>
                        </div>

                        <div class="col-4 " style="margin-top:70px ; margin-left:-55px ;">
                        <?php if (isset($_SESSION["userName"])) {
                            echo '<button style="background: #1D2D44; border: #1D2D44;" type="button" class="btn btn-primary">追蹤</button>';
                        } ?>
                        </div>
                    </div>
                </div>
                <h3 style="color:#FFFFFF;" class="ml-5 mt-2"><?php echo $intro; ?></h3>
                <div class="mt-5">
                <?php
                // 讀取article資料表的所有資料，範圍是指定的看板ID
                $sql = $pdo->prepare('SELECT * FROM article WHERE authorID=? AND hideName=0 ORDER BY postTime DESC');
                $sql->execute([$_GET["ID"]]);
                require("切版_article_preview.php"); ?>
                </div>
            </div>
        </div>
    </div>
</body>