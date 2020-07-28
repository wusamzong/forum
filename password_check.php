<?php session_start();
require("_connect.php");
$sql = $pdo->prepare('SELECT salt,password FROM account WHERE userName=?');
$sql->execute([$_SESSION["userName"]]);
$salt = "";
$password = "";
foreach($sql->fetchAll() as $row) {
	$salt = $row["salt"];
	$oldPassword = $row["password"];
}

$currentPassword = hash('sha256', $_POST["currentPassword"].$salt);

if ($oldPassword == $currentPassword) {
	$newPassword = hash('sha256', $_POST["newPassword1"].$salt);
	$sql = $pdo->prepare('UPDATE account SET password=? WHERE userName=?');
	$sql->execute([$newPassword, $_SESSION["userName"]]);
}

header("Location: 切版_profile_account.php");
?>