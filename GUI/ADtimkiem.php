  <?php 
  include "../DAL/KetNoi.php";
  global $conn;
    $timkiem="";
    $timkiem=$_GET["search"];
    $sql2="SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%$timkiem%'";
    $query2=$conn->query($sql2);
?>
   <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
              .boss_tt{
              display: flex;
              justify-content: space-around;
              width:80%;
              height:60px;
            }
    </style>
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tim kiem san pham</title>
         <script src="https://cdn.tailwindcss.com"></script>
     </head>
       <?php
        include "Quantri2.php";
        ?>
     <body class="container mx-auto">
       <div class="boss_tt">
        <div>
          <a href="../DAL/ADDSP.php" >
        <button class=" bg-yellow-500 w-32 h-10 rounded-lg  ">Them🐼</button>
        </a>
        </div>
       
     <div>
    <form method="GET" action="Sapxep.php">
    <select name="sapxep" class="bg-emerald-500 w-40 h-10 rounded-lg ">
        <option value="gia_asc">Gia tang dan</option>
        <option value="gia_desc">Gia giam dan</option>
        <option value="soluong_asc">So luong tang dan</option>
        <option value="soluong_desc">So luong giam dan</option>
    </select>
    <input type="submit" class="bg-blue-400  w-24 h-10 rounded-lg" value="Sắp xếp">
      </form>
     </div>
      
         <div>
        <form method="GET" action="ADtimkiem.php"  class="mx-10">
          <input type="text" class="w-48 h-10  rounded-lg border-2 " name="search" placeholder="Tim kiem....">
          <button type="submit" class="w-24 h-10 rounded-lg bg-green-400" >Tim kiem</button>
        </form>
         </div>   
        


      </div>
          <table class="table-auto border-collapse border border-slate-400 w-4/5 text-bold" >
  <thead>
   
    
         
     
    <tr class="bg-red-300 w-40 h-14  ">
      <th>ID</th>
      <th>Ma san pham</th>
      <th>Ten san pham</th>
      <th>Hinh anh</th>
      <th>Gia</th>
      <th>So luong</th>
      <th>Trang thai</th>
      <th>Thao tac</th>

    </tr>
  </thead>
  <tbody>

    <?php while($row=mysqli_fetch_array($query2)): ?>
    <tr>
      <td class="text-center"> <?= $row['id_sanpham']?>   </td>
      <td class="text-center"><?= $row['masanpham']?></td>
      <td class="text-center"><?= $row['tensanpham']?></td>
      <td class="text-center w-32 h-32">
        <img  src="images/<?= $row['hinhanh']?>" alt="">
      </td>
      <td class="text-center"><?= $row['giasanpham']?></td>
      <td class="text-center">

        <?php echo ($row['soluong']>=1?$row['soluong']:"<button class='w-24 bg-red-500 rounded-xl'>Hết hàng</button>")?>
      
      </td>
      <td class="text-center">     
          <?php 
          $trangthai=$row['trangthai'];
          $active=($trangthai==1)?"<button class='w-24 bg-green-500 rounded-xl'>Active</button> ":"<button class='w-24 bg-gray-500 rounded-xl'>Disable</button>";
          echo $active;
          ?>
    </td>
     <td  class="text-center">
        <div>
        <a  href="../DAL/SUASP.php?id=<?=$row['id_sanpham']?>">
              <button class="bg-green-400 w-24 hover:bg-yellow-600 rounded-full"> Sua</button>
        </a>
        </div>
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa san pham nay khong?");
        }
    </script>
        <div>
        <a  href="../DAL/XOASP.php?id=<?=$row['id_sanpham']?>">
              <button onclick="return confirmDelete()" class="bg-pink-400 w-24 hover:bg-pink-600 rounded-full"> Xoa</button>
        </a>
        </div>
       
    <div>
      <a  href="../DAL/KHOASP.php?id=<?=$row['id_sanpham']?>">
              <button class="bg-blue-400 w-24 hover:bg-blue-600 rounded-full"> 
                <?php $ac=$row['trangthai']==1?"Khoa":"Mo khoa";  echo $ac;?>
              </button>
        </a>
        </div>
        
      </td>
    </tr>
  <?php endwhile?>
  </tbody>
     
    </table>
    <div class="my-10">
 <a href="ADsanpham.php" class="bg-yellow-500   p-2">Quay lai </a>
    </div>
   
     </body>
     </html>
  
