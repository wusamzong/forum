<!-- 左側導覽列 -->
<nav>
<!-- 看板選單 -->
<div>
    <a href="https://expert.med-net.com/index#/index">病痛Q&A</a>
    
    <?php
    require("connect.php");
    $sql = $pdo->prepare('SELECT ID,name FROM board');
    $sql->execute();
    foreach ($sql->fetchAll() as $row) {
        echo '<a href="board.php" onclick="chooseBoard('."'".$row["ID"]."'".')">'.$row["name"].'</a>';
    }
    ?>
    <script>
        function chooseBoard(ID) {
            sessionStorage.setItem("board", ID);
        }
    </script>
</div>

<!-- 推薦文章 -->
<div>
    <p>為你推薦</p>
    <a href="">推薦的文章標題</a>
    <a href="">Author</a>
    <span>2 hours ago</span>
    <a href="">推薦的文章標題</a>
    <a href="">Author</a>
    <span>2 hours ago</span>
    <a href="">推薦的文章標題</a>
    <a href="">Author</a>
    <span>2 hours ago</span>
    <a href="">推薦的文章標題</a>
    <a href="">Author</a>
    <span>2 hours ago</span>
</div>

<!-- 其他連結 -->
<div>
    <a href="">關於我們</a>
    <a href="">最新消息</a>
    <a href="">人才招募</a>
    <a href="">免責聲明</a>
    <a href="">業務合作</a>
    <a href="">客服中心</a>
</div>
</nav>