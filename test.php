<?php
$d1=date("d-m-Y");
echo $d1;
 $d2=date("d-m-Y",strtotime("19-05-2022"));
echo"<br>";
echo $d2;
if($d1<$d2){
    echo"supppp";
}
?>