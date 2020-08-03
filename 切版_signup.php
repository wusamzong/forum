<!DOCTYPE html>
<html>

<head>
    <title>註冊</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <?php require('_css.php') ?>
</head>

<body class="p-0 m-0 singleScene">

    <div class="container-xl" id="app">
        <div class="row">
            <div class=" col-xl-6 mt-0 dis-flex flex-column align-items-center border-right dispalyNone">
                <img class="d-none d-xl-block mt-5" src="./images/site/Logo.png" width="250px" alt="醫聯網" />
                <img class="d-none d-xl-block" src="./images/site/login.png" width="750px" alt="圖片" />
                <p class="d-none d-xl-block">醫聯網的簡介</p>
            </div>

            <div class="col-12 d-xl-none m-0 p-0 ">
                <?php require('切版_header,登入前.php') ?>
            </div>

            <div class="col-xl-6 col-lg-12 p-0 p-xl-5 mt-xl-5">
                <div class="float-right mr-4"><a href="切版_index.php" class="text-right fs-24">首頁</a></div><br>

                <form class="mt-xl-5 input-group input-group-lg d-flex align-items-center flex-column p-0" name="signup" onsubmit="return validateForm()" action="signup_check.php" method="POST" enctype="multipart/form-data">
                    <!--輸入基本資料-->
                    <div :class="{displayNone: !step}">
                        <div class="mt-5 d-flex align-items-center flex-column">
                            <h1 class="display-2 text-primary">註冊</h1>
                            <input type="text" name="realName" placeholder="真實姓名" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg signInput"  />
                            <p id="realNameError"></p>
                            <input type="text" name="nickname" placeholder="暱稱" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg signInput"  />
                            <p id="nicknameError"></p>
                            <input type="email" name="email" placeholder="電子信箱" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg signInput"  />
                            <p id="emailError"></p>
                            <input type="password" name="password" placeholder="密碼" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg signInput"  />
                            <p id="passwordError"></p>
                            <p>您已經註冊了嗎？<a href="signin.php">現在登入</a></p>
                            <p class="btn btn-primary" @click="turnStep">下一步</p>
                        </div>
                    </div>

                    <!--輸入標籤-->
                    <div :class="{displayNone: step}">
                        <a href="#"><img @click="back" src="./images/site/上一頁.png" height="60px" alt=""> </a>
                        <div class="mt-1 d-flex align-items-center flex-column">
                            <h1 class="display-4 text-primary">選擇喜好</h1>
                            <div class="border rounded bg-light signupTagSelectBG">
                                <div class="border mx-auto my-2 selectedTagBGSize">
                                    <div>
                                        <?php require("_connect.php");
                                        $sql = $pdo->prepare('SELECT * FROM tag');
                                        $sql->execute();
                                        foreach ($sql->fetchAll() as $row) {
                                            echo '<span style="display: none" class="badge badge-primary p-2 mt-3 m-1" id="' . $row['ID'] . '" onclick="deleteTag(' . "'" . $row["ID"] . "'" . ')">' . $row['name'] . ' X</span>';
                                        } ?>
                                        <!-- "X"用偽元素::after製作 -->
                                        <span class="float-right">至少選三項</span>
                                    </div>
                                </div>
                                <div class="m-auto border SignUpTagListSize">
                                    <p id="rowCount" style="display: none;"><?php echo $sql->rowCount(); ?></p>
                                    <?php

                                    $sql = $pdo->prepare('SELECT * FROM tag');
                                    $sql->execute();
                                    foreach ($sql->fetchAll() as $row) {
                                        echo '<div class="m-1 pl-2 border-bottom" style="font-size:24px;" onclick="chooseTag(' . "'" . $row["ID"] . "'" . ')">#' . $row['name'] . '</div>';
                                    }
                                    ?>
                                    <p id="tagError"></p>
                                    <input type="hidden" id="tagCount" name="tagCount" />
                                </div>
                            </div>
                            <input class="btn btn-primary mt-2" type="submit" value="註冊" />
                        </div>
                    </div>
            </div>
            </form>
        </div>

    </div>

</body>
<?php require('_js.php') ?>
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
        tagCount[ID] = 10;
        document.getElementById(ID).style.display = "inline";
        tagTotal();
    }

    function deleteTag(ID) {
        tagCount[ID] = 0;
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
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {

            step: true,
        },
        methods: {
            turnStep() {
                this.step = !this.step;
            },
            back() {
                if (this.step === true) {
                    window.location.href = '切版_index.php'
                } else {
                    this.turnStep();
                }
            }

        }
    })
</script>
<style>
    .displayNone {
        display: none;
    }
</style>

</html>