<?php /* Smarty version 2.6.32, created on 2021-11-30 03:08:54
         compiled from train6-back-sales.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>業務後台管理</title>
</head>
<body>
    <form action='train6-back-sales.php' method='post'>
    <div class="container">
        <h2><?php echo $this->_tpl_vars['sales_name']; ?>
 業務的後台管理<font color="red">目前獎金為: <?php echo $this->_tpl_vars['bonus']; ?>
</font></h2>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">新增店家</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">新增店家</h4>
                    </div>
                    <div class="modal-body" style="height:300px" >
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="store_name">店家名稱:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="store_name" placeholder="請輸入產品名稱" name="store_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="store_account">帳號:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="store_account" placeholder="帳號" name="store_account">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="store_password">密碼:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="store_password" placeholder="密碼" name="store_password">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success" name="store_insert">新增</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>名下商店銷售資料</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>商品名稱</th>
                    <th>商品數量</th>
                    <th>訂單金額</th>
                    <th>店家名稱</th>
                </tr>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['list']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['i']['order_item_name']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['i']['order_item_amount']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['i']['order_price']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['i']['store_name']; ?>
</td>
                </tr>
                
                <?php endforeach; endif; unset($_from); ?>
                <tr>
                    <td colspan="6" align="right">
                        <font color="red">
                            銷售總額: <?php echo $this->_tpl_vars['total']; ?>

                        </font>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>名下各店銷售額</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>店家名稱</th>
                    <th>銷售總額</th>
                </tr>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['storesummoney']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['i']['store_name']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['i']['store_money']; ?>
</td>
                </tr>
                
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
        <h3>名下商店資料</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="30%">商店名稱</th>
                    <th width="20%">狀態</th>
                    <th width="50%">功能</th>
                </tr>
            </thead>
            <tbody>
                    <?php $_from = $this->_tpl_vars['store']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['i']['store_name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['store_status']; ?>
</td>
                        <td>
                            <?php if ($this->_tpl_vars['i']['store_status'] == 'on'): ?>
                                <button type="sumbit" class="btn btn-success btn-xs" name="on" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
' disabled="disabled">啟用</button>
                                <button type="sumbit" class="btn btn-warning btn-xs" name="stop" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
'>停用</button>
                                <button type="sumbit" class="btn btn-danger btn-xs" name="delete" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
'>刪除</button>
                            <?php elseif ($this->_tpl_vars['i']['store_status'] == 'stop'): ?>
                                <button type="sumbit" class="btn btn-success btn-xs" name="on" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
'>啟用</button>
                                <button type="sumbit" class="btn btn-warning btn-xs" name="stop" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
' disabled="disabled">停用</button>
                                <button type="sumbit" class="btn btn-danger btn-xs" name="delete" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
'>刪除</button>
                            <?php elseif ($this->_tpl_vars['i']['store_status'] == 'delete'): ?>
                                <button type="sumbit" class="btn btn-success btn-xs" name="on" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
' disabled="disabled">啟用</button>
                                <button type="sumbit" class="btn btn-warning btn-xs" name="stop" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
' disabled="disabled">停用</button>
                                <button type="sumbit" class="btn btn-danger btn-xs" name="delete" value='<?php echo $this->_tpl_vars['i']['store_no']; ?>
' disabled="disabled">刪除</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger" name="logout">登出</button>
    </div>
    </form>
</body>
</html>