<!DOCTYPE html>
<html>

<head>
    <title>註冊</title>
    <meta charset="utf-8">
    <?php require('_css.php') ?>
</head>

<body style="height:100vh; overflow:hidden;">

    <div class="container-lg">
        <div class="row">
            <div class="col-6 mt-5 d-flex flex-column align-items-center border-right">
                <img src="./images/site/Logo.png" width="250px" alt="醫聯網" />
                <img src="./images/site/login.png" width="750px" alt="圖片" />
                <p>醫聯網的簡介</p>
            </div>

            <div class="col-6 p-5">
                <div class="float-right"><a href="index.php" class="text-right" style="font-size: 25px;">首頁</a></div><br>

                <form class="mt-5 input-group input-group-lg d-flex align-items-center flex-column" name="signup" onsubmit="return validateForm()" action="signup_check.php" method="POST" enctype="multipart/form-data">
                    <!-- 輸入基本資料
                    <div class="hidden mt-5 d-flex align-items-center flex-column">
                        <h1 class="display-2 text-primary">註冊</h1>
                        <input type="text" name="realName" placeholder="真實姓名" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" style="width: 425px; height: 60px; font-size: 28px;" />
                        <p id="realNameError"></p>
                        <input type="text" name="nickname" placeholder="暱稱" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" style="width: 425px; height: 60px; font-size: 28px;" />
                        <p id="nicknameError"></p>
                        <input type="email" name="email" placeholder="電子信箱" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" style="width: 425px; height: 60px; font-size: 28px;" />
                        <p id="emailError"></p>
                        <input type="password" name="password" placeholder="密碼" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" style="width: 425px; height: 60px; font-size: 28px;" />
                        <p id="passwordError"></p>
                        <p>您已經註冊了嗎？<a href="signin.php">現在登入</a></p>
                        <button class="btn btn-primary">下一步</button>
                    </div>
                    -->
                    <div>
                        <a href="#"><img src="./images/site/上一頁.png" height="60px" alt=""> </a>
                        <div class="mt-1 d-flex align-items-center flex-column">
                            <h1 class="display-4 text-primary">選擇喜好</h1>
                            <div class="border rounded bg-light" style="width: 600px; height:450px;">
                                <div class="border mx-auto my-2" style="width: 580px; height: 70px; background:white;">
                                    <div>
                                        <?php require("_connect.php");
                                        $sql = $pdo->prepare('SELECT * FROM tag');
                                        $sql->execute();
                                        foreach ($sql->fetchAll() as $row) {
                                            echo '<span class="badge badge-primary p-2 mt-3 m-1" id="' . $row['ID'] . '" onclick="deleteTag(' . "'" . $row["ID"] . "'" . ')">' . $row['name'] . '</span>';
                                        } ?>
                                        <!-- "X"用偽元素::after製作 -->
                                        <span>至少選三項</span>
                                    </div>
                                </div>
                                <div class="row m-auto border" style="width: 580px; height: 350px; background:white;">
                                    <?php
                                    $sql = $pdo->prepare('SELECT * FROM tag');
                                    $sql->execute();
                                    foreach ($sql->fetchAll() as $row) {
                                        echo '<div class="col-12 m-1 border-bottom" style="font-size:24px;" onclick="chooseTag(' . "'" . $row["ID"] . "'" . ')">#' . $row['name'] . '</div>';
                                    }
                                    ?>
                                    <div class="col">daf;ldjaf;</div>
                                    <div class="col">daf;ldjaf;</div>
                                    <div class="col">daf;ldjaf;</div>
                                    <div class="col">daf;ldjaf;</div>
                                    <p id="tagError"></p>
                                    <input type="hidden" id="tagCount" name="tagCount"/>
                                </div>
                            </div>
                            <input class="btn btn-primary mt-2" type="submit" value="註冊" />
                        </div>



                    </div>


                    <script>
                        // 標籤處理
                        // 標籤的個數，所有標籤的瀏覽次數，初始化
                        let tagsQuantity = document.getElementById("rowCount").innerHTML;
                        let tagCount = [];
                        for (let i = 0; i <= tagsQuantity; i++) {
                            tagCount[i] = 0;
                        }
                        // 選擇與取消
                        function chooseTag(ID) {
                            tagCount[ID] = tagCount[ID] % 10 + 10;
                            document.getElementById(ID).style.display = "inline";
                            tagTotal();
                        }

                        function deleteTag(ID) {
                            tagCount[ID] = tagCount[ID] % 10;
                            document.getElementById(ID).style.display = "none";
                            tagTotal();
                        }

                        function tagTotal() {
                            tagCount[0] = 0;
                            for (let i = 0; i <= tagsQuantity; i++) {
                                tagCount[0] += tagCount[i];
                            }
                            document.getElementById("tagCount").value = tagCount.join(" ");
                        }

                        // 檢查欄位是否皆有填寫
                        function validateForm() {
                            var realName = document.forms["signup"]["realName"].value;
                            if (realName == "") {
                                document.getElementById("realNameError").innerHTML = "請輸入真實姓名";
                                return false;
                            } else {
                                document.getElementById("realNameError").innerHTML = "";
                            }

                            var nickname = document.forms["signup"]["nickname"].value;
                            if (nickname == "") {
                                document.getElementById("nicknameError").innerHTML = "請輸入暱稱";
                                return false;
                            } else {
                                document.getElementById("nicknameError").innerHTML = "";
                            }

                            var email = document.forms["signup"]["email"].value;
                            if (email == "") {
                                document.getElementById("emailError").innerHTML = "請輸入帳號（email）";
                                return false;
                            } else {
                                document.getElementById("emailError").innerHTML = "";
                            }

                            var password = document.forms["signup"]["password"].value;
                            if (password == "") {
                                document.getElementById("passwordError").innerHTML = "請輸入密碼";
                                return false;
                            } else {
                                document.getElementById("passwordError").innerHTML = "";
                            }

                            if (tagCount[0] < 30) {
                                document.getElementById("tagError").innerHTML = "請選擇至少三個標籤";
                                return false;
                            } else {
                                document.getElementById("tagError").innerHTML = "";
                            }
                        }
                    </script>
            </div>
            </form>
        </div>
    </div>




    <?php require('_js.php') ?>

</body>

</html>