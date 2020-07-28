<div class="d-flex align-items-center flex-column bd-highlight mb-3" style="height: 700px;">
	<h1 class="mt-5 mb-4 font-weight-bolder" style="color: #1D2D44;">基本資料修改</h1>

	<?php require("_connect.php");
	$sql = $pdo->prepare('SELECT photo,realName,nickname,intro FROM account WHERE userName=?');
	$sql->execute([$_SESSION["userName"]]);
	$photo = "";
	$realName = "";
	$nickname = "";
	$intro = "";
	foreach ($sql->fetchAll() as $row) {
		$photo = $row["photo"];
		$realName = $row["realName"];
		$nickname = $row["nickname"];
		$intro = $row["intro"];
	}

	if ($photo == "default") {
		echo '<img src="images/site/大頭貼_藍底.png" height="200px" alt="個人照片"/>';
	} else {
		echo '<img src="images/'.$photo.'" height="200px" alt="個人照片"/>';
	} ?>
	
	<div style="padding-left:250px " class="p-10">
		<form name="info" action="info_check.php" method="POST" enctype="multipart/form-data">

		<label style="margin-left:100px;  background:#1F81C4; border:#1F81C4;" class="btn btn-primary btn-lgc mt-3 ">
			<input type="file" name="photo" accept="image/*" style="display: none"/>選擇新頭貼
		</label>

		<p style="font-size: 20px; margin-top:20px;">真實姓名：</p>
		<p><?php echo $realName; ?></p>
		
		<p style="font-size: 20px;">暱稱：</p>
		<p id="ori_nickname"><?php echo $nickname; ?></p>
		<input type="text" name="nickname" value="<?php echo $nickname; ?>" style="display: none"/>
		
		<p style="font-size: 20px;">自我介紹：</p>
		<p id="ori_intro"><?php echo $intro; ?></p>
		<input type="text" name="intro" value="<?php echo $intro; ?>" style="display: none"/>

		<span id="edit" onclick="edit()" style="margin-left:100px;  background:#1F81C4; border:#1F81C4;" class="btn btn-primary btn-lgc mt-3 ">編輯</span>
		<input type="submit" name="submit" value="確定" style="margin-left:100px;  background:#1F81C4; border:#1F81C4; display: none" class="btn btn-primary btn-lgc mt-3 "/>

		<script>
			function edit() {
				document.getElementById("ori_nickname").style.display = "none";
				document.forms["info"]["nickname"].style.display = "block";
				document.getElementById("ori_intro").style.display = "none";
				document.forms["info"]["intro"].style.display = "block";
				document.getElementById("edit").style.display = "none";
				document.forms["info"]["submit"].style.display = "block";
			}
		</script>
		</form>
	</div>
</div>