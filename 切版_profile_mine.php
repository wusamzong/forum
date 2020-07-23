<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>我看我的個人主頁</title>
	<?php require('_css.php') ?>
	<?php require('_js.php') ?>
</head>

<body style="overflow:hidden;">
	<div class="container-md" style="margin: 0 10%; ">
		<div class="row">
			<div class="col-12">
				<?php require("切版_header,登入後.php"); ?>
			</div>
			<div class="col-3" style="height:1000px; background:#4899D0;">
				<div class="d-flex align-items-center flex-column bd-highlight mb-3" style="height:750px;">
					<img src="./images/site/大頭貼2.png" height="200px" alt="個人照片" class="mt-5 ml-4" />
					<h1 class="text-light mt-3 font-weight-bold">暱稱</h1>
					<h5 class="text-light">這是公開的自我介紹</h5>
					<a class="text-light  " style="font-size: 22px ;margin-top:100px;text-decoration: underline; color:#FFFFF;" href="">基本資料修改</a>
					<a class="text-light my-1" style="font-size: 22px;text-decoration: underline;" href="">所收藏的文章</a>
					<a class="text-light " style="font-size: 22px;text-decoration: underline;" href="">已發佈的文章</a>
				</div>
			</div>
			<div class="col-9">
				<?php require("切版_profile_editInfo.php"); ?>
			</div>
		</div>
	</div>
</body>