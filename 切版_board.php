<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <?php require('_css.php') ?>
</head>

<body>
  <div class="container-md" style="margin: 0 10%;">
    <div class="row">
      <div class="col-12">
        <?php require("切版_header.php"); ?>
      </div>
      <div class="col-3">
        <?php require("切版_nav.php"); ?>
      </div>

      <div class="col-9">
        <div class="mx-1 mt-4 row p-2 align-items-end rounded" style="width:100%; height: 200px; background-color: #4899D0;">
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