<nav>
	<img src="" alt="個人照片"/>
	<h1>暱稱</h1>
	<h3>這是公開的自我介紹</h3>
	<p>基本資料修改</p>
	<p>所收藏的文章</p>
	<p>已發佈的文章</p>
</nav>

<div>
	<div><?php require("profile_info.php"); ?></div>
	<div><?php
	require("profile_keptArticle.php"); ?></div>
	<div><?php require("profile_writtenArticle.php"); ?></div>
</div>