<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>我看我的個人主頁</title>
	<?php require('_css.php') ?>
	<?php require('_js.php') ?>
</head>


<body class="bodyOverflow">
	<div class="container-md bodyMargin" id="app">
	<div class="row">
			<div class="col-12">
				<?php require("切版_header,登入後.php"); ?>
			</div>
			<div class="col-xl-3 leftNavigationBar d-none d-xl-block">
				<div class="d-flex align-items-center flex-column bd-highlight mb-3 leftNavigationFlex">
					<img src="./images/site/大頭貼2.png" height="200px" alt="個人照片" class="mt-5 ml-4" />
					<h1 class="text-light mt-3 font-weight-bold">暱稱</h1>
					<h5 class="text-light">這是公開的自我介紹</h5>
					<a class="text-light  basicInformation" href="">基本資料修改</a>
					<a class="text-light my-1 otherProfileData"  href="">帳號密碼修改</a>
					<a class="text-light my-1 otherProfileData" href="">所收藏的文章</a>
					<a class="text-light otherProfileData" href="">已發佈的文章</a>
				</div>
			</div>



			<div class="col-9 accontContentMargin">
			<h2 class=" mb-5 font-weight-bolder text-center accountTitle">帳號密碼修改</h2>

				<div class="d-flex align-items-center flex-column bd-highlight mb-3 flexHight">

					<p class="accont">
						<label for="email">電子郵件信箱：</label>
						<span>123456789@gmail.com</span>
						<input type="text" name="email" />
						<input type="image" scr="images/site/筆.png" />
					</p>
					<!--{{step}}-->
					<p>
						<label for="密碼">密碼：</label>
						<input type="password" value="12345">
						<p @click="turnstep">修改密碼</p>
					</p>
				</div>
				<div>

					<form class="align-items-center flex-column p-4 bg-light border changePasswordFlex" :class="[step ? 'd-flex':'d-none']">
						<img src="./images/site/關閉3.png" height="60px" class="close" alt="關閉" @click="turnstep" />
						<h1 class=" font-weight-bold text-center changePasswordColor">更改密碼</h1>
						<div class="form-group">
							<label for="exampleInputPassword1">目前密碼</label>
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">新密碼</label>
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">確認新密碼</label>
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
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