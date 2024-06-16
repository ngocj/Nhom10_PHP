<?php
include "KetNoi.php";
global $conn;
$ten_dm="";
$thutu="";
if(isset($_POST['btnAdd'])){
    $ten_dm=$_POST['tendm'];
    $thutu=(int)$_POST['thutu'];
}

if($thutu>0){
    $sql="INSERT INTO tbl_danhmuc VALUES ('','$ten_dm','$thutu')";
    $query=$conn->query($sql);
    if($query){
        header("location:../GUI/ADdanhmuc.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang them danh muc</title>
    
</head>
<body>
       <h2>Trang them danh muc</h2>
    <a href="../GUI/ADdanhmuc.php">Quay lai trang truoc</a>
    <form method="POST" action="" enctype="multipart/form-data" >
    <table border="1" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text-2xl">Ten danh muc</td>
        <td>
            <input type="text" name="tendm" >
        </td>
    </tr>

     <tr>
        <td>Thu tu</td>
        <td>
              <input type="number" min=1 name="thutu" >
        </td>
    </tr>
       
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;padding: 5px" type="submit" name="btnAdd" value="Them danh muc">
        </td>
    </tr>
    </table>
</form>
</body>
</html>
