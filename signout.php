<?php
session_start();
$_SESSION = array();
setCookie(session_name(),'',time()-3600,'/');
session_destroy();
header("Location: 切版_index.php");
?>