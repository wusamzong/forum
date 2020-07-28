<?php require("_connect.php");
$articleID = $_POST["articleID"];
$authorID = $_POST["authorID"];
$content = $_POST["content"];
date_default_timezone_set("Asia/Taipei");
$postTime = date_format(date_create(),"Y/m/d H:i:s");

// 寫入留言資料表
$sql = $pdo->prepare('INSERT INTO reply (articleID, authorID, content, postTime) VALUES (?,?,?,?)');
$sql->execute([$articleID, $authorID, $content, $postTime]);

$backTo = "Location: 切版_article_detail.php?ID=".$articleID;
header($backTo);
?>