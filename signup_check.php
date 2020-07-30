<?php session_start();
// 從資料庫取得電子信箱
require("_connect.php");
$sql = $pdo->prepare('SELECT email FROM account');
$sql->execute();

// email
$email = $_POST["email"];
// 檢查此電子信箱是否存在
$exist = false;
foreach ($sql->fetchAll() as $row) {
	if ($email == $row["email"]) {
		$exist = true;
	}
}

// 如果此電子信箱已存在，告知使用者
if ($exist == true) {
	echo "<alert>此帳號已有人註冊</alert>";
	header("refresh:3; url=切版_signup.php");
} else {
	// 如果此電子信箱不存在，建立帳號資料

	// 產生由n個隨機字元組成的字串
	function randomString($n) {
		$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$len = strlen($str)-1;
		$output = "";
		for($i=0 ; $i<$n; $i++ ){
			$output .= $str[rand(0,$len)];
		}
		return $output;
	}

	// 產生userName，檢查此帳號是否存在
	$userName = "";
	do {
		$userName = randomString(10);
		$exist = false;
		$sql = $pdo->prepare('SELECT userName FROM account');
		$sql->execute();
		foreach ($sql->fetchAll() as $row) {
			if ($userName == $row["userName"]) {
				$exist = true;
			}
		}
	} while ($exist == true);

	// realName
	$realName = $_POST["realName"];
	// nickname
	$nickname = $_POST["nickname"];

	// salt
	$salt = randomString(8);
	// password
	$password = $_POST["password"];
	$password = hash('sha256', $password.$salt);

	// photo
	$photo = "default";
	// intro
	$intro = $nickname."的自我介紹";
	// viewedTags
	$tagCount = $_POST["tagCount"];
	$countList = explode(" ", $tagCount);

	// 寫入帳號資料表
	$sql = $pdo->prepare('INSERT INTO account (email, userName, realName, nickname, salt, password, photo, intro) VALUES (?,?,?,?,?,?,?,?)');
	$sql->execute([$email, $userName, $realName, $nickname, $salt, $password, $photo, $intro]);

	// 查詢這個帳號的ID
	$userID = 0;
	$sql = $pdo->prepare('SELECT ID FROM account WHERE userName=?');
    $sql->execute([$userName]);
    foreach ($sql->fetchAll() as $row) {
		$userID = $row["ID"];
	}

	// 寫入瀏覽標籤資料表
	for ($i=1; $i < count($countList); $i++) {
		$sql = $pdo->prepare('INSERT INTO viewedtag (userID, viewedTagID, num) VALUES (?,?,?)');
		$sql->execute([$userID, $i, $countList[$i]]);
	}
	
	// 登入
	$_SESSION["userName"] = $userName;
	header("Location: 切版_index.php");
} ?>