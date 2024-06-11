<?php
include "KetNoi.php";
global $conn;

$ten_sp="";
$ma_sp="";
$gia_sp="";
$soluong="";
$hinhanh="";
$tomtat="";
$noidung="";
$id_danhmuc="";
$trangthai="";
if(isset($_POST['btnAdd'])){
    $ten_sp=$_POST['tensp'];
    $ma_sp=$_POST['masp'];
    $gia_sp=(float)$_POST['giasp'];
    $soluong=(int)$_POST['soluong'];
    $tomtat=$_POST['tomtat'];
    $noidung=$_POST['noidung'];
    $id_danhmuc=(int)$_POST['IDdanhmuc'];
    $trangthai=$_POST['trangthai'];
   if(isset($_FILES['hinhanh'])){
    if($_FILES['hinhanh']['size']==0){
        echo "<p>Ban chua chon hinh anh</p>";
    }else{
        $hinhanh=$_FILES['hinhanh']['name'];
        move_uploaded_file($_FILES['hinhanh']['tmp_name'],'../GUI/images/'.$_FILES['hinhanh']['name']);
    }

   }
   
}

if($gia_sp>0&&$soluong>0&&!empty($ten_sp) && $id_danhmuc>0&& $trangthai>=0 && !empty($hinhanh) && !empty($ma_sp)&& !empty($tomtat)&& !empty($noidung)&& !empty($trangthai)){
$sql="INSERT INTO tbl_sanpham VALUES('','$ten_sp','$ma_sp','$gia_sp','$soluong','$hinhanh','$tomtat','$noidung','$id_danhmuc','$trangthai')";
$query=$conn->query($sql);
if($query){
    header("location:../GUI/ADsanpham.php");
}
}


?>
<style>
    tr{
        height:60px;
    }
    .nd{
        height:100px;
    }
    .ind{
        height:100px;
    }
    input{    
        padding: 5px;
        width:100%;
        height:60px;
        border: none;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
    <table border="1" class="" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text-2xl">Ten san pham</td>
        <td>
            <input type="text" name="tensp" >
        </td>
    </tr>

     <tr>
        <td>Ma san pham</td>
        <td>
              <input type="text" name="masp" >
        </td>
    </tr>

     <tr>
        <td>Gia san pham</td>
        <td>
              <input type="text" name="giasp" >
        </td>
    </tr>
     <tr>
        <td>
            So luong
        </td>
        <td>
            <input type="text" name="soluong" >
        </td>
    </tr>
     <tr>
        <td>Hinh anh</td>
        <td>
            <input type="file" name="hinhanh">
        </td>
    </tr>
     <tr>
        <td>Tom tat</td>
        <td>
              <input type="text" name="tomtat" >
        </td>
    </tr>
     <tr class="nd">
        <td>Noi dung</td>
        <td>
             <input class="ind" type="textarea" name="noidung" >
        </td>
    </tr>
     <tr>
        <td>ID danh muc</td>
        <td>
              <input type="text" name="IDdanhmuc" >
        </td>
    </tr>
     <tr>
        <td>Trang thai</td>
        <td>
             <input type="number" name="trangthai" >
        </td>
    </tr>
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;" type="submit" name="btnAdd" value="Them sp">
        </td>
    </tr>
    </table>
</form>


</body>
</html>
