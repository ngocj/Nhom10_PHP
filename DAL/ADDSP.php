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
$errors = array(); 
if(isset($_POST['btnAdd'])){
    $ten_sp=$_POST['tensp'];
    $ma_sp=$_POST['masp'];
    $gia_sp=(float)$_POST['giasp'];
    $soluong=(int)$_POST['soluong'];
    $tomtat=$_POST['tomtat'];
    $noidung=$_POST['noidung'];
    $id_danhmuc=(int)$_POST['id_danhmuc'];
    $trangthai=(int)$_POST['trangthai'];
  if(isset($_FILES['hinhanh'])){
      $hinhanh=$_FILES['hinhanh']['name'];
      $target_path = '../GUI/images/'.$hinhanh;
    if($_FILES['hinhanh']['size']==0){
         $errors[] = "Bạn chưa chọn hình ảnh"; 
    } else if (file_exists($target_path)) {
        $errors[] = "Hình ảnh đã tồn tại";
    } else {
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_path);        
        }  
    }

   }
   
if($gia_sp>0&&$soluong>=0&&!empty($ten_sp) && $id_danhmuc>0&& $trangthai>-1 && empty($errors) && !empty($ma_sp)&& !empty($tomtat)&& !empty($noidung)){
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
       <h2>Trang them san pham moi</h2>
    <a href="../GUI/ADsanpham.php">Quay lai trang truoc</a>
    <form method="POST" action="" enctype="multipart/form-data" >
    <table border="1" style="width: 600px;margin: 5px auto;text-align: center;">
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
              <input type="number" min=1 name="giasp" >
        </td>
    </tr>
     <tr>
        <td>
            So luong
        </td>
        <td>
            <input type="number" min=1 name="soluong" >
        </td>
    </tr>
     <tr>
        <td>Hinh anh</td>
        <td>
            <input type="file" name="hinhanh">
            <span><?php foreach($errors as $item ){ echo "<p style='color:red'>$item</p>";} ?></span>
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
        <<td>
            
               <select name="id_danhmuc" style="width:80%;height:50px">
                <?php
                $sql3="SELECT * FROM tbl_danhmuc";
                $query3=$conn->query($sql3);
                while($row3=mysqli_fetch_array($query3)){
                    ?>
                    <option value="<?= $row3['id_danhmuc']?>"> <?= $row3['id_danhmuc']?> - <?= $row3['tendanhmuc']?> </option>
               <?php } ?>
                             
               </select>
        </td>
    </tr>
     <tr>
        <td>Trang thai</td>
        <td>
      <select name="trangthai" style="width:60%;height:50px">
        <option value="1">Bat</option>
        <option value="0">Tat</option>
      </select>
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
