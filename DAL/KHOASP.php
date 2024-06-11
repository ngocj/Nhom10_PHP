<?php 
include "KetNoi.php";
global $conn;
$id=(int)$_GET["id"];
$tt=null;
$sql1="SELECT trangthai  FROM tbl_sanpham WHERE id_sanpham = '$id'";
$query1=$conn->query($sql1);
$row=mysqli_fetch_array($query1);
if((int)$row['trangthai']==1){
$tt=0;
}else{
    $tt=1;
}

$sql="UPDATE tbl_sanpham SET trangthai=$tt WHERE id_sanpham = '$id'";
$query=$conn->query($sql);
if($query){
     header("location:../GUI/ADsanpham.php");
}






?>