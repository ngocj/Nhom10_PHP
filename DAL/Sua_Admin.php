<?php
include "KetNoi.php";
global $conn;
$id=(int)$_GET['id'];
$sql="SELECT * FROM tbl_admin WHERE id_admin='$id'";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);
$name="";
$pass="";
if(isset($_POST['btnEdit'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
}

if(!empty($name)&&!empty($pass)){
    $sql2="UPDATE  tbl_admin SET username='$name' ,pass='$pass' WHERE id_admin='$id'";
    $query2=$conn->query($sql2);
    if($query2){
        header("location:../GUI/Admin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sua tk Admin</title>
    
</head>
<body>
       <h2>Trang sua tai khoan Admin</h2>
    <a href="../GUI/Admin.php">Quay lai trang truoc</a>
    <form method="POST" action=""  >
    <table border="1" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text-2xl">Username</td>
        <td>
            <input type="text" name="name" value="<?= $row['username']?>">
        </td>
    </tr>

     <tr>
        <td>Password</td>
        <td>
              <input type="text" name="pass" value="<?= $row['pass']?>">
        </td>
    </tr>
       
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;padding: 5px" type="submit" name="btnEdit" value="Sua admin">
        </td>
    </tr>
    </table>
</form>
</body>
</html>
