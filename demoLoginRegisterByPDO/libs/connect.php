<?php
// bien luu tru ket noi
$conn = null;

//ham ket noi
function db_connect()
{
    global $conn;
//    Để tránh trường hợp hàm này bị gọi nhiều lần sẽ dẫn đến kết nối nhiều lần thì ta sẽ kiểm tra nó đã được kết nối chưa rồi mới tiến hành kết nối.
    if (!$conn) {
        $host = "localhost";
        $username = "username";
        $password = "password";
        try {
            $conn = new PDO("mysql:host=$host;dbname=duc", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully! ";
        } catch (PDOException $e) {
            die('Connected failed' . $e->getMessage());
        }
    }
}

// ham dong ket noi
function db_close()
{
    global $conn;
//    Trước khi ngắt kết nối ta phải kiểm tra nó đã kết nối chưa, nếu chưa thì không cần thực hiện thao tác này.
    if ($conn) {
        $conn = null;
    }
}

// Hàm lấy danh sách, kết quả trả về danh sách các record trong một mảng
function db_get_list($sql){
    db_connect();
    global $conn;
    $data=array();
    $result=$conn->query($sql);
    while ($row=$result->fetch(PDO::FETCH_ASSOC)){
        $data[]=$row;
    }
    return $data;
}

//Hàm lấy chi tiết, dùng select theo ID vì nó trả về 1 record
function db_get_row($sql){
    db_connect();
    global $conn;
    $result=$conn->query($sql);
    $row=array();
    if ($result->rowCount()>0){
        $row=$result->fetch(PDO::FETCH_ASSOC);
    }
    return $row;
}

// Hàm thực thi câu truy  vấn insert, update, delete
function db_execute($sql){
    db_connect();
    global $conn;
    return $conn->query($sql);
}