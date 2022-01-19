<?php
    //store後台登入
    include_once('./Smarty/Smarty.class.php');
    session_start(); 
    $smarty = new Smarty();
    $smarty -> template_dir = './templates'; //模板存放目錄
    $smarty -> compile_dir = './templates_c'; //編譯目錄
    $smarty -> left_delimiter = '{{'; //左定界符
    $smarty -> right_delimiter = '}}'; //右定界符
    $smarty -> assign('test','OK');
    $servername = "172.16.2.113";
    $username = "root";
    $password = "12345678";
    $dbname = "users";
    $conn = new mysqli($servername, $username, $password, $dbname);

    //按下登入按鈕
    if(isset($_POST['login'])){
        //驗證有無輸入帳密
        if($_POST['acc']!="" && $_POST['pwd']!=""){
            $acc = $_POST['acc'];
            $pwd = $_POST['pwd'];
            //至資料庫(sales table)看有沒有符合的帳密
            $sql = "select * from store WHERE store_acc = '$acc' && store_pwd = '$pwd'";
            $data = mysqli_query($conn,$sql);
            if(mysqli_num_rows($data) != 0){
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);
                $store_status = $rs['store_status'];
                if($store_status == "on"){
                    $_SESSION['store_no'] = $rs['store_no'];
                    $_SESSION['store_name'] = $rs['store_name'];
                }elseif($store_status == "stop"){
                    echo "<script>alert('帳號已停用')</script>";
                }elseif($store_status == "delete"){
                    echo "<script>alert('帳號已刪除')</script>";
                }
            }else{
                echo "<script>alert('帳密錯誤')</script>";
            }
            
        }
        //無輸入帳密view登入頁面
        else{
            $smarty -> display('train6-back-store-login.html');
        }
    }
    
    if( isset($_SESSION['store_no'])){
        $url = "train6-back-store.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }else{
        $smarty -> display('train6-back-store-login.html');
    }
?>