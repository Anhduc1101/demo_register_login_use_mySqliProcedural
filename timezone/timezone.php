<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timezone = DateTimeZone::listIdentifiers();
//foreach ($timezone as $item){
//    echo $item."<br/>";
//}
echo date('D/M/Y H:i:s');
echo '<br/>';
echo date('\B\â\y \g\i\ờ \l\à H \g\i\ờ');
echo '<br/>';

$dateInt=mktime(0,0,0,2+11,28,2024);
echo date('d/m/y',$dateInt);