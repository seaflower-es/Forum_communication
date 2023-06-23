<?php
$link=mysqli_connect("localhost:3306","root","hxm200307240693","jrlt");//建立数据库连接
if(!$link){
    die(mysqli_connect_error());//捕获数据库连接时的错误信息
}
mysqli_set_charset($link,"utf-8");
?>
