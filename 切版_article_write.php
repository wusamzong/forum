<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新增文章</title>
	<?php require('_css.php') ?>
</head>

<body class="container-lg" style="height:100vh; margin: 0 10%; overflow:hidden;">
	<div class="row justify-content-center">
		<div class="col-12">
			<?php require('切版_header,登入後.php') ?>
		</div>
		<div class="col-11 shadow border rounded">
			<a href="#"><img src="./images/site/上一頁.png" height="70px" alt="返回" /></a>
			<form method="post" action="save.php" enctype="multipart/form-data">
				<!--新增文章的第一步-->
				<div class="row mt-4 ml-4 mr-4" >
					<!--選擇發文看板/匿名與否/檢舉icon-->
					<div class="media col-6">
						<img src="./images/site/大頭貼.png" width="60px" class="mr-1" alt="帳戶圖片">
						<div class="media-body">

							<div class="dropdown">
								<a style="font-size:22px;" class="dropdown-toggle m-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span>Name</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="#">Name</a>
									<a class="dropdown-item" href="#">匿名</a>
								</div>
							</div>

							<div class="dropdown">
								<a style="font-size:22px;" class="dropdown-toggle m-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span>選擇看板</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="#">醫療甘苦談</a>
									<a class="dropdown-item" href="#">健康檢查</a>
									<a class="dropdown-item" href="#">醫療議題</a>
									<a class="dropdown-item" href="#">飲食控制</a>
								</div>
							</div>

						</div>
					</div>
					<div class="col-6 text-right">
						<img src="./images/site/檢舉.png" height="50px" alt="">
					</div>
					<!--文章的標題/內文-->
					<div class="form-group">
						<input type="hidden" name="ID" value="" />
						<input type="hidden" name="authorID" value="" />
						<input class="form-control form-control-lg w-75 mt-4" type="text" placeholder="標題">
						<label for="content">文章內容</label>
						<textarea class="form-control" id="content" style="height: 400px; width: 1080px;"></textarea>
						<div class="d-flex bd-highlight mb-3">
							<div class="mr-auto p-2 bd-highlight">
								<img height="50px" src="./images/site/已完成.png" alt="第一步驟" />
								<img height="50px" src="./images/site/未完成.png" alt="第二步驟" />
								<img height="50px" src="./images/site/未完成.png" alt="第三步驟" />
							</div>
							<div class="p-2 bd-highlight"><button class="btn btn-primary">下一步</button></div>
						</div>
					</div>
				</div>
				<!--新增文章的第二步-->
				<div class="row mt-2 ml-4 mr-4 justify-content-center" style="display: none;">
					<h1 class="display-2 text-primary col-8">選擇標籤</h1>
					<div class="input-group mb-3" style="width:63%">
						<input type="text" class="form-control" style="height:50px;" placeholder="標籤" aria-label="Recipient's username" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-primary" type="button" id="button-addon2">搜尋標籤</button>
						</div>
					</div>

					<div style="width: 1080px; height: 360px; overflow: auto;" class="border-top border-bottom col-8">
						<ul style="list-style: none; font-size: 26px;" class="p-3">
							<li class="border-bottom p-2 mb-1"># 心情</li>
							<li class="border-bottom p-2 mb-1"># 腦袋有問題</li>
							<li class="border-bottom p-2 mb-1"># 心情很不好</li>
							<li class="border-bottom p-2 mb-1"># 護理師心累</li>
							<li class="border-bottom p-2 mb-1"># 健檢問題</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
							<li class="border-bottom p-2 mb-1"># 醫生很帥</li>
						</ul>
					</div>
					<div class="col-8 mt-2">
						<span class="btn btn-secondary">#腦袋有問題<a href="#" class="ml-2 text-light">X</a></span>
						<span class="btn btn-secondary">#腦袋有問題<a href="#" class="ml-2 text-light">X</a></span>
						<span class="btn btn-secondary">#腦袋有問題<a href="#" class="ml-2 text-light">X</a></span>
						<span class="btn btn-secondary">#腦袋有問題<a href="#" class="ml-2 text-light">X</a></span>
						<span class="btn btn-secondary">#腦袋有問題<a href="#" class="ml-2 text-light">X</a></span>

							<div class="d-flex justify-content-end">
								<img class="p-1 m-1" height="65px" src="./images/site/已完成.png" alt="第一步驟" />
								<img class="p-1 m-1" height="65px" src="./images/site/已完成.png" alt="第二步驟" />
								<img class="p-1 m-1" height="65px" src="./images/site/未完成.png" alt="第三步驟" />
								<button class="btn btn-primary m-2">發佈文章</button>
							</div>
						</div>

					</div>

			</form>
		</div>
	</div>

	<?php require('_js.php') ?>
</body>

</html>


<!-- <h1>新增文章</h1> -->