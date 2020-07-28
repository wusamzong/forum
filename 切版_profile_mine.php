<?php session_start(); ?>
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
				<?php require("切版_profile_nav.php"); ?>
			</div>
			<div class="col-9">
				<?php require("切版_profile_info.php"); ?>
			</div>
		</div>
	</div>
</body>