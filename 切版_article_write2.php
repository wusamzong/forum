<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新增文章</title>
	<?php require('_css.php') ?>
	<?php require('_js.php') ?>
</head>

<body style="overflow:hidden;">
	<div class="container-md" style="margin: 0 10%; ">
		<div class="row">
			<div class="col-12 ">
				<?php require("切版_header,登入後.php"); ?>
			</div>
			<div class="col-2 pr-2" >
				<button><img src="" alt="返回" /></button>


			</div>
			<div class="col-10">
				<!-- <h1>新增文章</h1> -->

				<div>
					<form method="post" action="save.php" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="ID" value="" />
							<input type="hidden" name="authorID" value="" />
							<img src="" alt="個人照片" />
							<select name="hideName">
								<option value="0">name</option>
								<option value="1">匿名</option>
							</select>
							<select name="boardID">
								<option value="">醫療甘苦談</option>
								<option value="">健康檢查</option>
								<option value="">醫療議題</option>
								<option value="">飲食控制</option>
							</select>
							<a href=""><img src="" alt="板規" /></a>
							<input type="text" name="title" />
							<textarea name="content"></textarea>
						</div>
						<div>
							<h2># 選擇標籤</h2>
							<input type="search" />
							<button><img src="" alt="搜尋" /></button>
							<ul>
								<li>心情</li>
								<li>腦袋有問題</li>
								<li>心情很不好</li>
								<li>護理師心累</li>
								<li>健檢問題</li>
								<li>醫生很帥</li>
							</ul>
							<button>問題</button>
							<button>腦袋</button>
						</div>
						<div>
							<img src="" alt="第一步驟" />
							<img src="" alt="第二步驟" />
							<img src="" alt="第三步驟" />
							<button>下一步</button>
							<input type="submit" value="發佈" />
						</div>
					</form>
				</div>


			</div>





		</div>
	</div>

</body>