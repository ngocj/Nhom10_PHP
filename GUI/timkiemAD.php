  <?php 
  include "../DAL/KetNoi.php";
  global $conn;
    $timkiem="";
    $timkiem=$_GET["search"];
    $sql2="SELECT * FROM tbl_admin WHERE username LIKE '%$timkiem%'";
    $query2=$conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tim kiem Ad</title>
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
      <div>
         <a href="../DAL/Add_Admin.php">
        <button class=" bg-yellow-500 w-32 h-10 rounded-lg  ">Them🐼</button>
        </a>
      </div>
      <div >
         <form method="GET" action="timkiemAD.php"  class="mx-10">
          <input type="text" class="w-48 h-10  rounded-lg border-2 " name="search" placeholder="Tim kiem....">
          <button type="submit" class="w-24 h-10 rounded-lg bg-green-400" >Tim kiem</button>
        </form>
      </div>
    </div>
 <table class="table-auto border-collapse border border-slate-400 w-4/5 text-bold" >
  <thead>
    <tr class="bg-red-300 w-40 h-14  ">
      <th>ID</th>
      <th>Username</th>
      <th>Pass</th>
      <th>Thao tac</th>     
    </tr>
  </thead>
  <tbody>
  
    <tr>
      <?php while($row=mysqli_fetch_array($query2)): ?>
      <td class="text-center"> <?= $row["id_admin"] ?> </td>
      <td class="text-center"><?= $row["username"] ?></td>
      <td class="text-center"><?= $row["pass"]?></td>
   
      <td class="text-center">
     
          <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa admin nay khong?");
        }
    </script>
        <div>
                <?php   if($row['id_admin']>1): ?>
                     <script>
                function confirmDelete() {
                    return confirm("Bạn có chắc chắn muốn xóa admin nay khong?");
                    }
                    </script>   
        <a  href="../DAL/Xoa_Admin.php?id=<?=$row['id_admin']?>">
              <button onclick="return confirmDelete()" class="bg-pink-400 w-24 hover:bg-pink-600 rounded-full"> Xoa</button>
        </a>
        <?php endif?>
        </div>
         <div>
        <a  href="../DAL/Sua_Admin.php?id=<?= $row['id_admin']?>">
              <button class="bg-green-400 w-24 hover:bg-yellow-600 rounded-full"> Sua</button>
        </a>
        </div>
      </td>   
</tr>
<?php endwhile ?>
        </table>
  </div>
   
</body>
</html>
    