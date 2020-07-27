<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>別人看我的個人主頁</title>
    <?php require('_css.php') ?>
    <?php require('_js.php') ?>
</head>

<body>

    <div class="container-md bodyMargin">
        <div class="row">
            <div class="col-12">
                <?php require("切版_header,登入後.php"); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt-4 homePageBg">

                <div class="row">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="col-4">
                            <img src="./images/site/大頭貼2.png" height="150px" alt="個人照片" class="mt-2 ml-4" />
                        </div>
                        <div class="col-4 nickname">
                            <h1>暱稱</h1>
                        </div>

                        <div class="col-4 followCol">
                        <button  type="button" class="btn btn-primary followButton">追蹤</button>

                        </div>
                    </div>
                </div>
                <h3  class="ml-5 mt-2 otherSelfIntroduction">對方的自我介紹</h3>
                <div class="mt-5">
                    <?php require("profile_writtenArticle.php"); ?>
                </div>


            </div>




        </div>
    </div>

</body>