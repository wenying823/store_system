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
    $conn = new mysqli($servername, $username, $password, $dbname);
    $itemarraylist = [];

    //搜尋所有商品
    $sql = "select items.items_no, items.items_name, items.items_price, store.store_name from items
                join store
                on items.items_store_no = store.store_no";
    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data)!=0){
        for ($i=0; $i < mysqli_num_rows($data); $i++) {
            $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
            $itemarraylist[$i] = array("items_no" => $rs['items_no'],
                                    "items_name" => $rs['items_name'],
                                    "items_price" => $rs['items_price'],
                                    "store_name" => $rs['store_name']);
        }
    }
    if(isset($_POST['checkout'])){
        $name = $_POST['customer_name'];
        $amount = $_POST['amount'];
        $items_name = $_SESSION['items_name'];
        $items_price = $_SESSION['items_price'];
        $items_store_no = $_SESSION['items_store_no'];
        $sql = "select no from customer
                    where name = '$name'";
        $order_price = $items_price * $amount;
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            if($name != "" && $amount != ""){
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
                $customer_no = $rs['no'];
                $today = date("Y-m-d");
                $sql = "insert into order_list
                            (order_customer_no, order_date, order_item_name, order_item_amount, order_price, order_store_no)
                        values('$customer_no', '$today', '$items_name', '$amount', '$order_price', '$items_store_no')";
                $data = mysqli_query($conn, $sql);
                unset($_SESSION['items_name']);
                unset($_SESSION['items_price']);
                unset($_SESSION['items_store_no']);
                unset($_SESSION['items_no']);
                echo "<script>alert('下訂單成功')</script>";

            }
            else{
                echo "<script>alert('請輸入正確資料')</script>";

            }

        }else{
            echo "<script>alert('查無會員資料')</script>";
        }


    }

    



    $smarty -> assign('itemarraylist', $itemarraylist);
    $smarty -> display('train6-shopweb.html');

?>