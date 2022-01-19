<?php
    //商店後台
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
    $edit_store_name = "";
    $edit_no = "";
    $itemarraylist = [];
    $orderlistarray = [];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['logout'])){
        session_destroy();
        $url = "train6-back-store-login.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
    if(isset($_SESSION['store_no'])){
        $store_no = $_SESSION['store_no'];
        $store_name = $_SESSION['store_name'];
        //搜尋此店家的產品列表
        $sql = "select items_no, items_name, items_price
                from items
                where items_store_no = '$store_no'";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            for ($i=0; $i < mysqli_num_rows($data); $i++) {
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC);  
                $itemarraylist[$i] = array("items_no" => $rs['items_no'],
                                        "items_name" => $rs['items_name'],
                                        "items_price" => $rs['items_price']);
            }
        }
        //商品新增
        if(isset($_POST['item_insert'])){
            if($_POST['item_name'] != "" && $_POST['item_price'] != ""){
                $item_name = $_POST['item_name'];
                $item_price = $_POST['item_price'];
                $sql = "insert into items
                                (items_name, items_price, items_store_no)
                            values ('$item_name', '$item_price', '$store_no')";
                $data = mysqli_query($conn, $sql);
                header("Refresh:0");
            }else{
                echo "<script>alert('請輸入正確資料')</script>";
            }

        }
        if(isset($_POST['edit'])){
            $edit_no = $_POST['edit'];

        }
        //商品刪除
        if(isset($_POST['delete'])){
            $delete_no = $_POST['delete'];
            $sql = "delete from items
                        where items_no = '$delete_no'";
            $data = mysqli_query($conn, $sql);
            header("Refresh:0");
        }
        //搜尋銷售數據
        $sql = "select customer.name, customer.id, customer.phone, customer.postcode, customer.address, order_list.order_date, order_list.order_item_name, order_list.order_item_amount, order_list.order_price, items.items_name
                    from (customer inner join order_list
                    on customer.no = order_list.order_customer_no)  
                    join items
                    on order_list.order_item_name = items.items_name
                    where order_list.order_store_no = '$store_no'";
        $data = mysqli_query($conn, $sql);
        if(mysqli_num_rows($data)!=0){
            for ($i=0; $i < mysqli_num_rows($data); $i++) {
                $rs = mysqli_fetch_array($data,MYSQLI_ASSOC); 
                $orderlistarray[$i] = array("name" => $rs['name'],
                                        "id" => $rs['id'],
                                        "phone" => base64_decode($rs['phone']),
                                        "postcode" => $rs['postcode'],
                                        "address" => base64_decode($rs['address']),
                                        "order_date" => $rs['order_date'],
                                        "order_item_amount" => $rs['order_item_amount'],
                                        "items_name" => $rs['items_name'],
                                        "order_price" => $rs['order_price']);
            }
        }
        //修改店家名稱
        if(isset($_POST['edit_store_name'])){
            $edit_store_name = "on";
        }
        if(isset($_POST['save_store_name'])){
            $new_store_name = $_POST['new_store_name'];
            $sql = "update store
                        set store_name = '$new_store_name'
                    where store_no = '$store_no'";
            $data = mysqli_query($conn, $sql);
            $_SESSION['store_name'] = $new_store_name;
            header("Refresh:0");
        }
        //儲存修改商品資料
        if(isset($_POST['save_item'])){
            $save_item_no = $_POST['save_item'];
            $new_item_name = $_POST['new_item_name'];
            $new_item_price = $_POST['new_item_price'];

            $sql = "update items
                        set items_name = '$new_item_name',
                            items_price = '$new_item_price'
                    where items_no = '$save_item_no'";
            $data = mysqli_query($conn, $sql);
            header("Refresh:0");
        }



        $smarty -> assign('itemarraylist', $itemarraylist);
        $smarty -> assign('orderlistarray', $orderlistarray);
        $smarty -> assign('edit_no', $edit_no);
        $smarty -> assign('edit_store_name', $edit_store_name);
        $smarty -> assign('store_name', $store_name);
        $smarty -> display('train6-back-store.html');
    }else{
        $smarty -> display('train6-back-store-login.html');
    }

?>