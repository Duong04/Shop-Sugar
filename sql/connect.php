<?php 
$conn = mysqli_connect('localhost','root','','QLSHOPSUGAR');
mysqli_set_charset($conn,'utf8');
if(!$conn) {
    die('Kết nối db thất bại');
}
?>