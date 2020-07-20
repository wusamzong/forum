<div class="list-group mt-4">


    <a class="list-group-item list-group-item-action" href="https://expert.med-net.com/inde">病痛Q&A</a>
    <?php
    require("connect.php");
    $sql = $pdo->prepare('SELECT ID,name FROM board');
    $sql->execute();
    foreach ($sql->fetchAll() as $row) {
        echo '<a class="list-group-item list-group-item-action" href="board.php" onclick="chooseBoard(' . "'" . $row["ID"] . "'" . ')">' . $row["name"] . '</a>';
    }
    ?>
    </ul>


    <script>
        function chooseBoard(ID) {
            sessionStorage.setItem("board", ID);
        }
    </script>
</div>

<!-- 推薦文章 -->
<div class="border mg-2 rounded mt-4">

    <blockquote class="blockquote text-center">
        <p class="mt-2 mb-0 h5">為你推薦</p>
    </blockquote>
    <div class="row mx-1 my-1">
        <div class="col-12"><a href="">推薦的文章標題</a></div>
        <div class="col-12 row justify-content-between">
            <div class="col-3"><a href="">Author</a></div>
            <div class="col-5">2 hours ago</div>
        </div>
        
    </div>
    <div class="row mx-1 my-1">
        <div class="col-12"><a href="">推薦的文章標題</a></div>
        <div class="col-12 row justify-content-between">
            <div class="col-3"><a href="">Author</a></div>
            <div class="col-5">2 hours ago</div>
        </div>
    </div>
    <div class="row mx-1 my-1">
        <div class="col-12"><a href="">推薦的文章標題</a></div>
        <div class="col-12 row justify-content-between">
            <div class="col-3"><a href="">Author</a></div>
            <div class="col-5">2 hours ago</div>
        </div>
    </div>

</div>

<!-- 其他連結 -->
<div class="mx-4 mt-4">
    <div class="row">
        <div class="col"><a href="">關於我們</a></div>
        <div class="col"><a href="">最新消息</a></div>
    </div>
    <div class="row">
        <div class="col"><a href="">人才招募</a></div>
        <div class="col"><a href="">免責聲明</a></div>
    </div>
    <div class="row">
        <div class="col"><a href="">業務合作</a></div>
        <div class="col"><a href="">客服中心</a></div>
    </div>
</div>