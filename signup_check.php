<?php session_start();
// 從資料庫取得電子信箱
require("_connect.php");
$sql = $pdo->prepare('SELECT email FROM account');
$sql->execute();

// 檢查此電子信箱是否存在
$exist = false;
foreach ($sql->fetchAll() as $row) {
	if ($_POST["email"] == $row["email"]) {
		$exist = true;
	}
}

// 如果此電子信箱已存在，告知使用者
if ($exist == true) {
	echo "<alert>此帳號已有人註冊</alert>";
	header("refresh:3; url=signup.php");
} else {
	// 如果此電子信箱不存在，建立帳號資料
	// userName
	
// email
// password
// salt
// realName
// nickname
// photo // "site/default_photo.png"
// intro
// viewedTags

// 登入
	$_SESSION["userName"] = ???;
	header("Location:index.php");
}
?>