<?php
//$ketnoi['host'] = 'localhost';
//$ketnoi['dbname'] = 'duc';
//$ketnoi['username'] = 'root';
//$ketnoi['password'] = '123456';
//
//@mysqli_connect($ketnoi['host'], $ketnoi['username'], $ketnoi['password'])
//or die("khong the ket noi database");
//@mysqli_select_db($ketnoi['dbname'])
//or die("khong the chon database");



//$ketnoi['host'] = 'localhost'; //Tên server, nếu dùng hosting free thì cần thay đổi
//$ketnoi['dbname'] = 'duc'; //Đây là tên của Database
//$ketnoi['username'] = 'root'; //Tên sử dụng Database
//$ketnoi['password'] = '';//Mật khẩu của tên sử dụng Database
//@mysqli_connect(
//    "{$ketnoi['host']}",
//    "{$ketnoi['username']}",
//    "{$ketnoi['password']}")
//or
//die("Không thể kết nối database");
//@mysqli_select_db($ketnoi,$ketnoi['dbname'])
//or
//die("Không thể chọn database");

$ketnoi = mysqli_connect('localhost', 'root', '', 'duc');
if (!$ketnoi) {
    die("Không thể kết nối database: " . mysqli_connect_error());
}
mysqli_select_db($ketnoi, 'duc') or die("Không thể chọn database");
mysqli_close($ketnoi); // Đóng kết nối sau khi hoàn thành
?>