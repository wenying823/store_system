<?php /* Smarty version 2.6.32, created on 2021-11-29 07:09:29
         compiled from train6-shopweb.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>shopweb</title>
</head>
<body>
    <div class="container">
        <form action='train6-checkout.php' method='get'>
            <h2>歡迎來到商店街</h2>
            <a href="train6-index.php" class="btn btn-info">首頁</a>
            <h3>商品列表</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="40%">產品</th>
                        <th width="20%">售價</th>
                        <th width="30%">店家名稱</th>
                        <th width="10%">購買</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['itemarraylist']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['i']['items_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['i']['items_price']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['i']['store_name']; ?>
</td>
                            <td>
                                <button type="submit" class="btn btn-success" name="buy" value="<?php echo $this->_tpl_vars['i']['items_no']; ?>
">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>購買
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>

        </form>
    </div>
</body>
</html>