
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <?php require('css.php') ?>
</head>

<body>
<div class="container-md" style="margin: 0 10%;">
  <div class="row">
    <div class="col-12">
      <?php require("_header.php"); ?>
    </div>
    <div class="col-3">
      <?php require("_nav.php"); ?>
    </div>
    <div class="col-9">
      <div style="width:100%; height: 200px; background-color: #565656;">Picture</div>
      <h3>醫療甘苦談</h3>
      <p>關於醫療甘苦談的介紹</p>
      <?php require("article_preview.php"); ?>
    </div>
  </div>
</div>


<div>
    <div>
    <?php
        require("_connect.php");
        $sql = $pdo->prepare('SELECT intro FROM board WHERE ID=?');
        $sql->execute([$_SESSION["board"]]);
        foreach ($sql->fetchAll() as $row) {
            echo '<h1>'.$_SESSION["board"].'</h1>';
            echo '<h2>'.$row["intro"].'</h2>';
        }
    ?>
    </div>

    
</div>
<?php require('js.php') ?>
</body>
</html>