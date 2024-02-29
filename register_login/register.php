<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
session_start();
// Code PHP xử lý validate
$error = array();
$data = array();
if (!empty($_POST['register'])) {
    // Lấy dữ liệu
    $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    $data['username'] = isset($_POST['username']) ? $_POST['username'] : '';

    // Kiểm tra định dạng dữ liệu
//    require('validate.php');
    if (empty($data['fullname'])) {
        $error['fullname'] = 'Bạn chưa nhập ho và tên';
    }

    if (empty($data['password'])) {
        $error['password'] = 'Bạn chưa nhập password';
    }
//    else if (!is_password($data['password'])) {
//        $error['password'] = 'Email không đúng định dạng';
//    }

    if (empty($data['username'])) {
        $error['username'] = 'Bạn chưa nhập tên người dùng';
    }

    // Lưu dữ liệu
    if (!$error) {
        echo 'Dữ liệu có thể lưu trữ';
        // Code lưu dữ liệu tại đây
        try {
//            ket noi DB
            $conn = new PDO("mysql:host=localhost;dbname=duc", 'root', '');
//            cai dat thuoc tinh
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            tao table : chi nen chay 1 lan
//            $conn->exec("DROP TABLE IF EXISTS register");
//            $sql = "create table register(
//    id int(11) primary key auto_increment,
//    username varchar(255) ,
//    password varchar(255) not null ,
//    fullname varchar(255)
//)";
////            chay sql
//            $conn->exec($sql);
//            prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO register (username, password, fullname) VALUES (:username, :password, :fullname)");
            $stmt->bindParam(':username', $data['username']);
            $password = $data['password'];
            $hashed_pass = md5($password);
            $stmt->bindParam(':password', $hashed_pass);
            $stmt->bindParam(':fullname', $data['fullname']);
            $stmt->execute();

            $_SESSION['success'] = 'register successfully';
            header("Location:login.php");
            exit();
        } catch (PDOException $e) {
            echo 'failed' . $e->getMessage();
        }
        $conn = null;
    } else {
        echo 'Dữ liệu bị lỗi, không thể lưu trữ';
    }
}
?>
<h1>Register form</h1>
<form method="post"
">
<table cellspacing="0" cellpadding="5">
    <tr>
        <td>User Name:</td>
        <td>
            <input type="text" name="username" id="username"
                   value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>"/>
            <?php echo isset($error['username']) ? $error['username'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
            <input type="password" name="password" id="password"
                   value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>"/>
            <?php echo isset($error['password']) ? $error['password'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td>Full Name:</td>
        <td>
            <input type="text" name="fullname" id="fullname"
                   value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>"/>
            <?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="register" value="Đăng ký"/></td>
    </tr>
</table>
</form>
</body>
</html>
