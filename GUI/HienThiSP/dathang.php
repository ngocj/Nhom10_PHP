<?php 
include "../../DAL/KetNoi.php";
global $conn;
 $sql="DELETE FROM tbl_giohang ";
 $query=$conn->query($sql);
 if($query)
 {
   header("location:main.php");
 }



?>