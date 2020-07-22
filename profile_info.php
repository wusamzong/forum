<?php session_start(); ?>

<h2>基本資料修改</h2>
<div>
	<?php
	require("_connect.php");
	$sql = $pdo->prepare('SELECT photo, realName, nickname, intro, email FROM account WHERE userName=?');
	$sql->execute([$_SESSION["userName"]]);
	$photo = "";
	$realName = "";
	$nickname = "";
	$intro = "";
	$email = "";
	foreach ($sql->fetchAll() as $row) {
		$photo = $row["photo"];
		$realName = $row["realName"];
		$nickname = $row["nickname"];
		$intro = $row["intro"];
		$email = $row["email"];
	}
	?>

	<img src="<?php echo "images/".$photo; ?>" alt="個人照片"/>
	<form name="info" onsubmit="return validateForm()" action="profile_info_update.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="photo" value="上傳新頭貼" accept="image/*"/>
		
		<p>真實姓名：<span><?php echo $realName; ?></span></p>
		<p>
			<label for="nickname">暱稱：</label>
			<span><?php echo $nickname; ?></span>
			<input type="text" name="nickname"/>
			<input type="submit" value=""/>
		</p>

		<p>
			<label for="intro">自我介紹：</label>
			<span><?php echo $intro; ?></span>
			<input type="text" name="intro"/>
			<input type="submit" value=""/>
		</p>
		
		<p>
			<label for="email">電子信箱：</label>
			<span><?php echo $email; ?></span>
			<input type="text" name="email"/>
			<input type="submit" value=""/>
		</p>

		<p>
			<label for="password">密碼：</label>
			<span>請在此輸入新密碼</span>
			<input type="password" name="password"/>
			<input type="submit" value=""/>
		</p>
	</form>
</div>