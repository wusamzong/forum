<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION["board"]; ?></title>
    <meta charset="utf-8">
</head>

<body>

<?php require("_header.php"); ?>

<nav>
    <?php require("_nav.php"); ?>
</nav>

<div>
    <div>
    <?php
        require("connect.php");
        $sql = $pdo->prepare('SELECT intro FROM board WHERE ID=?');
        $sql->execute([$_SESSION["board"]]);
        foreach ($sql->fetchAll() as $row) {
            echo '<h1>'.$_SESSION["board"].'</h1>';
            echo '<h2>'.$row["intro"].'</h2>';
        }
    ?>
    </div>

    <?php require("article_preview.php"); ?>
</div>

</body>
</html>