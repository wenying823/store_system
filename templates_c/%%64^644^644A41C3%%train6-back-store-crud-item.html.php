<?php /* Smarty version 2.6.32, created on 2021-11-29 02:11:28
         compiled from train6-back-store-crud-item.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>商品編輯頁面</title>
</head>
<body>
    <div class="container">
        <h2>商品編輯頁面</h2>
        <form action="train6-back-store.php" method="post">
            <div class="form-group">
                <label for="name">name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="price">price:</label>
                <input type="price" class="form-control" id="price" placeholder="Enter price" name="price">
            </div>
            <button type="submit" class="btn btn-success" name="insert">新增</button>
        </form>
        <br>
        <a href="train6-back-store.php" class="btn btn-info">返回</a>
    </div>
    
</body>
</html>