<?php
    //商店街
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
    $itemarraylist = [];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_GET['buy'])){
        $items_no = $_GET['buy'];
        $sql = "select * from items
                    where items_no = '$items_no'";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
            $itemarraylist = array("items_no" => $rs['items_no'],
                                    "items_name" => $rs['items_name'],
                                    "items_price" => $rs['items_price'],
                                    "items_store_no" => $rs['items_store_no']);
            $_SESSION['items_no'] = $itemarraylist['items_no'];
            $_SESSION['items_name'] = $itemarraylist['items_name'];
            $_SESSION['items_price'] = $itemarraylist['items_price'];
            $_SESSION['items_store_no'] = $itemarraylist['items_store_no'];
        }else{
            $url = "train6-shopweb.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }

    }else{
        $url = "train6-shopweb.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }



    $smarty -> assign('items_no', $_SESSION['items_no']);
    $smarty -> assign('items_name', $_SESSION['items_name']);
    $smarty -> assign('items_price', $_SESSION['items_price']);

    $smarty -> display('train6-checkout.html');
?>