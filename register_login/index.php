<?php
// Nhánh kết nối thành công
try {
    // Kết nối
    $conn = new PDO("mysql:host=localhost;dbname=duc", 'root', '');

    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thiết lập bộ mã ký tự "utf8"
    $conn->exec("SET NAMES utf8");

    // Thông báo thành công
    echo "Kết nối thành công";
}
// Nhánh kết nối thất bại
catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Register Form</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_POST["register"])){
    $user_name = $_POST["user_name"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $name = $_POST["full_name"];
    //kiểm tra xem 2 mật khẩu có giống nhau hay không:
    if($pass1 != $pass2){
        header("location:index.php?page=register");
        setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
    }
    else{
        $pass = md5($pass1);
        $query = "INSERT INTO user (user_name, password, full_name) VALUES (:user_name, :password, :full_name)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':full_name', $full_name);

        $stmt->execute();

        header("location:index.php?page=register");
        setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
    }
}

?>

<div class="container">
    <div class="row">
        <a href="index.php?page=register" class="btn btn-success">Đăng ký</a>
        <a href="index.php" class="btn btn-info">Trang chủ</a>
    </div>

    <div class="row">
        <!-- start nếu xảy ra lỗi thì hiện thông báo: -->
        <?php
        if(isset($_COOKIE["error"])){
            ?>
            <div class="alert alert-danger">
                <strong>Có lỗi!</strong> <?php echo $_COOKIE["error"]; ?>
            </div>
        <?php } ?>
        <!-- end nếu xảy ra lỗi thì hiện thông báo: -->


        <!-- start nếu thành công thì hiện thông báo: -->
        <?php
        if(isset($_COOKIE["success"])){
            ?>
            <div class="alert alert-success">
                <strong>Chúc mừng!</strong> <?php echo $_COOKIE["success"]; ?>
            </div>
        <?php } ?>
        <!-- end nếu thành công thì hiện thông báo: -->

        <?php
        if(isset($_GET["page"]) && $_GET["page"] == "register")
            include "register.php";
        ?>
    </div>

</div>


</body>
</html>
