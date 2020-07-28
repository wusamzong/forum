<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>別人看我的個人主頁</title>
    <?php require('_css.php') ?>
    <?php require('_js.php') ?>
</head>

<body>

    <div class="container-md" style="margin: 0 10%;">
        <div class="row">
            <div class="col-12">
                <?php require("切版_header,登入後.php"); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?php require("切版_nav.php"); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt-4" style="height:250px; background:#4899D0;">

                <div class="row">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="col-4">
                            <img src="./images/site/大頭貼2.png" height="150px" alt="個人照片" class="mt-2 ml-4" />
                        </div>
                        <div class="col-4 " style="margin-top:60px ;margin-left:60px ;">
                            <h1>暱稱</h1>
                        </div>

                        <div class="col-4 " style="margin-top:70px ; margin-left:-55px ;">
                        <button style=" background: #1D2D44; border: #1D2D44;" type="button" class="btn btn-primary">追蹤</button>

                        </div>
                    </div>
                </div>
                <h3 style="color:#FFFFFF;" class="ml-5 mt-2">對方的自我介紹</h3>
                <div class="mt-5">
                    <?php require("profile_writtenArticle.php"); ?>
                </div>


            </div>




        </div>
    </div>

</body>