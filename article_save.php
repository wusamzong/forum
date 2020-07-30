<?php session_start();
require("_connect.php");

// authorID
$authorID = "";
$sql = $pdo->prepare('SELECT ID FROM account WHERE userName=?');
$sql->execute([$_SESSION["userName"]]);
foreach ($sql->fetchAll() as $row) {
	$authorID = $row["ID"];
}
// hideName
$hideName = $_POST["hideName"];
// boardID
$boardID = $_POST["boardID"];
// title
$title = $_POST["title"];
// content
$content = $_POST["content"];
// tagIDs, postedTags
$tagCount = $_POST["tagCount"];
$postedTags = explode(" ", $tagCount);
$tagIDs = "";
for ($i=1; $i<count($postedTags) ; $i++) { 
	// 如果第i個已發布標籤有被選用
	// 就把標籤的ID加到$tagIDs的最後面
	if ($postedTags[$i] == 1) {
		$tagIDs .= $i;
		$tagIDs .= " ";
	}
}
// postTime
date_default_timezone_set("Asia/Taipei");
$postTime = date_format(date_create(),"Y/m/d H:i:s");

// 寫入文章資料表
$sql = $pdo->prepare('INSERT INTO article (authorID, hideName, boardID, title, content, tagIDs, postTime) VALUES (?,?,?,?,?,?,?)');
$sql->execute([$authorID, $hideName, $boardID, $title, $content, $tagIDs, $postTime]);

// 寫入已發布的標籤資料表
for ($i=1; $i<count($postedTags); $i++) {
	// 檢查第i個標籤是否有被這篇文章用到
	if ($postedTags[$i] == "1") {
		// 搜尋以前是否有用過
		$sql = $pdo->prepare('SELECT postedTagID,num FROM postedtag WHERE userID=? AND postedTagID=?');
		$sql->execute([$authorID, $i]);
		// 有用過就更新
		if ($sql->rowCount() == 1) {
			foreach ($sql->fetchAll() as $row) {
				$sql = $pdo->prepare('UPDATE postedtag SET num=? WHERE userID=? AND postedTagID=?');
				$newNum = $row["num"]+1;
				$sql->execute([$newNum, $authorID, $i]);
			}
		} else { // 沒用過再新增
			$sql = $pdo->prepare('INSERT INTO postedtag (userID, postedTagID, num) VALUES (?,?,?)');
			$sql->execute([$authorID, $i, 1]);
		}
	}
}

header("Location: 切版_index.php");
?>