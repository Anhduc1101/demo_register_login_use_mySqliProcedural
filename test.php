<?php session_start();
// Nếu click vào nút Lưu Session
if (isset($_POST['save-session'])) {
    // Lưu Session
    $_SESSION['name'] = $_POST['username'];
}

//Nếu click vào nút xóa session
if (isset($_POST['del-session'])) {
    if (isset($_SESSION['name'])) {
// Xóa session name
        unset($_SESSION['name']);
        echo 'session đã bị xóa';
    } else {
        echo 'không tồn tại session này !';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>
    <?php
    // Hiển thị thông tin lưu trong Session
    // phải kiểm tra có tồn tại không trước khi hiển thị nó ra
    if (isset($_SESSION['name'])) {
        echo 'Tên Đăng Nhập Là: ' . $_SESSION['name'];
    }
    ?>
</h1>
<form method="POST" action="">
    <input type="submit" name="save-session" value="Lưu Session"/>
    <input type="submit" name="del-session" value="Xóa Session"/>
    <input type="text" name="username" value=""/> <br/>
</form>
</body>
</html>
