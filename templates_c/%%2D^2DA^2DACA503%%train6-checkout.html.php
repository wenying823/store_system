<?php /* Smarty version 2.6.32, created on 2021-11-29 07:31:05
         compiled from train6-checkout.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>結帳</title>
    <script>
        function amountcheck(){
            var amount = document.getElementById("num");
            amount = amount.value;
            amount=amount.replace(/^(0+)|[^\d]+/g,'');
            var table = document.getElementById("checkout_table");
            price = table.rows[1].cells[1].innerHTML;
            var order_price = price * amount;
            document.getElementById("num").value=amount;
            document.getElementById("order_price").innerHTML=order_price;
            
        }

    </script>
</head>
<body>
    <div class="container">
        <form action='train6-shopweb.php' method='post'>
            <h2>歡迎來到商店街</h2>
            <h3>結帳</h3>
            <table class="table" id="checkout_table">
                <tr>
                    <td width="40%">產品名稱</td>
                    <td width="60%"><?php echo $this->_tpl_vars['items_name']; ?>
</td>
                </tr>
                <tr>
                    <td>單價</td>
                    <td><?php echo $this->_tpl_vars['items_price']; ?>
</td>
                </tr>
                <tr>
                    <td>數量</td>
                    <td>
                        <input id="num" type="text" class="form-control" name="amount" placeholder="購買數量" onkeyup="amountcheck()" required>
                    </td>
                </tr>
                <tr>
                    <td>訂單總額</td>
                    <td id="order_price">0</td>
                </tr>
                <tr>
                    <td>會員名稱</td>
                    <td><input id="name" type="text" class="form-control" name="customer_name" placeholder="輸入會員名稱" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-success" name="checkout">
                            <span class="glyphicon glyphicon-shopping-cart"></span>結帳
                        </button>
                        <a href="train6-shopweb.php" class="btn btn-default">返回</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>