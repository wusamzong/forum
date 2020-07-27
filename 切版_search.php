<!DOCTYPE html>
<html>

<head>
    <title>搜尋結果</title>
    <meta charset="utf-8">
    <?php require('_css.php') ?>
</head>

<body class="bodySpace">
    <div class="container-xl">
        <div class="row">
            <div class="col-12 p-0">
                <?php require("切版_header,登入前.php"); ?>
            </div>
            <div class="col-xl-3 d-none d-xl-block p-0">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-xl-9 col-md-12 col-sm-12 pr-0">
                <!--有找到相關結果-->
                <div>
                  <h1 class="mt-3">搜尋結果</h1>
                  <?php require("切版_article_preview.php"); ?> 
                </div>
                
                <!--如果沒有找到相關資料-->
                <div>
                  <h1 class="mt-3">沒有找到相關文章</h1>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require('_js.php') ?>

</html>