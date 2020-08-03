<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
  body {

    font-family: '微軟正黑體';
  }

  .articalContentPreview {
    width: 80%;
    height: 200px;
    overflow: hidden;

  }

  /** article_write */
  .singleScene {
    /**Signin/Signup/article_write */
    width: 100vw;
    height: 100vh;
    overflow: hidden;
  }

  .fs-22 {
    /* font-size*/
    font-size: 22px;
  }

  .titleInputWidth {
    width: 70vw !important;
  }

  .articleContentSize {
    height: 400px !important;
    width: 70vw !important;
  }
  .articleWriteContentPosition{
    position: relative;
    top: -50px;
  }

  .tagSearchBar {
    width: 70% !important;
  }

  .tagSearchBar input {
    height: 50px;
  }

  .tagList {
    width: 1080px;
    height: 360px;
    overflow: auto;
  }

  .tagList ul {
    list-style: none;
    font-size: 26px;
  }

  .displayNone {
    /** signup/article_write */
    display: none;
  }

  /** board */
  .boardBG {
    /*board background */
    width: 100%;
    height: 200px;
    background-color: gray;
  }


  /** header */
  .space {
    height: 65px;

  }

  .hamburgerMenu {
    z-index: 3;
    width: 75%;
    height: 90vh;
    position: absolute;
    overflow-y: auto;
  }

  .cursorPointer {
    cursor: pointer;
  }

  .fs-24 {
    font-size: 24px;
  }

  .fs-16 {
    font-size: 16px;
  }

  .articleWriteButton {
    z-index: 2;
    position: fixed;
    right: 50px;
    bottom: 50px;
    border-radius: 50px;
    filter: drop-shadow(0 5px 5px rgba(0, 0, 0, 0.3))
  }
  

  .searchInputSize {
    width: 80% !important;
    height: 30px;
  }

  /** Sign in */
  .signInput {
    width: 435px !important;
    height: 60px;
    font-size: 28px;
  }

  /** Sign up */
  .dis-flex {
    display: flex;
  }

  .signupTagSelectBG {
    /**註冊時選擇Tag的背景 */
    width: 600px;
    height: 450px;
  }

  .selectedTagBGSize {
    /**註冊時，顯示已選擇的Tag的框 */
    width: 580px;
    height: 70px;
    background: white;
  }

  .SignUpTagListSize {
    width: 580px;
    height: 350px;
    background: white;
    overflow-x: auto;
  }

  /** profile_mine */

  /**相同的部分*/
  .bodyOverflow {
    overflow: hidden;
  }

  .bodyMargin {
    margin: 0 10%;
  }

  .leftNavigationBar {
    height: 1000px;
    background: #4899D0;
  }

  .leftNavigationFlex {
    height: 750px;
  }

  .basicInformation {
    font-size: 22px;
    margin-top: 100px;
    text-decoration: underline;
  }

  .otherProfileData {
    font-size: 22px;
    text-decoration: underline;
  }

  /**相同的部分*/

  /**profile_editInfo */

  .flexHight {
    height: 700px;
  }

  .titleColor {
    color: #1D2D44;
  }

  .editInfoContentPadding {
    /*padding-left: 6vw;*/
  }

  .uploadHeaderButton {
    /*margin-left: 10vw;*/
    background: #1F81C4;
    border: #1F81C4;
  }

  .trueName {
    font-size: 20px;
    margin-top: 20px;
  }

  .nickname_Selfintroduction {
    font-size: 20px;
  }

  /**profile_keptArticles */
  .flexHight {
    height: 700px;
  }

  .titleColor {
    color: #1D2D44;
  }

  /**profile_myArticles */

  .flexHight {
    height: 700px;
  }

  .titleColor {
    color: #1D2D44;
  }

  /**myarticles_article_preview */
  .trashCan {
    margin-left: 280px;
    margin-top: -5px;
  }

  /**帳密_profile_editInfo copy */
  .accontContentMargin {
    margin-top: 300px;
  }

  .accountTitle {
    color: #1D2D44;
    margin-top: -150;
  }

  .flexHight {
    height: 700px;
  }

  .accont {
    font-size: 20px;
  }

  .passwordFlex {
    width: 40vw;
    position: absolute;
    top: -250px;
    right: 70px;
  }

  .changePasswordFlex {
    width: 40vw;
    position: absolute;
    top: -250px;
    right: 70px;
  }

  .close {
    margin-left: 30vw;
  }

  .changePasswordColor {
    color: #1D2D44;
  }

  /**profile_others*/
  .bodyMargin {
    margin: 0 10%;
  }

  .homePageBg {
    height: 250px;
    background: #4899D0;
  }

  .nickname {
    margin-top: 60px;
    margin-left: 60px;
    color: #FFFFFF;
  }

  .followCol {
    margin-top: 70px;
    margin-left: -55px;
  }

  .followButton {
    background: #1D2D44;
    border: #1D2D44;
  }

  .otherSelfIntroduction {
    color: #FFFFFF;
  }

  @media screen and (min-width: 1200px) {
    .bodySpace {
      margin: 0 7%;

    }
  }

  @media (max-width: 1200px) {
    .bodyMargin {
      margin: 0;
    }

    .titleInputWidth {
      width: 80vw !important;
    }

    .articleContentSize {
      height: 200px !important;
      width: 80vw !important;
    }

    .tagSearchBar {
      width: 80% !important;
    }

    .tagSearchBar input {
      height: 50px;
    }

    body {
      width: 93%;
    }

    .articleWriteBody{
      width: 110%;
    }

    .articleDetailBody {
      width: 100%;
    }
    .signInput {
      width: 80vw !important;

    }
    .signupTagSelectBG {
      /**註冊時選擇Tag的背景 */
      width: 95vw;
      height: 50vh;
    }
    .selectedTagBGSize {
    /**註冊時，顯示已選擇的Tag的框 */
    width: 90vw;
    height: 50px;
    background: white;
  }.SignUpTagListSize {
    width: 90vw;
    height: 250px;
    background: white;
    overflow-x: auto;
  }

  }
</style>