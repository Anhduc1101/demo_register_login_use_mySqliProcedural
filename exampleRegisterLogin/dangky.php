

<!DOCTYPE html>
<html lang="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register Page</title>
</head>
<body>
<h1>Register Form</h1>
<?php
session_start();
if (isset($_SESSION['error'])) {
echo '<div class="text-red-500">' . $_SESSION['error'] . '</div>';
unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
echo '<div class="text-green-500">' . $_SESSION['success'] . '</div>';
unset($_SESSION['success']);
}
?>
<form action="xulydangky.php" method="POST">
    <table cellpadding="0" cellspacing="0" border="1">
        <tr>
            <td>
                Tên đăng nhập :
            </td>
            <td>
                <input type="text" name="username" size="50"/>
            </td>
        </tr>
        <tr>
            <td>
                Mật khẩu :
            </td>
            <td>
                <input type="password" name="password" size="50"/>
            </td>
        </tr>
        <tr>
            <td>
                Email :
            </td>
            <td>
                <input type="text" name="email" size="50"/>
            </td>
        </tr>
    </table>
    <input type="submit" name="dangky" value="Đăng ký"/>
    <input type="reset" value="Nhập lại"/>
    <a href="dangnhap.php">Đăng nhập</a>
</form>
</body>
</html>
