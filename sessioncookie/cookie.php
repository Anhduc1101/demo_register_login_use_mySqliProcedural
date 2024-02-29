<!DOCTYPE html>

<?php
// tạo cookie có time lưu trữ 5s
setcookie('username', 'thehalfheart', time() + 5);
// check cookie có tồn tại hay không?
if (isset($_COOKIE['username']) && time() <= $_COOKIE['username']) {
    echo "cookie dang hoat dong";
} else {
    echo "cookie da het phien lam viec";
}
// xóa cookie thì cho time() trừ đi chính sô thời gian mình thiết lập ở trên
setcookie("username", "", time() - 5);
?>

<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
</body>
</html>