<?php
    //sales後台管理頁面
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
    $storearraylist = [];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_SESSION['sales_no'])){
        $sales_no = $_SESSION['sales_no'];
        $sales_name = $_SESSION['sales_name'];
        $smarty -> assign('sales_no', $_SESSION['sales_no']);
        $smarty -> assign('sales_name', $_SESSION['sales_name']);
        //撈銷售員名下商店資料
        $sql = "select * from store where store_sales_no = '$sales_no' and store_status = 'on' or store_status = 'stop'";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            for ($i=0; $i < mysqli_num_rows($data); $i++) {
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
                $storearraylist[$i] = array("store_name" => $rs['store_name'],
                                        "store_status" => $rs['store_status'],
                                        "store_no" => $rs['store_no']);
            }
        }
        //各店銷售總額
        $sql = "SELECT order_store_no, store.store_name, SUM(order_price)
                FROM order_list
                INNER JOIN store ON
                order_list.order_store_no = store.store_no AND store.store_sales_no = '1' AND store.store_status = 'on' OR store_status = 'stop'
                GROUP BY order_store_no";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            for ($i=0; $i < mysqli_num_rows($data); $i++) {
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);
                $storesummoney[$i] = array("store_name" => $rs['store_name'],
                                        "store_money" => $rs['SUM(order_price)']);
            }
        }

        $listarray = [];
        //撈銷售員名下銷售資料(inner join)
        $sql = "select order_item_name, order_item_amount, order_price, store.store_name
                    from order_list
                    inner join store on
                    order_list.order_store_no = store.store_no
                    where store_sales_no = '$sales_no' and store_status = 'on' or store_status = 'stop'";
        $data = mysqli_query($conn, $sql);
        $total = 0;
        if(mysqli_num_rows($data)!=0){
            for ($i=0; $i < mysqli_num_rows($data); $i++) {
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
                $listarray[$i] = array("order_item_name" => $rs['order_item_name'],
                                    "order_item_amount" => $rs['order_item_amount'],
                                    "order_price" => $rs['order_price'],
                                    "store_name" => $rs['store_name']);
                $total = $total + $rs['order_price'];
            }
        }
        //新增店家
        if(isset($_POST['store_insert'])){
            $new_store_name = $_POST['store_name'];
            $new_store_account = $_POST['store_account'];
            $new_store_password = $_POST['store_password'];
            $sql = "insert into store (store_name, store_acc, store_pwd, store_sales_no, store_status)
                        values ('$new_store_name', '$new_store_account', '$new_store_password', '$sales_no', 'on')";
            $data = mysqli_query($conn, $sql);
            header("Refresh:0");
                        
        }
        //店家狀態管理
        if(isset($_POST['on']) || isset($_POST['return_on'])){
            if(isset($_POST['on'])){
                $no = $_POST['on'];
            }else{
                $no = $_POST['return_on'];
            }
            $sql = "update store set store_status='on' where store_no = '$no'";
            $data = mysqli_query($conn, $sql);
            $url = "train6-back-sales.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
        if(isset($_POST['delete'])){
            $no = $_POST['delete'];
            $sql = "update store set store_status='delete' where store_no = '$no'";
            $data = mysqli_query($conn, $sql);
            $url = "train6-back-sales.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
        if(isset($_POST['stop'])){
            $no = $_POST['stop'];
            $sql = "update store set store_status='stop' where store_no = '$no'";
            $data = mysqli_query($conn, $sql);
            $url = "train6-back-sales.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
        
        
        $bonus = $total * 0.1;
        $smarty -> assign("total", $total);
        $smarty -> assign("bonus", $bonus);
        $smarty -> assign("list", $listarray);
        $smarty -> assign("store", $storearraylist);
        $smarty -> assign("storesummoney", $storesummoney);
        $smarty -> display('train6-back-sales.html');




    }else{
        session_destroy();
        $url = "train6-back-sales-login.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }

    if(isset($_POST['logout'])){
        session_destroy();
        $url = "train6-back-sales-login.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }


?>