<?php /* Smarty version 2.6.32, created on 2021-11-26 10:07:39
         compiled from train6-back-store-login.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>商店後台管理登入頁面</title>
</head>
<body>
    <div class="container">
        <h2>商店後台管理登入頁面</h2>
        <form action="train6-back-store-login.php" method="post">
            <div class="form-group">
                <label for="account">Account:</label>
                <input type="account" class="form-control" id="account" placeholder="Enter account" name="acc">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <button type="submit" class="btn btn-success" name="login">登入</button>
        </form>
        <br>
        <a href="train6-index.php" class="btn btn-info">首頁</a>
    </div>
</body>
</html>