<?php
//b1: check su kien
//if (!isset($_POST['dangky'])) {
//    die('');
//}
//b2: nhung file ketnoi.php
require 'ketnoi.php';

//b3: khai bao utf-8 de hien thi tieng viet
header('Content-Type: text/html; charset=UTF-8');

//b4: lay du lieu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $email = addslashes($_POST['email']);

//b5 validate

    if (empty($username) || empty($password) || empty($email)) {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)) {
        echo "Email này không hợp lệ. Vui lòng nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    Database::moketnoi("localhost", "root", "", "duc");
    try {
        $conn = Database::layconn();

        $stmt = $conn->prepare("insert into user(username,password,email) values (:username,:password,:email)");
        $stmt->bindParam(':username', $username);
        $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $hashed_pass);
        $stmt->bindParam(':email', $email);
        $stmt->execute();


//check ton tai

//        $stmt = $conn->prepare("SELECT username, password, email FROM user WHERE username = :username OR password = :password OR email = :email");
//        $stmt->bindParam(':username', $username);
//        $stmt->bindParam(':password', $password);
//        $stmt->bindParam(':email', $email);
//        $stmt->execute();
//        $count = $stmt->rowCount();
//        if ($count > 0) {
//            $existingFields = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            $errorMessage = '';
//            foreach ($existingFields as $field) {
//                if ($field['username'] == $username) {
//                    $errorMessage .= "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.<br>";
////                    $_SESSION['error']="ten dang nhap da ton tai.";
//                }
////                if ($field['password'] == $password) {
////                    $errorMessage .= "Mật khẩu đã tồn tại. Vui lòng chọn mật khẩu khác.<br>";
////                }
//                if ($field['email'] == $email) {
//                    $errorMessage .= "Email đã tồn tại. Vui lòng chọn email khác.<br>";
////                    $_SESSION['error']="email da ton tai.";
//
//                }
//            }
//
//            if (!empty($errorMessage)) {
//                echo $errorMessage;
//                echo "<a href='javascript: history.go(-1)'>Trở lại</a>";
//                exit;
//            }
//            exit;
//        }
        $_SESSION['success'] = "Registration successful!";
        header("Location: dangnhap.php");
        exit;
    } catch (PDOException $exception) {
        die("register failed" . $exception->getMessage());
        header("Location:dangky.php");
        exit();
    } finally {
        Database::dongketnoi();
    }
}
?>
