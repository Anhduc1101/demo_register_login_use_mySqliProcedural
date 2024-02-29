<?php
//addcslashes ($str, $char_list):
// Hàm này sẽ thêm dấu gạch chéo (\) đằng trước những ký tự trong chuỗi $str mà ta liệt kê ở $char_list.
echo (addcslashes('freetuts.net FREETUTS.NET', 'a..zA..Z'));
// kết quả: \f\r\e\e\t\u\t\s.\n\e\t \F\R\E\E\T\U\T\S.\N\E\T
echo '<br/>';
echo (addcslashes('freetuts.net FREETUTS.NET', 'a..z'));
// kết quả: \f\r\e\e\t\u\t\s.\n\e\t FREETUTS.NET
echo '<br/>';


//<--!-->
// addslashes():
// Hàm này sẽ thêm dấu gách chéo trước những ký tự (‘, “, \) trong chuỗi $str.
echo addslashes ("Freetuts's a website learning online");
//Kết quả: Freetuts\'s a website learning online
echo '<br/>';

//stripslashes ($str)
//Hàm này ngược với hàm addslashes, nó xóa các ký tự \ trong chuỗi $str.
echo stripslashes("\Mot so ha\m \ 'xu ly chuoi' trong P\HP");
// kết quả: Mot so ham 'xu ly chuoi' trong PHP
echo '<br/>';


//crc32 ( $str )
//Hàm này sẽ chuyển chuỗi $str thành một dãy số nguyên
echo crc32 ('freetuts.net');
// kết quả: 3456323236
?>
