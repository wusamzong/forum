<?php session_start();
if (isset($_SESSION["page"])) {
    // $_SESSION["page"] = ?;
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>論壇</title>
    <meta charset="utf-8">
    <?php require('css.php') ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">row1</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            <?php require("_header.php"); ?>

<?php require("_nav.php"); ?>

<?php require("latestArticles.php"); ?>
            </div>

        </div>
    </div>

    <?php require('js.php') ?>
</body>

</html>