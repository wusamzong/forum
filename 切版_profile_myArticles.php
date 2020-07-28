<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我看我的個人主頁</title>
    <?php require('_css.php') ?>
    <?php require('_js.php') ?>
</head>

<body>
<div class="container-md bodyMargin" >
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
            <div class="col-9">
                <div class="d-flex align-items-center flex-column bd-highlight mb-3 flexHight"> 
                    <h1 class="mt-5 p-4 font-weight-bolder titleColor">已發佈的文章</h1>

                    <?php require("切版_myarticles_article_preview.php"); ?>
                </div>
            </div>
        </div>
</body>