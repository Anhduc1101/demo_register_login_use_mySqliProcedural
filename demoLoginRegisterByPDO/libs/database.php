<?php
// Hàm tạo câu truy vấn có thêm điều kiện Where
function db_create_sql($sql, $filter = array())
{
    // Chuỗi where
    $where = '';

    // Lặp qua biến $filter và bổ sung vào $where
    foreach ($filter as $field => $value){
        if ($value != ''){
            $value = addslashes($value);
            $where .= "AND $field = '$value', ";
        }
    }

    // Remove chữ AND ở đầu
    $where = trim($where, 'AND');
    // Remove ký tự , ở cuối
    $where = trim($where, ', ');

    // Nếu có điều kiện where thì nối chuỗi
    if ($where){
        $where = ' WHERE '.$where;
    }

    // Return về câu truy vấn
    return str_replace('{where}', $where, $sql);
}

// Hàm insert dữ liệu vào table
function db_insert($table, $data = array())
{
    // Hai biến danh sách fields và values
    $fields = '';
    $values = '';

    // Lặp mảng dữ liệu để nối chuỗi
    foreach ($data as $field => $value){
        $fields .= $field .',';
        $values .= "'".addslashes($value)."',";
    }

    // Xóa ký từ , ở cuối chuỗi
    $fields = trim($fields, ',');
    $values = trim($values, ',');

    // Tạo câu SQL
    $sql = "INSERT INTO {$table}($fields) VALUES ({$values})";

    // Thực hiện INSERT
    return db_execute($sql);
}