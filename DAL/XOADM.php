<?php
include "KetNoi.php";
global $conn;
$id=(int)$_GET['id'];
$sql="DELETE FROM tbl_danhmuc WHERE id_danhmuc='$id'";
$query=$conn->query($sql);

if($query){
     
    header("location:../GUI/ADdanhmuc.php");
}

?>