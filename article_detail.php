<div>
    <button><img src="" alt="返回"/></button>

    <div>
        <a href=""><img src="" alt="帳戶圖片""/>name</a>
        <span>看板</span>
        <button>追蹤</button>
        <h2>Title</h2>
        <p>ContentContentContentContentContent</p>

        <span>標籤一</span>
        <span>標籤二</span>
        <img src="" onclick="" alt="按讚"/>
        <span>12</span>
        <img src="" onclick="" alt="評論"/>
        <span>63</span>
        <img src="" onclick="" alt="收藏文章"/>
        <span>2 hours ago</span>
        <button><img src="" alt="檢舉"/></button>

        <span><img src="" alt="帳戶圖片"/>name</span>
        <form method="post" action="save.php" enctype="multipart/form-data">
            <input type="hidden" name="ID"/>
            <input type="hidden" name="articleID"/>
            <input type="hidden" name="authorID"/>
            <label>留言：</label>
            <input type="text" name="content"/>
            <input type="submit" value=""/>
        </form>
    </div>

    <div>
        <?php require("reply.php") ?>
    <div>
</div>