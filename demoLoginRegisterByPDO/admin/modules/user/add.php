<?php if (!defined('IN_SITE')) die ('The request not found'); ?>

<?php
// Kiểm tra quyền, nếu không có quyền thì chuyển nó về trang logout
if (!is_admin()){
    redirect(base_url('admin'), array('m' => 'common', 'a' => 'logout'));
}
?>

<?php
// Biến chứa lỗi
$error = array();

// VI TRI 1: CODE SUBMIT FORM
?>

<?php include_once('..\..\widgets\header.php'); ?>

<h1>Thêm thành viên</h1>

<div class="controls">
    <a class="button" onclick="$('#main-form').submit()" href="#">Lưu</a>
    <a class="button" href="<?php echo create_link(base_url('admin'), array('m' => 'user', 'a' => 'list')); ?>">Trở về</a>
</div>

<form id="main-form" method="post" action="<?php echo create_link(base_url('admin/index.php'), array('m' => 'user', 'a' => 'add')); ?>">
    <input type="hidden" name="request_name" value="add_user"/>
    <table cellspacing="0" cellpadding="0" class="form">
        <tr>
            <td width="200px">Tên đăng nhập</td>
            <td>
                <input type="text" name="username" value="<?php echo input_post('username'); ?>" />
                <?php show_error($error, 'username'); ?>
            </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td>
                <input type="password" name="password" value="<?php echo input_post('password'); ?>" />
                <?php show_error($error, 'password'); ?>
            </td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu</td>
            <td>
                <input type="password" name="re-password" value="<?php echo input_post('re-password'); ?>" />
                <?php show_error($error, 're-password'); ?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email" value="<?php echo input_post('email'); ?>" class="long" />
                <?php show_error($error, 'email'); ?>
            </td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td>
                <input type="text" name="fullname" value="<?php echo input_post('fullname'); ?>" class="long" />
                <?php show_error($error, 'fullname'); ?>
            </td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <select name="level">
                    <option value="">-- Chọn Level --</option>
                    <option value="1" <?php echo (input_post('level') == 1) ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo (input_post('level') == 2) ? 'selected' : ''; ?>>Member</option>
                </select>
                <?php show_error($error, 'level'); ?>
            </td>
        </tr>
    </table>
</form>

<?php include_once('..\..\widgets\footer.php'); ?>
