<?php session_start();
if (isset($_SESSION["page"])) {
    // $_SESSION["page"] = ?;
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>論壇</title>
    <meta charset="utf-8">
    <?php require('_css.php') ?>
</head>

<body>

    <div class="container-md" style="margin: 0 10%;">
        <div class="row">
            <div class="col-12">
                <?php require("切版_header,登入後.php"); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">        
                <?php require("切版_latestArticles.php"); ?>
            </div>
        </div>
    </div>

    <?php require('_js.php') ?>
</body>

</html>