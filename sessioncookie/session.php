<!--Xóa hết session-->
<!---->
<?php
//session_start();
//
//// Nếu click vào nút Lưu Session
//if (isset($_POST['save-session'])) {
//    // Lưu Session
//    $_SESSION['name'] = $_POST['username'];
//}
//
//// Nếu click vào nút Xóa Session
//if (isset($_POST['del-session'])) {
//    // Kiểm tra xem session 'name' đã tồn tại hay chưa
//    if (isset($_SESSION['name'])) {
//        // Xóa session 'name'
//        unset($_SESSION['name']);
//        echo 'Session đã bị xóa';
//    } else {
//        echo 'Không tồn tại session';
//    }
//}
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Session Example</title>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<!--</head>-->
<!--<body>-->
<!--<h1>-->
<!--    --><?php
//    // Hiển thị thông tin lưu trong Session
//    // Kiểm tra xem session 'name' có tồn tại không trước khi hiển thị nó ra
//    if (isset($_SESSION['name'])) {
//        echo 'Tên session là: ' . $_SESSION['name'];
//    }
//    ?>
<!--</h1>-->
<!--<form method="POST" action="">-->
<!--    <input type="submit" name="save-session" value="Lưu Session"/>-->
<!--    <input type="submit" name="del-session" value="Xóa Session"/>-->
<!--    <input type="text" name="username" value=""/> <br/>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->


<!--xóa session theo tên nhập vào-->

<?php
session_start();

// Nếu click vào nút Lưu Session
if (isset($_POST['save-session'])) {
    // Lưu Session với khóa là giá trị 'name'
    $_SESSION[$_POST['name']] = $_POST['name'];
}
// Nếu click vào nút Xóa Session
if (isset($_POST['del-session'])) {
    // Kiểm tra xem session 'name' đã tồn tại hay chưa
    if (isset($_SESSION[$_POST['name']])) {
        // Xóa session với khóa là giá trị 'name'
        unset($_SESSION[$_POST['name']]);
        echo 'Session đã bị xóa';
    } else {
        echo 'Không tồn tại session';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Example</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>
    <?php
    // Hiển thị thông tin lưu trong Session
    // Kiểm tra xem session 'name' có tồn tại không trước khi hiển thị nó ra
    if (isset($_SESSION[$_POST['name']])) {
        echo 'Tên session Là: ' . $_SESSION[$_POST['name']];
    }
    ?>
</h1>
<form method="POST" action="">
    <input type="submit" name="save-session" value="Lưu Session"/>
    <input type="submit" name="del-session" value="Xóa Session"/>
    <input type="text" name="name" placeholder="Tên Session" value=""/> <br/>
<!--    <input type="text" name="username" placeholder="Tên Đăng Nhập" value=""/> <br/>-->
</form>
</body>
</html>