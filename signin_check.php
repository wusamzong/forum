<?php session_start();

// 從資料庫取得使用者名稱、電子信箱、密碼、鹽
require("_connect.php");
$sql = $pdo->prepare('SELECT userName,email,password,salt FROM account');
$sql->execute();

// 檢查此電子信箱是否存在
$exist = false;
foreach ($sql->fetchAll() as $row) {
	if ($_POST["email"] == $row["email"]) {
		$exist = true;
	}
}

// 如果此電子信箱不存在，告知使用者
if ($exist == false) {
	echo "<alert>此帳號不存在</alert>";
	header("refresh:3; url=signin.php");
} else {
	// 如果此電子信箱已存在，檢查密碼
	$password_hashed = hash('sha256', $_POST["password"].$row["salt"]);

	if ($password_hashed == $row["password"]) {
		$_SESSION["userName"] = $row["userName"];
		header("Location: index.php");
	} else {
		echo "<alert>密碼錯誤</alert>";
		header("refresh:3; url=signin.php");
	}

	// echo "userName: ".$row["userName"]."<br/>";
	// echo "\$_POST['email']: ".$_POST["email"]."<br/>";
	// echo "\$row['email']: ".$row['email']."<br/>";
	// echo "\$_POST['password']: ".$_POST["password"]."<br/>";

	// echo "\$password_hashed: ".$password_hashed."<br/>";
	// echo "\$row['password']: ".$row["password"]."<br/>";
	// echo "salt: ".$row["salt"];
}
?>