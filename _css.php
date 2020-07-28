<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
  body{ font-family: '微軟正黑體';}
  .articalContentPreview{
    height: 200px;
    overflow: hidden;
  }

  /** article_detail */
  .messageTextareaSize{
    width: 50vw;
    height: 200px;
  }

  /** article_write */
  .singleScene{ /**Signin/Signup/article_write */
    height:100vh; 
    overflow:hidden;
  } 
  .fs-22{/* font-size*/ 
    font-size: 22px;
  }
  .titleInputWidth{
    width: 65vw!important;
  }
  .articleContentSize{
    height: 400px!important;
    width: 65vw!important;
  }
  .tagSearchBar{
    width: 63%!important;
  }.tagSearchBar input{
    height: 50px;
  }
  .tagList{
    width: 1080px; 
    height: 360px; 
    overflow: auto;
  }.tagList ul{
    list-style: none; 
    font-size: 26px;
  }
  .displayNone {  /** signup/article_write */
		display: none;
	}

  /** board */
  .boardBG{  /*board background */
    width:100%; 
    height: 200px;  
    background-color: gray;
  }

  /** header_登入前/後 */
  .hamburgerMenu{
    z-index: 3; 
    width: 75%; 
    height: 100vh; 
    position:absolute;
  }.cursorPointer{
    cursor: pointer;
  }
  .fs-24{
    font-size: 24px;
  }
  .articleWriteButton{
    position: fixed;
    right: 50px;
    bottom: 50px;
    border-radius: 50px;
    filter: drop-shadow(0 5px 5px rgba(0, 0, 0, 0.3));
    z-index: 3;
  }
  .searchInputSize{
    width: 80%!important; 
    height: 50px;
  }
  /** Sign in */
  .signInput{
    width: 425px!important; 
    height: 60px; 
    font-size: 28px;
  }
  /** Sign up */
  .dis-flex{
    display:flex;
  }
  .signupTagSelectBG{ /**註冊時選擇Tag的背景 */
    width: 600px; 
    height:450px;
  }
  .selectedTagBGSize{   /**註冊時，顯示已選擇的Tag的框 */
    width: 580px; 
    height: 70px; 
    background:white;
  }
  .SignUpTagListSize{
    width: 580px; 
    height: 350px; 
    background:white; 
    overflow-x: auto;
  }
  
  

  @media screen and (min-width: 1200px){
    .bodySpace{
      margin: 0 7%;
      
    }

  }

</style>