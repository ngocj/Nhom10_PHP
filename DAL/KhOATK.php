<?php 
include "KetNoi.php";
global $conn;
$id=(int)$_GET["id"];
$tt=null;
$sql1="SELECT chucvu  FROM tbl_dangky WHERE id_khachhang = '$id'";
$query1=$conn->query($sql1);
$row=mysqli_fetch_array($query1);
if((int)$row['chucvu']==1){
$tt=0;
}else{
    $tt=1;
}

$sql="UPDATE tbl_dangky SET chucvu=$tt WHERE id_khachhang= '$id'";
$query=$conn->query($sql);
if($query){
     header("location:../GUI/ADtaikhoan.php");
}