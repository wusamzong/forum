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
    <div class="container-lg bodySpace">
        <div class="row">
            <div class="col-12">
                <?php require("切版_header,登入前.php"); ?>
            </div>
            <div class="col-xl-3 d-none d-xl-block">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-xl-9 col-md-12 col-sm-12">
                <?php require("切版_latestArticles.php"); ?>
            </div>
        </div>
    </div>
</body>
<?php require('_js.php') ?>

</html>