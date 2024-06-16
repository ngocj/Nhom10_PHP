<?php
include "KetNoi.php";
global $conn;
$id=(int)$_GET['id'];
$sql="SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$id'";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);
$ten_dm="";
$thutu="";
if(isset($_POST['btnEdit'])){
    $ten_dm=$_POST['tendm'];
    $thutu=(int)$_POST['thutu'];
}

if($thutu>0){
    $sql1="UPDATE tbl_danhmuc set tendanhmuc='$ten_dm', thutu='$thutu' WHERE id_danhmuc='$id'";
    $query1=$conn->query($sql1);
    if($query1){
        header("location:../GUI/ADdanhmuc.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sua danh muc</title>
    
</head>
<body>
       <h2>Trang sua danh muc</h2>
    <a href="../GUI/ADdanhmuc.php">Quay lai trang truoc</a>
    <form method="POST" action="" enctype="multipart/form-data" >
    <table border="1" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text-2xl">Ten danh muc</td>
        <td>
            <input type="text" name="tendm" value="<?=  $row['tendanhmuc']  ?>">
        </td>
    </tr>

     <tr>
        <td>Thu tu</td>
        <td>
              <input type="number" min=1 name="thutu" value="<?=  $row['thutu']  ?>">
        </td>
    </tr>
       
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;padding: 5px" type="submit" name="btnEdit" value="Sua danh muc">
        </td>
    </tr>
    </table>
</form>
</body>
</html>
