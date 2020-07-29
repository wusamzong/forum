<?php require("_connect.php");
$sql = $pdo->prepare('SELECT * FROM followinguser WHERE userID=? AND followUserID=?');
$sql->execute([$_GET["myID"], $_GET["followUserID"]]);

// 查無資料表示還沒追蹤此使用者>INSERT
// 已追蹤此使用者>DELETE
if ($sql->rowCount() == 0) {
	$sql = $pdo->prepare('INSERT INTO followinguser (userID, followUserID) VALUES (?, ?)');
	$sql->execute([$_GET["myID"], $_GET["followUserID"]]);
	echo "1";
} else {
	$sql = $pdo->prepare('DELETE FROM followinguser WHERE userID=? AND followUserID=?');
	$sql->execute([$_GET["myID"], $_GET["followUserID"]]);
	echo "0";
} ?>