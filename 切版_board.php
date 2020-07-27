<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <?php require('_css.php') ?>
</head>

<body class="bodySpace">
  <div class="container-xl">
    <div class="row">
      <div class="col-12 p-0">
        <?php require("切版_header,登入前.php"); ?>
      </div>
      <div class="col-xl-3 d-none d-xl-block p-0">
        <?php require("切版_nav.php"); ?>
      </div>

      <div class="col-xl-9 col-md-12 col-sm-12 pr-0">
        <div class="mx-1 mt-4 row p-2 align-items-end rounded boardBG">
          <div class="col">
            <p class="display-4 text-light">醫療甘苦談</p>
          </div>
        </div>
        <h3 class="p-1 mx-4 my-2">關於醫療甘苦談的介紹</h3>
        <?php require("article_preview.php"); ?>

      </div>
    </div>
  </div>
  <?php require('_js.php') ?>
</body>

</html>