<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文章內容</title>
  <?php require('_css.php') ?>
</head>

<body class="bodySpace">
  <div class="container-xl">
    <div class="row">
      <div class="col-12 p-0">
        <?php require("切版_header,登入後.php"); ?>
      </div>
      <div class="col-3 d-none d-xl-block">
        <?php require("切版_nav.php"); ?>
      </div>
      <div class="col-xl-9 col-lg-12 mt-4">
        <div class="border bg-white shadow rounded p-3">
          <div class="row mt-4 ml-4 mr-4">

            <!--文章的基本資料-->
            <div class="media col-6">
              <img src="./images/site/大頭貼.png" width="60px" class="mr-1" alt="帳戶圖片">
              <div class="media-body">
                <p class="mt-0 mb-1">作者 <a href="#" class="badge badge-dark">追蹤</a></p>
                <p class="m-0">XXXXXX看板</p>
              </div>
            </div>
            <div class="col-6 text-right">
              <img src="./images/site/關閉.png" height="60px" alt="">
            </div>
          </div>
          <!--內文/標籤-->
          <div class=" border-top border-bottom my-3 px-4">
            <p class="my-1" style="white-space:pre-wrap;">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu sagittis eros, non volutpat risus. Aliquam at metus ut mi semper maximus vitae in magna. Donec faucibus sem non sodales molestie. Suspendisse elit odio, suscipit a porta id, pellentesque eget libero. Nulla varius ex ac blandit cursus. Donec ultrices varius aliquam. Suspendisse dolor enim, blandit ac placerat in, molestie sit amet dui. Praesent tristique tincidunt augue, a tincidunt quam mattis nec. Integer arcu libero, iaculis vel mauris vitae, posuere ullamcorper enim. Nunc nec posuere ligula. Phasellus ornare, metus vel hendrerit laoreet, augue nulla aliquet turpis, sit amet ultrices nibh nunc egestas felis. Aliquam quis justo elementum, consectetur augue vitae, tempor ipsum. Duis risus diam, vulputate at enim sed, commodo interdum dolor. Vivamus dictum nulla nisi, porttitor semper enim dictum at.

              In vel elit et erat sodales molestie. Vivamus et ante pellentesque, semper tortor ut, lobortis nulla. Aliquam turpis nibh, scelerisque a metus id, commodo laoreet lorem. Nulla vitae sapien ac velit tincidunt ultricies et imperdiet augue. Donec a arcu interdum, facilisis dui non, pulvinar eros. Pellentesque in ante molestie, vestibulum diam in, pellentesque lectus. Sed semper porttitor felis sed volutpat. Phasellus id finibus nisl. Vivamus nunc purus, vehicula at metus vel, tincidunt vestibulum tellus.

              Aenean eget condimentum massa. Maecenas a dictum nulla. Nam vulputate metus sed fringilla congue. Nullam et vehicula eros, at dapibus orci. Morbi tempus dolor eget nibh ultricies iaculis. Donec quam diam, dignissim ac pellentesque interdum, tincidunt fermentum libero. Cras nec elit nisi.

              Sed porta, nunc at imperdiet pharetra, felis elit vehicula mi, vitae posuere lorem neque sed lectus. Phasellus fermentum nisl vitae imperdiet varius. Proin fringilla, leo at tempor viverra, metus mi pulvinar nunc, vel congue metus magna eu dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum elementum turpis vel rutrum cursus. Pellentesque dolor ligula, mollis vitae sollicitudin id, molestie quis purus. Pellentesque sagittis tempor orci. Vestibulum venenatis urna gravida est posuere sodales ut nec nisl. Suspendisse potenti. Nunc rhoncus quam tellus, at efficitur sapien elementum a. Nulla mollis ex erat. Donec arcu est, facilisis sit amet lorem ut, ultrices consectetur nisi. Duis nisl sapien, consectetur eu egestas sed, congue at orci. Duis id lorem in erat euismod ultricies. Curabitur viverra lorem ac mattis faucibus. Duis vel tortor ac lectus gravida pellentesque.

              Proin purus leo, feugiat nec sapien venenatis, dapibus fringilla odio. Nam et tincidunt nisi. Sed vel tellus eu est rutrum tempus ut sit amet orci. Praesent sollicitudin molestie libero, ac maximus lectus tempor lobortis. Vestibulum a eleifend velit, id dictum nisl. Proin dignissim libero neque, nec dignissim dui tincidunt ut. Nulla nec libero eu magna tempus tristique. Aliquam non interdum eros, in lacinia enim. Mauris arcu quam, eleifend nec rutrum et, egestas at eros. Cras cursus commodo ornare.
            </p>
            <div class="my-1">
              <a href="#" class="badge badge-primary">#標籤1</a><a href="#" class="badge badge-primary ml-2">#標籤2</a>
            </div>
          </div>
          <!--數據/檢舉-->
          <div class="row m-3">
            <div class="col-6">
              <img src="./images/site/讚.png" height="40px" class="" alt="按讚" />
              <span class="mr-3">12</span>
              <img src="./images/site/對話框.png" height="40px" class="" alt="評論" />
              <span class="mr-3">63</span>
              <img src="./images/site/書籤.png" height="30px" class="" alt="收藏文章" />
              <span class="ml-4">2 hours ago</span>
            </div>
            <div class="col-6 text-right">
              <img src="./images/site/檢舉.png" height="40px" class="" alt="檢舉" />
            </div>
          </div>

          <!--留言功能-->
          <div class="media m-3 mt-4">
            <img src="./images/site/大頭貼.png" width="60px" class="my-1" alt="帳戶圖片" />
            <div class="media-body ml-2">
              <p class="mt-0 mb-1">使用者名稱</p>
              <form method="post" action="save.php" enctype="multipart/form-data">
                <input type="hidden" name="ID" />
                <input type="hidden" name="articleID" />
                <input type="hidden" name="authorID" />
                <div class="form-group">
                  <label>留言</label>
                  <textarea class="form-control messageTextareaSize" id="" name="conent "></textarea>
                  <button type="submit" class="btn btn-primary">送出</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!---->
        <div>
          <?php require("切版_reply.php") ?>
        </div>

      </div>
    </div>
  </div>
  </div>
  <?php require('_js.php') ?>
</body>

</html>