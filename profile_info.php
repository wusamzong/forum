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
		<label>
			<input type="file" name="photo" accept="image/*"/>選擇新頭貼
		</label>
		<input type="submit" value="上傳新頭貼"/>
		<!-- 上傳按鈕的製作方法 -->
		<!-- https://www.wfublog.com/2017/10/input-type-file-upload-css-skill.html -->
		
		<p>真實姓名：<span><?php echo $realName; ?></span></p>
		<p>
			<label for="nickname">暱稱：</label>
			<span><?php echo $nickname; ?></span>
			<input type="text" name="nickname" value="<?php echo $nickname; ?>"/>
			<button onclick="edit()"><img src="" alt="編輯"/></button>
			<button onclick="cancel()"><img src="" alt="取消"/></button>
			<label>
				<input type="submit" value="nickname"/>送出
				<!-- <img src="images/site/default_photo.png" alt="送出"/> -->
			</label>
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

		<style>
			/* input { */
				/* display: none; */
			/* } */
		</style>
		<script>
			// function edit(name) {
			// 	document.forms["info"][name].display="none";
			// }
			// https://www.itread01.com/content/1545047526.html
		</script>
	</form>
</div>