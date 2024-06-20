<?php 
include "../../DAL/KetNoi.php";
global $conn;

$id="";
$id=$_GET['id'];
$sql="DELETE FROM tbl_giohang WHERE id_cart='$id'";
$query=$conn->query($sql);
if($query){
    header("location:GioHang.php?id=$id");
}



?>