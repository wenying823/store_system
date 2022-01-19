<?php /* Smarty version 2.6.32, created on 2021-11-29 07:27:37
         compiled from train6-back-store.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?php echo $this->_tpl_vars['store_name']; ?>
商店後台管理</title>
</head>
<body>
    <div class="container">
        <form action='train6-back-store.php' method='post'>
            <h2><?php echo $this->_tpl_vars['store_name']; ?>
的管理後台</h2>
            <?php if ($this->_tpl_vars['edit_store_name'] == 'on'): ?>            
                <input type="text" class="form-control" id="new_store_name" placeholder="請輸入店家名稱" name="new_store_name" value="<?php echo $this->_tpl_vars['store_name']; ?>
" required>
                <button type="submit" class="btn btn-success" name="save_store_name">確認修改</button>
            <?php else: ?>
                <h3>您的店家名稱 : <?php echo $this->_tpl_vars['store_name']; ?>
</h3>
                <button type="submit" class="btn btn-warning" name="edit_store_name">修改店家名稱</button>
            <?php endif; ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">新增產品</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">新增產品</h4>
                        </div>
                        <div class="modal-body" style="height:300px" >
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">產品名稱:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="item_name" placeholder="請輸入產品名稱" name="item_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_price">單價:</label>
                                <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="item_price" placeholder="單價" name="item_price" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success" name="item_insert">新增新增</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50%">產品</th>
                        <th width="30%">售價</th>
                        <th width="20%">功能</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['itemarraylist']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                        <?php if ($this->_tpl_vars['edit_no'] == $this->_tpl_vars['i']['items_no']): ?>     
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="new_item_name" placeholder="請輸入產品名稱" name="new_item_name" value="<?php echo $this->_tpl_vars['i']['items_name']; ?>
" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="new_item_price" placeholder="單價" name="new_item_price" value="<?php echo $this->_tpl_vars['i']['items_price']; ?>
" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')" required>
                            </td>
                            <td>
                                <button type="sumbit" class="btn btn-success btn-xs" name="save_item" value='<?php echo $this->_tpl_vars['i']['items_no']; ?>
'>儲存</button>
                            </td>
                        </tr>
                        <?php else: ?>   
                        <tr>
                            <td><?php echo $this->_tpl_vars['i']['items_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['i']['items_price']; ?>
</td>
                            <td>
                                <button type="sumbit" class="btn btn-warning btn-xs" name="edit" value='<?php echo $this->_tpl_vars['i']['items_no']; ?>
'>編輯</button>
                                <button type="sumbit" class="btn btn-danger btn-xs" name="delete" value='<?php echo $this->_tpl_vars['i']['items_no']; ?>
'>刪除</button>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <h3>銷售數據</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>購買人</th>
                        <th>購買日期</th>
                        <th>商品名稱</th>
                        <th>購買數量</th>
                        <th>訂單金額</th>
                        <th>身分證</th>
                        <th>手機</th>
                        <th>郵遞區號</th>
                        <th>地址</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['orderlistarray']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['i']['name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['order_date']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['items_name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['order_item_amount']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['order_price']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['id']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['phone']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['postcode']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['address']; ?>
</td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </thead>
                <tbody>

                </tbody>
            </table>
            <button type="submit" class="btn btn-danger" name="logout">登出</button>
        </form>

    </div>
</body>
</html>