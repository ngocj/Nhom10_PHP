<?php
include "KetNoi.php";
global $conn;
$name="";
$pass="";
if(isset($_POST['btnAdd'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];
}

if(!empty($name)&&!empty($pass)){
    $sql="INSERT INTO tbl_admin VALUES ('','$name','$pass')";
    $query=$conn->query($sql);
    if($query){
        header("location:../GUI/Admin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang them Admin</title>
    
</head>
<body>
       <h2>Trang them Admin</h2>
    <a href="../GUI/Admin.php">Quay lai trang truoc</a>
    <form method="POST" action=""  >
    <table border="1" style="width: 600px;margin: 5px auto;text-align: center;">
    <tr>
        <td class="text-2xl">Username</td>
        <td>
            <input type="text" name="name" >
        </td>
    </tr>

     <tr>
        <td>Password</td>
        <td>
              <input type="text" min=1 name="pass" >
        </td>
    </tr>
       
     <tr>    
        <td colspan="2" >
            <input style="background-color: yellow;font-weight: bold;cursor:pointer;padding: 5px" type="submit" name="btnAdd" value="Them admin">
        </td>
    </tr>
    </table>
</form>
</body>
</html>
