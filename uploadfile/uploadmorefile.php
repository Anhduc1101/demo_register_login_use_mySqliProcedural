<!-- upload n file-->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="avatar[]" multiple/>
    <input type="submit" name="uploadclick" value="Upload"/>
</form>
<?php // Xử Lý Upload
// Nếu người dùng click Upload
if (isset($_POST['uploadclick']))
{
    // Nếu người dùng có chọn file để upload
    if (isset($_FILES['avatar']))
    {
        $fileCount = count($_FILES['avatar']['size']);
        for ($i = 0; $i < $fileCount; $i++) {
            // Nếu file upload không bị lỗi, tức là thuộc tính error > 0
            if ($_FILES['avatar']['error'][$i] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['avatar']['tmp_name'][$i], './upload/'.$_FILES['avatar']['name'][$i]);
                echo 'File Uploaded: '.$_FILES['avatar']['name'][$i].'<br>';
            }
        }
    }
    else{
        echo 'Bạn chưa chọn file upload';
    }
}
?>
</body>
</html>
