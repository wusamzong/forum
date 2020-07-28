<?php session_start();
require("_connect.php");
$sql = $pdo->prepare('SELECT email FROM account WHERE userName=?');
$sql->execute([$_SESSION["userName"]]);
$email = "";
foreach($sql->fetchAll() as $row) {
	$email = $row["email"];
}

if ($_POST["email"] != "") {
	$email = $_POST["email"];
}

$sql = $pdo->prepare('UPDATE account SET email=? WHERE userName=?');
$sql->execute([$email, $_SESSION["userName"]]);
header("Location: 切版_profile_account.php");
?>