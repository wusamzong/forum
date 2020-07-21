<?php session_start(); ?>
<button><img src="" alt="返回"/></button>

<div>
	<form name="article_write" onsubmit="return validateForm()" action="article_save.php" method="post" enctype="multipart/form-data">
	<div>
		<?php
		// 照片和暱稱
		require("_connect.php");
        $sql = $pdo->prepare('SELECT nickname,photo FROM account WHERE userName=?');
        $sql->execute([$_SESSION["userName"]]);
        foreach ($sql->fetchAll() as $row) {
			echo '<img src="images/'.$row["photo"].'" alt="個人照片"/>';
			echo '<select name="hideName" onfocusout="nextStep()">';
			echo '<option value="0" selected>'.$row["nickname"].'</option>';
			echo '<option value="1">匿名</option>';
			echo '</select>';
		}
		?>

		<!-- 看板清單 -->
		<select name="boardID" onfocusout="nextStep()">
		<?php
		$sql = $pdo->prepare('SELECT ID,name FROM board');
        $sql->execute();
        foreach ($sql->fetchAll() as $row) {
			echo '<option value="'.$row["ID"].'">'.$row["name"].'</option>';
		}
		?>
		</select>

		<!-- 板規、標題、內容 -->
		<a href=""><img src="" alt="板規"/></a>
		<input type="text" name="title" placeholder="標題，字數上限為二十字" onfocusout="nextStep()"/>
		<p id="titleError"></p>
		<textarea name="content" placeholder="內容，至少十五字，至多五千字" onfocusout="nextStep()"></textarea>
		<p id="contentError"></p>
	</div>

	<div>
		<h2># 選擇標籤</h2>
		<!-- <input type="search" placeholder="至少選一個"/> -->
		<!-- <button><img src="" alt="搜尋"/></button> -->
		<p id="rowCount"><?php echo $sql->rowCount(); ?></p>
		<ul>
			<?php
			$sql = $pdo->prepare('SELECT * FROM tag');
            $sql->execute();
            foreach ($sql->fetchAll() as $row) {
                echo '<li onclick="chooseTag('."'".$row["ID"]."'".')">'.$row['name'].'</li>';
            }?>
			<!-- "#"用偽元素::before製作 -->
		</ul>
		
		<div>
            <?php
            $sql = $pdo->prepare('SELECT * FROM tag');
            $sql->execute();
            foreach ($sql->fetchAll() as $row) {
                echo '<span id="'.$row['ID'].'" onclick="deleteTag('."'".$row["ID"]."'".')">'.$row['name'].'</span>';
            }?>
            <!-- "X"用偽元素::after製作 -->
			<input type="text" id="tagCount" name="tagCount"/>
        </div>
	</div>

	<div>
		<button id="nextStep" disabled>下一步</button>
		<input type="submit" value="發佈"/>

		<script>
            // 標籤處理
            // 標籤的個數，所有標籤的瀏覽次數，初始化
            let tagsQuantity = document.getElementById("rowCount").innerHTML;
            let tagCount = [];
            for (let i=0; i<=tagsQuantity; i++) { tagCount[i] = 0; }
            // 選擇與取消
            function chooseTag(ID) {
                tagCount[ID]  = tagCount[ID]%1 +1;
                document.getElementById(ID).style.display = "inline";
                tagTotal();
            }
            function deleteTag(ID) {
                tagCount[ID]  = tagCount[ID]%1;
                document.getElementById(ID).style.display = "none";
                tagTotal();
            }
            function tagTotal() {
                tagCount[0] = 0;
                for (let i=0; i<=tagsQuantity; i++) {
                    tagCount[0] += tagCount[i];
                }
                document.getElementById("tagCount").value = tagCount.join(" ");
            }

            // 檢查欄位是否皆有填寫
			function nextStep() {
				var go = true;
				var hideName = document.forms["article_write"]["hideName"].value;
                if (hideName == "") { go = false; }

                var boardID = document.forms["article_write"]["boardID"].value;
                if (boardID == "") { go = false; }

                var title = document.forms["article_write"]["title"].value;
                if (title.length == 0) {
                    document.getElementById("titleError").innerHTML = "請輸入標題";
                    go = false;
                }
				if (title.length > 20) {
					document.getElementById("titleError").innerHTML = "勿超過20字";
                    go = false;
				}

                var content = document.forms["article_write"]["content"].value;
                if (content.length < 15) {
                    document.getElementById("contentError").innerHTML = "字數需大於15字";
                    go = false;
                }
				if (content.length > 5000) {
					document.getElementById("contentError").innerHTML = "字數需小於5000字";
                    go = false;
				}

				if (go == true) { document.getElementById("nextStep").disabled = false; }
			}

            function validateForm() {
                if (tagCount[0] < 30) {
                    document.getElementById("tagError").innerHTML = "請選擇至少三個標籤";
                    return false;
                } else { document.getElementById("tagError").innerHTML = ""; }
            }
            </script>
	</div>
	</form>
</div<