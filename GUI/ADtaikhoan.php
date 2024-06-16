<?php 
include "../DAL/KetNoi.php";
global $conn;
$sql="SELECT * FROM tbl_dangky";
$query=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan tri tai khoan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <style>
    table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
    }
    .thaotac{
      width:80%;
      height:50px;
      display: flex;
      justify-content:space-between;
    }
  </style>
  <?php
  include "Quantri2.php";
  ?>
  <div class="container mx-32">
    <div class="thaotac">
      
      <div >
         <form method="GET" action="timkiemtk.php"  class="mx-10">
          <input type="text" class="w-48 h-10  rounded-lg border-2 " name="search" placeholder="Tim kiem tai khoan....">
          <button type="submit" class="w-24 h-10 rounded-lg bg-green-400" >Tim kiem</button>
        </form>
      </div>
    </div>
 <table class="table-auto border-collapse border border-slate-400 w-4/5 text-bold" >
  <thead>
    <tr class="bg-red-300 w-40 h-14  ">
      <th>ID</th>
      <th>Tai khoan</th>
      <th>Email khach hang</th>
      <th>Mat khau</th>
      <th>Trang thai</th>
      <th>Thao tac</th>     
    </tr>
  </thead>
  <tbody>
  
    <tr>
      <?php while($row=mysqli_fetch_array($query)): ?>
    <td class="text-center"> <?= $row["id_khachhang"] ?> </td>
    <td class="text-center"><?= $row["taikhoan"] ?></td>
    <td class="text-center"><?= $row["email"]?></td>
    <td class="text-center"><?= $row["matkhau"]?></td>
    <td class="text-center"><?php  $trangthai=$row["chucvu"]==1?"<button class='w-24 bg-green-500 rounded-xl'>Active</button> ":"<button class='w-24 bg-gray-500 rounded-xl'>Disable</button>" ; echo $trangthai;   ?></td>
   
      <td class="text-center">
     
          <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn khoa tai khoa nay khong?");
        }
        </script>
        <div>
        <a  href="../DAL/KhOATK.php?id=<?= $row['id_khachhang']?>">
              <button onclick="return confirmDelete()" class="bg-pink-400 w-24 hover:bg-pink-600 rounded-full"> 
               <?php  $ac=$row['chucvu']==1?"Khoa":"Mo Khoa"; echo $ac;  ?>
              </button>
        </a>
        </div>
         <div>
        <a  href="../BLL/xemkh.php?id=<?= $row['id_khachhang']?>">
              <button class="bg-green-400 w-24 hover:bg-yellow-600 rounded-full"> Xem chi tiet</button>
        </a>
        </div>
        

      </td>   
</tr>
<?php endwhile ?>
        </table>
  </div>
   
</body>
</html>