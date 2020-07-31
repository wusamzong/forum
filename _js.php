<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
var clicked = 'none';
var hb_clicked = 'none'; //hamburger-menu-icon
var sc_clicked = 'none'; //searchIcon
$(document).ready(function() {
  $("#side-nav").addClass("d-none");
  $("#searchBar").addClass("d-none");
  $("#hamburger-menu").click(function() {
    if(clicked === 'none'){
      $("#side-nav").removeClass("d-none");
      clicked = 'block';
    }else{
      $("#side-nav").addClass("d-none");
      clicked = 'none';
      
      $(document).ready(function() {
        $("#side-nav").addClass("d-none");
        $("#searchBar").addClass("d-none");
        $("#hamburger-menu").click(function() {
          if(hb_clicked === 'none'){
            $("#side-nav").removeClass("d-none");
            hb_clicked = 'block';
          }else{
            $("#side-nav").addClass("d-none");
            hb_clicked = 'none';
          }
        });
        $("#searchIcon").click(function() {
          if(sc_clicked === 'none'){
            $("#searchBar").removeClass("d-none");
            sc_clicked = 'block';
          }else{
            $("#searchBar").addClass("d-none");
            sc_clicked = 'none';
          }
        });
      });
    }
  });
});
</script>

<script>
function keepArticle(myID,id) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let k = "keep"+id;
            let keep = document.getElementById(k);
            // 按下圖示後收藏此文章就切換成實心圖示
            // 按下圖示後取消收藏此文章就切換成空心圖示
            if (this.responseText == "1") {
                keep.src = "images/site/書籤2.png";
            } else {
                keep.src = "images/site/書籤.png";
            }
        }
    };
    xhttp.open("GET", "article_keep.php?myID="+myID+"&ID="+id, true);
    xhttp.send();
}

function followUser(myID,userID) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let follow = document.getElementById("follow");
            // 按下圖示後收藏此文章就切換成實心圖示
            // 按下圖示後取消收藏此文章就切換成空心圖示
            if (this.responseText == "1") {
                follow.innerHTML = "取消追蹤";
            } else {
                follow.innerHTML = "追蹤用戶";
            }
        }
    };
    xhttp.open("GET", "user_follow.php?myID="+myID+"&followUserID="+userID, true);
    xhttp.send();
}
</script>