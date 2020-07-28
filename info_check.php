<?php session_start();
require("_connect.php");
$sql = $pdo->prepare('SELECT photo,nickname,intro FROM account WHERE userName=?');
$sql->execute([$_SESSION["userName"]]);
$photo = "";
$nickname = "";
$intro = "";
foreach($sql->fetchAll() as $row) {
	$photo = $row["photo"];
	$nickname = $row["nickname"];
	$intro = $row["intro"];
}

if ($_POST["photo"] != "") {
	$photo = $_POST["photo"];
}
if ($_POST["nickname"] != "") {
	$nickname = $_POST["nickname"];
}
if ($_POST["intro"] != "") {
	$intro = $_POST["intro"];
}
$sql = $pdo->prepare('UPDATE account SET photo=?, nickname=?, intro=? WHERE userName=?');
$sql->execute([$photo, $nickname, $intro, $_SESSION["userName"]]);
header("Location: 切版_profile_mine.php");
?>