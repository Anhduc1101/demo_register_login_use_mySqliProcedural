<?php
//$_GET = array('id' => '12', 'title' => 'method_get');
////check tồn tại
////lấy id
//if (isset($_GET['id'])) {
//    $id = $_GET['id'];
//}
////lấy tittle
//if (isset($_GET['title'])){
//$title = $_GET['title'];
//}
//
////echo "dữ liệu nhận được là: ";
//$result = "dữ liệu nhận được là: ";
//foreach ($_GET as $key => $val) {
//    $result .= $key . ' => ' . $val . ', ';
////    echo $key . ' => ' . $val . ', ';
//
//}
//$result = rtrim($result, ', ') . '.';
//echo $result;
//

?>

<!--ứng dụng tìm tuổi dựa trên năm sinh-->
<h1> ứng dụng tìm tuổi dựa vào năm sinh</h1>
<form method="get">
    <input type="text" name="year" placeholder="input year">
    <input type="submit" name="btn" value="search">
</form>
<?php
if (!empty($_GET['btn'])){
//    b1: lay thong tin nhap vao
    $year=isset($_GET['year'])?(int)$_GET['year']:0;
//    b2: lay nam hien tai
    $curYear=date('Y');
//    b3: check nam sinh hop le hay ko? neu ko thi thong bao
    if ($year>$curYear){
        echo 'nam sinh ko the lon hon nam hien tai';
    }elseif ($year<=0){
        echo 'nam sinh ban nhap vao khong hop le';
    }else{
        echo "so tuoi cua ban la: ".($curYear-$year);
    }
}

