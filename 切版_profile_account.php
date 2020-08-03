<?php session_start(); ?>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>我看我的個人主頁</title>
	<?php require('_css.php') ?>
	<?php require('_js.php') ?>
</head>

<body style="overflow:hidden;">
	<div class="container-md bodyMargin" id="app">
		<div class="row">
			<div class="col-12">
				<?php require("切版_header,登入後.php"); ?>
			</div>
			<div class="col-xl-3 leftNavigationBar d-none d-xl-block">
				<?php require("切版_profile_nav.php"); ?>
			</div>

			<div class="col-xl-9 col-lg-12 accontContentMargin">
			<h2 class=" mb-5 font-weight-bolder text-center accountTitle">帳號密碼修改</h2>
			   <div class="d-flex align-items-center flex-column bd-highlight mb-3 flexHight">

					<?php require("_connect.php");
					$sql = $pdo->prepare('SELECT email FROM account WHERE userName=?');
					$sql->execute([$_SESSION["userName"]]);
					$email = "";
					foreach ($sql->fetchAll() as $row) {
						$email = $row["email"];
					} ?>
					
					<form name="account" action="account_check.php" method="POST" enctype="multipart/form-data">
					<p style="font-size: 20px;">電子郵件信箱：</p>
					<span id="ori_email"><?php echo $email; ?></span>
					<input type="email" name="email" style="display: none" />
					<span id="edit" onclick="edit()"><img src="images/site/筆.png" style="height: 30px" alt="編輯"/></span>
					<input type="submit" name="submit" value="確定" style="margin-left:100px;  background:#1F81C4; border:#1F81C4; display: none" class="btn btn-primary btn-lgc mt-3 "/>
					</form>

					<!--{{step}}-->
					<p>
						<label>密碼：<br />
						<input type="password" value="12345" disabled></label>
						<p @click="turnstep">修改密碼</p>
					</p>
				</div>

				<div>
					<form name="password" onsubmit="return validateForm()" action="password_check.php" method="POST" enctype="multipart/form-data" class="align-items-center flex-column p-4 bg-light border" :class="[step ? 'd-flex':'d-none']" style="width: 40vw; position:absolute; top: -150px; right: 70px;">
						<img src="./images/site/關閉3.png" height="60px" style="margin-left: 30vw;" alt="關閉" @click="turnstep" />
						<h1 class=" font-weight-bold text-center " style="color:#1D2D44;">更改密碼</h1>
						<div class="form-group">
							<label for="currentPassword">目前密碼</label>
							<input type="password" name="currentPassword" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="newPassword1">新密碼</label>
							<input type="password" name="newPassword1" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="newPassword2" name="new2Label">確認新密碼</label>
							<input type="password" name="newPassword2" class="form-control" placeholder="Password">
							<p id="new2Error"></p>
						</div>
						<input type="submit" value="確定" class="btn btn-primary" />
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
	var app = new Vue({
		el: '#app',
		data: {
			step: false,
		},
		methods: {
			turnstep() {
				this.step = !this.step;
			}
		}
	})
</script>

<script>
	function edit() {
		document.getElementById("ori_email").style.display = "none";
		document.forms["account"]["email"].style.display = "inline";
		document.getElementById("edit").style.display = "none";
		document.forms["account"]["submit"].style.display = "inline";
	}
	function validateForm() {
		var current = document.forms["password"]["currentPassword"];
		if (current.value == "") {
			current.placeholder = "請輸入目前的密碼";
			return false;
		}
		var new1 = document.forms["password"]["newPassword1"];
		if (new1.value == "") {
			new1.placeholder = "請輸入新密碼";
			return false;
		}
		var new2 = document.forms["password"]["newPassword2"];
		if (new2.value == "") {
			new2.placeholder = "請輸入確認新密碼";
			return false;
		}
		var new2Error = document.getElementById("new2Error");
		if (new1.value != new2.value) {
			new2Error.innerHTML = "新密碼與確認新密碼不同！";
			return false;
		}
	}
</script>