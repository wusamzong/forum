<?php
$userName = "XUANYING";
$password = "s9841023";

try {
	// 建立連線
	$pdo = new PDO('mysql:host=localhost; dbname=forum; charset=utf8', $userName, $password);
	// 遇到錯誤就用例外處理
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>