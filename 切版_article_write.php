<?php session_start(); ?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>新增文章</title>
	<?php require('_css.php') ?>
</head>

<body class="bodySpace articleWriteBody">
	<div class="container-sm" id="app">
		<div class="row d-flex justify-content-center singleScene" >
			<div class="col-xl-12">
				<?php require('切版_header,登入後.php') ?>
			</div>
			<div class="col-xl-11 col-lg-12 shadow border rounded" :class="{articleWriteContentPosition: step}">
				<img src="images/site/上一頁.png" height="70px" alt="返回" @click="back" />
				<form name="article_write" onsubmit="return validateForm()" action="article_save.php" method="post" enctype="multipart/form-data">
					<!--新增文章的第一步-->
					<div class="row mt-4 ml-4 mr-4" :class="{displayNone: !step}">
						<!--選擇發文看板/匿名與否/檢舉icon-->
						<div class="media col-8 fs-22 px-0">

							<?php require("_connect.php");
							// 照片和暱稱
							$sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE userName=?');
							$sql->execute([$_SESSION["userName"]]);
							$photo = "";
							$nickname = "";
							foreach ($sql->fetchAll() as $row) {
								$photo = $row["photo"];
								$nickname = $row["nickname"];
							}

							if ($photo == "default") {
								echo '<img src="images/site/大頭貼_藍底.png" width="70px" class="mr-1" alt="帳戶圖片" />';
							} else {
								echo '<img src="images/' . $row["photo"] . '" width="70px" class="mr-1" alt="帳戶圖片" />';
							} ?>

							<div class="media-body">

								<div class="dropdown">
									<a class="dropdown-toggle m-2 fs-22" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span>名稱</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="#" onclick="hideNameOrNot(0)"><?php echo $nickname; ?></a>
										<a class="dropdown-item" href="#" onclick="hideNameOrNot(1)">匿名</a>
									</div>
									<span id="hide"></span>
									<input type="hidden" name="hideName" />
								</div>

								<div class="dropdown">
									<a class="dropdown-toggle m-2 fs-22" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span>選擇看板</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
										<?php
										$sql = $pdo->prepare('SELECT ID,name FROM board');
										$sql->execute();
										foreach ($sql->fetchAll() as $row) {
											echo '<a class="dropdown-item" href="#" onclick="chooseBoardID(' . $row["ID"] . ')">' . $row["name"] . '</a>';
										} ?>
									</div>
									<span id="board"></span>
									<input type="hidden" name="boardID" />
								</div>

							</div>
						</div>
						<div class="col-2 text-right">
							<img src="images/site/檢舉.png" height="30px" alt="檢舉">
						</div>
						<!--文章的標題/內文-->
						<div class="form-group" :class="{displayNone: !step}">
							<input type="text" name="title" placeholder="標題" maxlength="20" class="form-control titleInputWidth mt-4 mb-2">
							<textarea name="content" placeholder="文章內容" class="form-control articleContentSize" id="content "></textarea>
							<span id="error1"></span>
							<div class="d-flex bd-highlight mb-3">
								<div class="p-2 bd-highlight">
									<p class="btn btn-primary" @click="turnStep">下一步</p>
								</div>
							</div>
						</div>
					</div>
					<!--新增文章的第二步-->
					<div class="row mt-2 ml-xl-4  mr-4 justify-content-center" :class="{displayNone: step}">
						<h1 class="text-primary col-8">選擇標籤</h1>
						<div class="input-group mb-3 tagSearchBar">
							<input type="text" class="form-control" placeholder="標籤" aria-label="Recipient's username" aria-describedby="button-addon2">
							<div class="input-group-append">

								<button class="btn btn-outline-primary" type="button" id="button-addon2">搜尋標籤</button>
							</div>
						</div>
						<!--標籤列表-->
						<div class="border-top border-bottom col-8 tagList">
							<ul class="p-3">
								<?php
								$sql = $pdo->prepare('SELECT * FROM tag');
								$sql->execute();
								foreach ($sql->fetchAll() as $row) {
									echo '<li onclick="chooseTag(' . $row["ID"] . ')"' . ' class="border-bottom p-2 mb-1"' . '># ' . $row['name'] . '</li>';
								} ?>
							</ul>
							<p id="rowCount" class="displayNone">
								<?php echo $sql->rowCount(); ?></p>
						</div>
						<!--被選擇的標籤-->
						<div class="col-8 mt-2">
							<?php
							$sql = $pdo->prepare('SELECT * FROM tag');
							$sql->execute();
							foreach ($sql->fetchAll() as $row) {
								echo '<span id="' . $row['ID'] . '" onclick="deleteTag(' . $row["ID"] . ')"' . ' class="btn btn-secondary ml-2 displayNone">#' . $row['name'] . '<a class="ml-2 text-light">X</a></span>';
							} ?>
							<p id="tagError"></p>
							<input type="hidden" id="tagCount" name="tagCount" />

							<div class="d-flex justify-content-end">
								<input type="submit" value="發佈文章" class="btn btn-primary m-2"></input>
							</div>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script>
		var app = new Vue({
			el: '#app',
			data: {
				step: true,
			},
			methods: {
				turnStep() {
					this.step = !this.step;
				},
				back() {
					if (this.step === true) {
						window.location.href = '切版_index.php'
					} else {
						this.turnStep();
					}
				}
			}
		})
	</script>
	<script>
		let hideName = document.forms["article_write"]["hideName"];
		let hide = document.getElementById("hide");
		let boardID = document.forms["article_write"]["boardID"];
		let board = document.getElementById("board");
		let title = document.forms["article_write"]["title"];
		let content = document.forms["article_write"]["content"];
		let error1 = document.getElementById("error1");

		function hideNameOrNot(i) {
			hideName.value = i;
		}

		function chooseBoardID(i) {
			boardID.value = i;
		}
		// function check() {
		// 	if (hideName == "") {
		// 		hide.innerHTML = "請選擇名稱";
		// 		return false; }
		//     if (boardID == "") {
		// 		board.innerHTML = "請選擇看板";
		// 		return false; }
		//     if (title.value.length == 0) {
		// 		title.placeholder = "請輸入標題";
		// 		return false; }
		//     if (content.value.length == 0) {
		// 		content.placeholder = "請輸入文章內容";
		// 		return false; }
		// 	if (content.value.length == 0) {
		// 		error1.innerHTML = "勿少於15字";
		// 		return false; }
		// 	return true;
		// }
	</script>
	<script>
		// 標籤處理
		// 標籤的個數，所有標籤的瀏覽次數，初始化
		let rowCount = document.getElementById("rowCount");
		let tagsQuantity = rowCount.innerHTML;
		let tagCount = [];
		for (let i = 0; i <= tagsQuantity; i++) {
			tagCount[i] = 0;
		}
		// 選擇與取消
		function chooseTag(ID) {
			tagCount[ID] = 1;
			document.getElementById(ID).style.display = "inline";
			tagTotal();
		}

		function deleteTag(ID) {
			tagCount[ID] = 0;
			document.getElementById(ID).style.display = "none";
			tagTotal();
		}

		function tagTotal() {
			tagCount[0] = 0;
			for (let i = 1; i <= tagsQuantity; i++) {
				tagCount[0] += tagCount[i];
			}
			document.getElementById("tagCount").value = tagCount.join(" ");
		}

		function validateForm() {
			tagTotal();
			if (tagCount[0] < 1) {
				document.getElementById("tagError").innerHTML = "請選擇至少一個標籤" + tagCount[0];
				return false;
			} else {
				document.getElementById("tagError").innerHTML = "";
			}
		}
	</script>
	<?php require('_js.php') ?>
</body>


</html>


<!-- <h1>新增文章</h1> -->