<?php
////buoc 1: check su kien
//
////neu khong phai la su kien xu ly thi khong xu ly
//if (!isset($_POST['txtUsername'])) {
//    die('');
//}
//
////buoc 2: ket noi
//
////nhung file ket noi.php
//include('ketnoi.php');
//
////khai bao utf-8 de hien thi tieng viet
//header('Content-Type:text/html;charset=UTF-8');
//
////buoc 3: lay du lieu
//
////lay du lieu tu file dangky.php
////$id=addslashes($_POST['id']);
//$username = addslashes($_POST['txtUsername']);
//$password = addslashes($_POST['txtPassword']);
//$email = addslashes($_POST['txtEmail']);
//$fullname = addslashes($_POST['txtFullname']);
//$birthday = addslashes($_POST['txtBirthday']);
//$sex = addslashes($_POST['txtSex']);
//
////buoc 4: validate
//
////kiem tra nguoi dung dien day du chua (validate)
//if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex) {
//    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////ma hoa mat khau
//$password = md5($password);
////hoac
////$password=password_hash($password,PASSWORD_BCRYPT);
//
////kiem tra ten dang nhap co nguoi dung chua
//if (mysqli_num_rows(mysqli_query("select username from member where username='$username'")) > 0) {
//    echo "Ten dang nhap da ton tai. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////kiem tra emai co dung dinh dang ko
//if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
//    echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////kiem tra email da duoc dang ky chua
//if (mysqli_num_rows(mysqli_query("select email from member where email='$email'")) > 0) {
//    echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////kiem tra ngay sinh
//if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday)) {
//    echo "Ngày tháng năm sinh không hợp lệ. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}
//
////buoc 5: luu thong tin vao database
//
//$addmember = mysqli_query("insert into member(username,password,email,fullname,birthday,sex)
//values ('{$username}','{$password}','{$email}','{$fullname}','{$birthday}','{$sex}')");
//
//if ($addmember){
//    echo "dang ky thanh cong.<a href='/'>Ve trang chu</a>";
//}else{
//    echo "dang ky khong thanh cong.<a href='dangky.php'>thu lai</a>";
//}


// Nếu không phải là sự kiện đăng ký thì không xử lý

if (!isset($_POST['txtUsername'])) {
    die('');
}

//Nhúng file kết nối với database
include('ketnoi.php');

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Lấy dữ liệu từ file dangky.php
$username = addslashes($_POST['txtUsername']);
$password = addslashes($_POST['txtPassword']);
$email = addslashes($_POST['txtEmail']);
$fullname = addslashes($_POST['txtFullname']);
$birthday = addslashes($_POST['txtBirthday']);
$sex = addslashes($_POST['txtSex']);

//Kiểm tra người dùng đã nhập liệu đầy đủ chưa
if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

// Mã khóa mật khẩu
$password = md5($password);
$ketnoi = mysqli_connect("localhost", "root", "", "duc");
//Kiểm tra tên đăng nhập này đã có người dùng chưa

$result1 = mysqli_query($ketnoi, "SELECT username FROM member WHERE username='$username'");
if (mysqli_num_rows($result1) > 0) {
    echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

//Kiểm tra email có đúng định dạng hay không
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)) {
    echo "Email này không hợp lệ. Vui lòng nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

//Kiểm tra email đã có người dùng chưa

$result2 = mysqli_query($ketnoi, "SELECT email FROM member WHERE email='$email'");
if (mysqli_num_rows($result2) > 0) {
    echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
//Kiểm tra dạng nhập vào của ngày sinh
//if (!preg_match("/^(0?[1-9]|1[0-2])\/(0?[1-9]|[12][0-9]|3[01])\/(19|20)?\d{2}$/", $birthday)) {
//    echo "Ngày tháng năm sinh không hợp lệ. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
//    exit;
//}

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $birthday = $_POST["txtBirthday"]; // Ngày sinh từ trường input, ví dụ: <input type="text" name="txtBirthday">
//
//    $currentDate = date("m/d/Y"); // Ngày hiện tại
//
//    // Chuyển đổi chuỗi ngày sinh và chuỗi ngày hiện tại thành đối tượng DateTime
//    $birthdayDate = DateTime::createFromFormat("m/d/Y", $birthday);
//    $currentDate = DateTime::createFromFormat("m/d/Y", $currentDate);
//
//    // Kiểm tra nếu ngày sinh lớn hơn hoặc bằng ngày hiện tại
//    if ($birthdayDate >= $currentDate) {
//        echo "Ngày tháng năm sinh không hợp lệ. Vui lòng nhập lại.";
//        exit;
//    }
//}

// ...

//Lưu thông tin thành viên vào bảng

$query = "INSERT INTO member (username, password, email, fullname, birthday, sex)
          VALUES ('$username', '$password', '$email', '$fullname', '$birthday', '$sex')";

$result3 = mysqli_query($ketnoi, $query);

if ($result3) {
    echo "Thêm thành viên thành công";
    header("Location:dangnhap.php");
    echo '</br>';
} else {
    echo "Lỗi khi thêm thành viên: " . mysqli_error($ketnoi);
}
//Thông báo quá trình lưu
if ($result3)
    echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
mysqli_close($ketnoi);
