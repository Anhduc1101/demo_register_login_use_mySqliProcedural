<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title></title>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<!--</head>-->
<!--<body>-->
<!--<form method="POST">-->
<!--    Username: <input type="text" name="username" value=""/> <br/>-->
<!--    password: <input type="password" name="password" value=""/><br/>-->
<!--    <input type="submit" name="form_click" value="Gửi Dữ Liệu"/>-->
<!--    --><?php
//    // Nếu người dùng click vào button Gửi Dữ Liệu
//    // Vì button đó tên là form_click nên đó cũng là
//    // tên của key nằm trong biến $_POST
//    if (isset($_POST['form_click'])) {
//        echo '<br/>';
//        echo 'Tên đăng nhập là: ' . $_POST['username'];
//        echo '<br/>';
//        echo 'Mật khẩu là: ' . $_POST['password'];
//    }
//    echo '<br/>';
//    $str = "đang ăn tối";
//    echo 'nam nói '.$str;
//    ?>
<!--</form>-->
<!--</body>-->
<!--</html>-->

<!--*****************************************************************************************************************-->

<!--validate = code php-->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Freetuts.net - xử lý form với POST</title>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link rel="stylesheet" type="text/css" href="post.css">.-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<!---->
<!--<h1> Login Form</h1>-->
<!--<form method="post">-->
<!--    Username: <input type="text" name="username" placeholder="enter your username..."><br>-->
<!--    Password: <input type="password" name="password" placeholder="enter your password...">-->
<!--    <input type="submit" name="btn" value="login">-->
<!--</form>-->
<?php
//if ($_POST['btn']) {
////    B1: lay thong tin
//    $username = isset($_POST['username']) ? $_POST['username'] : '';
//    $password = isset($_POST['password']) ? $_POST['password'] : '';
//    if (!$username || !$password) {
//        echo 'ban chua nhap thong tin';
//    } elseif ($username != 'duc' || $password != 'duc123') {
//        echo 'tai khoan hoac mat khau ban nhap chua dung. Moi nhap lai!';
//    } else {
//        echo 'dang nhap thanh cong';
//    }
//}
//?>
<!--</body>-->
<!--</html>-->

<!--*****************************************************************************************************************-->

<!--validate = code javascript-->
<!--phai co id va value trong o input-->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Freetuts.net - xử lý form với POST</title>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<h1> Login Form</h1>-->
<!--<form method="post" onsubmit="validateForm()">-->
<!--    Username: <input type="text"  placeholder="enter your username..." id="username" value=""><br>-->
<!--    Password: <input type="password"  placeholder="enter your password..." id="password" value="">-->
<!--    <input type="submit"  value="login">-->
<!--</form>-->
<!---->
<!--<script>-->
<!--    function validateForm() {-->
<!--        var username = document.getElementById("username").value;-->
<!--        var password = document.getElementById("password").value;-->
<!--        if (!username||!password) {-->
<!--            alert("ban chua nhap thong tin");-->
<!--        } else if (password != 'duc123'||username!='duc') {-->
<!--            alert("dang nhap tai khoan sai");-->
<!--        }else {-->
<!--            alert("dang nhap thanh cong")-->
<!--            return true;-->
<!--        }-->
<!--    }-->
<!--</script>-->
<!--</body>-->
<!--</html>-->

<!--*****************************************************************************************************************-->

<!--validate = code php-->
<!DOCTYPE html>
<html>
<head>
    <title>Freetuts.net - Form liên hệ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
// Code PHP xử lý validate
$error = array();
$data = array();
if (!empty($_POST['contact_action'])) {
    // Lấy dữ liệu
    $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';

    // Kiểm tra định dạng dữ liệu
    require('validate.php');
    if (empty($data['fullname'])) {
        $error['fullname'] = 'Bạn chưa nhập tên';
    }

    if (empty($data['email'])) {
        $error['email'] = 'Bạn chưa email';
    } else if (!is_email($data['email'])) {
        $error['email'] = 'Email không đúng định dạng';
    }

    if (empty($data['content'])) {
        $error['content'] = 'Bạn chưa nhập nội dung';
    }

    // Lưu dữ liệu
    if (!$error) {
        echo 'Dữ liệu có thể lưu trữ';
        // Code lưu dữ liệu tại đây

    } else {
        echo 'Dữ liệu bị lỗi, không thể lưu trữ';
    }
}
?>
<h1>freetuts.net - contact form</h1>
<form method="post"
">
<table cellspacing="0" cellpadding="5">
    <tr>
        <td>Tên của bạn</td>
        <td>
            <input type="text" name="fullname" id="fullname"
                   value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>"/>
            <?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td>Email của bạn</td>
        <td>
            <input type="text" name="email" id="email"
                   value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>"/>
            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td>Nội dung liên hệ</td>
        <td>
            <textarea id="content"
                      name="content"><?php echo isset($data['content']) ? $data['content'] : ''; ?></textarea>
            <?php echo isset($error['content']) ? $error['content'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="contact_action" value="Gửi liên hệ"/></td>
    </tr>
</table>
</form>
</body>
</html>

