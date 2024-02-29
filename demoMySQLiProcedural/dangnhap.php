<?php
////buoc 1: mo session
//
//session_start();
//
////Khai báo utf-8 để hiển thị được tiếng việt
//header('Content-Type: text/html; charset=UTF-8');
//
////buoc 2: xu ly dang nhap
//if (isset($_POST['dangnhap'])) {
////   buoc 1: mo ket noi toi database
//
//    include('ketnoi.php');
//
////    buoc 2: lay du lieu nhap vao
//    $username = addslashes($_POST['txtUsername']);
//    $password = addslashes($_POST['txtPassword']);
//}
//
////buoc 3: validate
//
//if (!$username || !$password) {
//    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////sau khi nhap mat khau thi phai ma hoa
//$password=md5($password);
//
////kiem tra ten dang nhap co ton tai hay khong
//$sql=mysqli_query("select username,password from member where username='$username'");
//if (mysqli_num_rows($sql)==0){
//    echo "ten dang nhap khong ton tai";
//    exit();
//}
//
////lay pass trong db ra de so sanh co khop voi pass nhap vao khong
//$row=mysqli_fetch_row($sql);
//if ($password!=$row['password']){
//    echo "mat khau khong khop. xin vui long nhap lai mat khau.";
//    exit();
//}
//
////buoc 4: sau khi dang nhap thanh cong thi luu ten dang nhap
//$_SESSION['username']=$username;
//echo "xin chao $username. Ban da dang nhap thanh cong. <a href='/'>Ve trang chu</a>";
//?>
<!---->
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title></title>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<!--</head>-->
<!--<body>-->
<!--<form action='dangnhap.php?do=login' method='POST'>-->
<!--    <table cellpadding='0' cellspacing='0' border='1'>-->
<!--        <tr>-->
<!--            <td>-->
<!--                Tên đăng nhập :-->
<!--            </td>-->
<!--            <td>-->
<!--                <input type='text' name='txtUsername'/>-->
<!--            </td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>-->
<!--                Mật khẩu :-->
<!--            </td>-->
<!--            <td>-->
<!--                <input type='password' name='txtPassword'/>-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->
<!--    <input type='submit' name="dangnhap" value='Đăng nhập'/>-->
<!--    <a href='dangky.php' title='Đăng ký'>Đăng ký</a>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->

<?php
//Khai báo sử dụng session
session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
    //Kết nối tới database
    include('ketnoi.php');

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa pasword
    $password = md5($password);
    $ketnoi = mysqli_connect("localhost", "root", "", "duc");

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($ketnoi,"SELECT username, password FROM member WHERE username='$username'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công";
    header("Location:trangchu.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form action='dangnhap.php?do=login' method='POST'>
    <table cellpadding='0' cellspacing='0' border='1'>
        <tr>
            <td>
                Tên đăng nhập :
            </td>
            <td>
                <input type='text' name='txtUsername' />
            </td>
        </tr>
        <tr>
            <td>
                Mật khẩu :
            </td>
            <td>
                <input type='password' name='txtPassword' />
            </td>
        </tr>
    </table>
    <input type='submit' name="dangnhap" value='Đăng nhập' />
    <a href='dangky.php' title='Đăng ký'>Đăng ký</a>
</form>
</body>
</html>