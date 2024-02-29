<!DOCTYPE html>
<html>
<head>
    <title>Freetuts.net - xử lý form với POST</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="post.css">.
</head>

<body>


<h1> Login Form</h1>
<form method="post">
    Username: <input type="text" name="username" placeholder="enter your username..."><br>
    Password: <input type="password" name="password" placeholder="enter your password...">
    <input type="submit" name="btn" value="login">
</form>
<?php
if ($_POST['btn']) {
//    B1: lay thong tin
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if (!$username || !$password) {
        echo 'ban chua nhap thong tin';
    }

}
?>
</body>
</html>