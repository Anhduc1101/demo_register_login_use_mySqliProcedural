<?php
//b1: mo session
session_start();

//b2: Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//b3: xu ly dang nhap
//if (!isset($_POST['dangnhap'])){
//    die('');
//}
if (isset($_POST['dangnhap'])) {
    //b4: ket noi
    require 'ketnoi.php';

    //b5: lay du lieu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);

        //b6: validate
        if (empty($username) || empty($password)) {
            echo "ban chua dien day du thong tin.<a href='javascript: history.go(-1)'>Back</a>";
            exit;
        }

        if ($_POST['username'] != $username) {
            echo "username khong dung.<a href='javascript: history.go(-1)'>Back</a>";
            exit;
        }
        if ($_POST['password'] != $password) {
            echo "password khong dung.<a href='javascript: history.go(-1)'>Back</a>";
            exit;
        }

        //b6: mo du lieu
        Database::moketnoi("localhost", "root", "", "duc");
        try {
            //b7: truy van sql bang PDO
            $conn = Database::layconn();
//            log($conn);
            $stmt = $conn->prepare("select username, password from user where username=:username");
            $stmt->bindParam(':username', $username);
//            $hashed_pass = md5($password);
//            $stmt->bindParam(':password', $hashed_pass);
            $stmt->execute();

            //b8: check user login
            $checklogin = $stmt->fetch(2); //2 = PDO::FETCH_ASSOC
            if (!$checklogin || !password_verify($password, $checklogin['password'])) {
                $_SESSION['error']="Ten dang nhap hoac mat khau chua dung, vui long nhap lai.<a href='javascript: history.go(-1)'>back</a>";
                header("Location:dangnhap.php");
                exit();
            }

            //b9: luu session
            $_SESSION['username'] = $username;
            echo "Login successfully!";
            header("Location:home.php");
            exit();
        } catch (PDOException $exception) {
            echo "Failed" . $exception->getMessage();
            header("Location:dangnhap.php");
            exit();
        } finally {
            Database::dongketnoi();
        }
    }
}