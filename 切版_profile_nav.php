<div class="d-flex align-items-center flex-column bd-highlight mb-3" style="height:750px;">
	<?php require("_connect.php");
	$sql = $pdo->prepare('SELECT * FROM account WHERE userName=?');
	$sql->execute([$_SESSION["userName"]]);
	foreach ($sql->fetchAll() as $row) {
		if ($row["photo"] == "default") {
			echo '<img src="images/site/大頭貼_白底.png" height="200px" alt="個人照片" class="mt-5 ml-4" />';
		} else {
			echo '<img src="images/'.$row["photo"].'" height="200px" alt="個人照片" class="mt-5 ml-4" />';
		}
		echo '<h2 class="text-light mt-3 font-weight-bold">'.$row["nickname"].'</h2>';
		echo '<h5 class="text-light">'.$row["intro"].'</h5>';
	} ?>
	<a class="text-light  " style="font-size: 22px ;margin-top:100px;text-decoration: underline; color:#FFFFFF;" href="切版_profile_mine.php">基本資料修改</a>
	<a class="text-light  " style="font-size: 22px ;text-decoration: underline; color:#FFFFFF;" href="切版_profile_account.php">帳號密碼修改</a>
	<a class="text-light my-1" style="font-size: 22px;text-decoration: underline;" href="切版_profile_keptArticles.php">所收藏的文章</a>
	<a class="text-light " style="font-size: 22px;text-decoration: underline;" href="切版_profile_myArticles.php">已發佈的文章</a>
</div>