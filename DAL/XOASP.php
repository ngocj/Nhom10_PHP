<?php 
include "KetNoi.php";
global $conn;

$id=(int)$_GET["id"];
$sql="DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'";
$query=$conn->query($sql);
if($query){
 
 header("location:../GUI/ADsanpham.php");
}

?>