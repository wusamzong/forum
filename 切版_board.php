<?php session_start();
$_SESSION["boardName"] = $_POST["boardName"];
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION["boardName"]; ?></title>
  <meta charset="utf-8">
  <?php require('_css.php') ?>
</head>

<body>
  <div class="container-lg bodySpace">
    <div class="row">
      <div class="col-12">
        <?php if (!isset($_SESSION["userName"])) {
          require("切版_header,登入前.php");
        } else {
          require("切版_header,登入後.php");
        } ?>
      </div>
      <div class="col-xl-3 d-none d-xl-block p-03">
        <?php require("切版_nav.php"); ?>
      </div>

      <?php require("_connect.php");
      $sql = $pdo->prepare('SELECT intro,picture FROM board WHERE name = ?');
      $sql->execute([$_SESSION["boardName"]]);
      $intro = "";
      $picture = "";
      foreach ($sql->fetchAll() as $row) {
        $intro .= $row["intro"];
        $picture = $row["picture"];
      }
      ?>

      <div class="col-xl-9 col-md-12 col-sm-12 pr-0">
        <div class="mx-1 mt-4 row p-2 align-items-end rounded boardBG" style="background-image="<?php echo $picture; ?>">
          <div class="col">
            <p class="display-4 text-light">
            <?php echo $_SESSION["boardName"];?></p>
          </div>
        </div>
        <h3 class="p-1 mx-4 my-2"><?php echo $intro; ?></h3>

        <?php // 查詢自己的帳號的ID
        if (isset($_SESSION["userName"])) {
          $myID = "";
          $sql = $pdo->prepare('SELECT ID FROM account WHERE userName=?');
          $sql->execute([$_SESSION["userName"]]);
          foreach ($sql->fetchAll() as $row) {
          $myID = $row["ID"]; }
        }

        // 查詢看板的ID
        $boardID = 0;
        $sql = $pdo->prepare('SELECT ID FROM board WHERE name=?');
        $sql->execute([$_SESSION["boardName"]]);
        foreach ($sql->fetchAll() as $row) {
        $boardID = $row["ID"]; }
                
        // 讀取article資料表的所有資料，範圍是指定的看板ID
        $sql = $pdo->prepare('SELECT * FROM article WHERE boardID = ? ORDER BY postTime DESC');
        $sql->execute([$boardID]);
        require("切版_article_preview.php"); ?>

      </div>
    </div>
  </div>
  <?php require('_js.php') ?>
</body>

</html>