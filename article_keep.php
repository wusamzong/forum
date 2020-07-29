<?php require("_connect.php");
$sql = $pdo->prepare('SELECT * FROM keptarticle WHERE userID=? AND articleID=?');
$sql->execute([$_GET["myID"], $_GET["ID"]]);

// 查無資料表示還沒收藏此文章>INSERT
// 已收藏此文章>DELETE
if ($sql->rowCount() == 0) {
	$sql = $pdo->prepare('INSERT INTO keptarticle (userID, articleID) VALUES (?, ?)');
	$sql->execute([$_GET["myID"], $_GET["ID"]]);
	echo "1";
} else {
	$sql = $pdo->prepare('DELETE FROM keptarticle WHERE userID=? AND articleID=?');
	$sql->execute([$_GET["myID"], $_GET["ID"]]);
	echo "0";
} ?>