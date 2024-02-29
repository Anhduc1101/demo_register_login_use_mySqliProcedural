<?php
session_start();

// Lấy danh sach sinh viên trong session
function getAllStudents()
{
    return isset($_SESSION['students']) ? $_SESSION['students'] : array();
}

// Lấy chi tiết một sinh viên dựa vào sinh viên id
function getStudent($student_id)
{
    // Lấy danh sách sinh viên để tìm
    $students = getAllStudents();

    // Duyệt qua từng phần tử, nếu xuất hiện ID giống nhau thì tức là đã tìm thấy sinh viên
    foreach ($students as $item)
    {
        if ($item['student_id'] == $student_id){
            return $item;
        }
    }

    return array();
}

// Xóa sinh viên bởi sinh viên ID
function deleteStudent($student_id)
{
    // Lấy danh sách sinh viên để tìm
    $students = getAllStudents();

    /// Duyệt qua từng phần tử, nếu xuất hiện ID giống nhau thì tức là đã tìm thấy sinh viên
    foreach ($students as $key => $item)
    {
        // Đã tìm thấy thì dùng hàm unset để xóa
        if ($item['student_id'] == $student_id){
            unset($students[$key]);
        }
    }
//c2: dung ham array_filter()
//function deleteByStudentId($id)
//{
//    $students = getAllStudents();
//    $students = array_filter($students, function($student) use ($id) {
//        return $student['studentId'] != $id;
//    });
//}

    // Cập nhật lại Session
    $_SESSION['students'] = $students;

    return $students;
}

// Hàm thêm và sửa sinh viên
function saveOrUpdate($student_id, $student_name, $student_email)
{
    // Lấy danh sách sinh viên
    $students = getAllStudents();

    // Khai báo cấu trúc lưu trữ một sinh viên
    $new_student = array(
        'student_id' => $student_id,
        'student_name' => $student_name,
        'student_email' => $student_email
    );

    // Trường hợp update
    $is_update_action = false;
    foreach ($students as $key => $item)
    {
        if ($item['student_id'] == $student_id){
            $students[$key] = $new_student;
            $is_update_action = true; // khai báo đây là action update
        }
    }

    // Trường hợp add, tứ là $is_update_action = false
    if (!$is_update_action){
        $students[] = $new_student;
    }

    // Cập nhật dữ liệu trong Session
    $_SESSION['students'] = $students;

    return $students;
}
// Hàm thêm sinh viên
function addStudent($student_id, $student_name, $student_email)
{
    // Lấy danh sách sinh viên
    global $students;

    // Khai báo cấu trúc lưu trữ một sinh viên
    $new_student = array(
        'student_id' => $student_id,
        'student_name' => $student_name,
        'student_email' => $student_email
    );

    // Thêm sinh viên vào danh sách
    $students[] = $new_student;

    // Cập nhật dữ liệu trong Session
    $_SESSION['students'] = $students;

    return $students;
}

// Hàm sửa sinh viên
function updateStudent($student_id, $student_name, $student_email)
{
    // Lấy danh sách sinh viên
    global $students;

    // Khai báo cấu trúc lưu trữ một sinh viên
    $new_student = array(
        'student_id' => $student_id,
        'student_name' => $student_name,
        'student_email' => $student_email
    );

    // Tìm sinh viên cần sửa và cập nhật thông tin
    foreach ($students as $key => $item) {
        if ($item['student_id'] == $student_id) {
            $students[$key] = $new_student;
            break;
        }
    }
    // Cập nhật dữ liệu trong Session
    $_SESSION['students'] = $students;
//    tra ve mang
    return $students;
}

