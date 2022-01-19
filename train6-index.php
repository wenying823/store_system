<?php
    //首頁
    include_once('./Smarty/Smarty.class.php');
    session_start(); 
    $smarty = new Smarty();
    $smarty -> template_dir = './templates'; //模板存放目錄
    $smarty -> compile_dir = './templates_c'; //編譯目錄
    $smarty -> left_delimiter = '{{'; //左定界符
    $smarty -> right_delimiter = '}}'; //右定界符
    $smarty -> display('train6-index.html');

?>