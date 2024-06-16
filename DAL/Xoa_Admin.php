<?php
include "KetNoi.php";
global $conn;
$id=(int)$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id_admin='$id'";
$query=$conn->query($sql);
    if($query){
        header("location:../GUI/Admin.php");
    }
?>