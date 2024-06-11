<?php
include "KetNoi.php";
global $conn;
$id=$_GET['id'];
$sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id'";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);

$ten_sp="";$ma_sp="";$gia_sp="";$soluong="";$hinhanh="";$tomtat="";$noidung="";$id_danhmuc="";$trangthai="";$errors=array();
if(isset($_POST['btnEdit'])){
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
    }else {
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_path);        
        }  
    }
}
if($gia_sp>0&&$soluong>=0&&!empty($ten_sp) && $id_danhmuc>0&& $trangthai>=0 &&empty($errors)&& !empty($ma_sp)&& !empty($tomtat)&& !empty($noidung)){
$sql2="UPDATE tbl_sanpham SET
        tensanpham='$ten_sp', masanpham='$ma_sp', giasanpham='$gia_sp' ,soluong='$soluong', hinhanh='$hinhanh',
        tomtat='$tomtat', noidung='$noidung', id_danhmuc='$id_danhmuc', trangthai='$trangthai' WHERE id_sanpham='$id' ";
 $query2=$conn->query($sql2);
 if($query2){
    echo "Update thanh cong";
    header("location:../GUI/ADsanpham.php");
 } 
}                         

?>
<style>
    tr{
        height:60px;
    }
    .text{
        font-weight: bold;
        font-size: 2xl;
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
    <title>SuaSP</title>   
</head>
<body>
    <h2>Trang sua san pham</h2>
    <a href="../GUI/ADsanpham.php">Quay lai trang truoc</a>
    <form method="POST" action="" enctype="multipart/form-data">
    <table border="1" class="" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text">Ten san pham</td>
        <td>
            <input type="text" name="tensp" value="<?php echo $row["tensanpham"] ?>">
        </td>
    </tr>

     <tr>
        <td  class="text">Ma san pham</td>
        <td>
              <input type="text" name="masp" value="<?php echo $row["masanpham"] ?>" >
        </td>
    </tr>

     <tr>
        <td  class="text">Gia san pham</td>
        <td>
              <input type="number" min=1 name="giasp" value="<?php echo $row["giasanpham"] ?>">
        </td>
    </tr>
     <tr>
        <td  class="text">
            So luong
        </td>
        <td>
            <input type="number" min=-1 name="soluong" value="<?php echo $row["soluong"] ?>">
        </td>
    </tr>
     <tr>
        <td  class="text">Hinh anh</td>
        <td>
            <img style="width:130px;height:120px" src="../GUI/images/<?= $row['hinhanh'] ?>">
            <br>
            <input type="file" name="hinhanh" >
            <span>
                <?php foreach($errors as $item){ echo "<p style='color:red'>$item</p>";}?>
            </span>
        </td>
    </tr>
     <tr>
        <td  class="text">Tom tat</td>
        <td>
              <input type="text" name="tomtat" value="<?php echo $row["tomtat"]?>">
        </td>
    </tr>
     <tr class="nd">
        <td  class="text">Noi dung</td>
        <td>
             <input class="ind" type="textarea" name="noidung" value="<?php echo $row["noidung"]?>">
        </td>
    </tr>
     <tr>
        <td  class="text">ID danh muc</td>
        <td>
              <!-- <input type="text" name="IDdanhmuc" value="<?php echo $row["id_danhmuc"]?>"> -->
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
        <td  class="text">Trang thai</td>
        <td>
    <select name="trangthai">
        <option value="1">Bat</option>
        <option value="0">Tat</option>
    </select>
        </td>
    </tr>
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;" type="submit" name="btnEdit" value="Sua sp">
        </td>
    </tr>
    </table>
</form>


</body>
</html>

