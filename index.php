<?php session_start();
if (isset($_SESSION["page"])) {
    // $_SESSION["page"] = ?;
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>論壇</title>
    <meta charset="utf-8">
</head>

<body>

<?php require("_header.php"); ?>

<?php require("_nav.php"); ?>

<?php require("latestArticles.php"); ?>

</body>
</html>