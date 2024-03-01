<?php
// Hàm thiết lập là đã đăng nhập sẽ lưu hai thông tin là tên đăng nhập và cấp độ.
//  Để lưu thông tin người dùng thì ta phải sử dụng đến thư viện Session lưu với key là ss_user_token
function set_logged($username, $level){
    session_set('ss_user_token', array(
        'username' => $username,
        'level' => $level
    ));
}


// Hàm thiết lập đăng xuất
// Để thiết lập đăng xuất ta chỉ việc sử dụng Session để xóa đi key ss_user_token.
function set_logout(){
    session_delete('ss_user_token');
}


// Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
// Để kiểm tra trạng thái đăng nhập thì ta sẽ kiểm tra giá trị Session của key ss_user_token có tồn tại hay không.
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
}


// Hàm kiểm tra có phải là admin hay không
// Để kiểm tra người dùng có phải là admin hay không thì ta kiểm tra level nếu bằng 1 là admin và ngược lại không phải là admin.
function is_admin(){
    $user  = is_logged();
    if (!empty($user['level']) && $user['level'] == '1'){
        return true;
    }
    return false;
}

// Lấy username người dùng hiện tại
function get_current_username(){
    $user  = is_logged();
    return isset($user['username']) ? $user['username'] : '';
}

// Lấy level người dùng hiện tại
function get_current_level(){
    $user  = is_logged();
    return isset($user['level']) ? $user['level'] : '';
}

// Hàm kiểm tra là supper admin
function is_supper_admin(){
    $user = is_logged();
    if (!empty($user['level']) && $user['level'] == '1' && $user['username'] == 'Admin'){
        return true;
    }
    false;
}