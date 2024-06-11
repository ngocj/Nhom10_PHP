<?php 
include "../DAL/KetNoi.php";
global $conn;
$order_by = ""; // Mặc định sắp xếp theo tên tăng dần
if (isset($_GET['sapxep'])) {
    switch ($_GET['sapxep']) {
        case 'gia_asc':
            $order_by = "giasanpham ASC";
            break;
        case 'gia_desc':
            $order_by = "giasanpham DESC";
            break;
        case 'soluong_asc':
            $order_by = "soluong ASC";
            break;
        case 'soluong_desc':
            $order_by = "soluong DESC";
            break;
    }
}
$sql = "SELECT * FROM tbl_sanpham ORDER BY $order_by";
$query = $conn->query($sql);

?>
 <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
    </style>
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
         <script src="https://cdn.tailwindcss.com"></script>
     </head>
     <body class="container mx-auto">
          <table class="table-auto border-collapse border border-slate-400 w-4/5 text-bold" >
  <thead>
   
      <div>
    <form method="GET" action="ADtimkiem.php" style="float:right;" class="mx-20">
          <input type="text" class="w-48 h-10  rounded-lg border-2 " name="search" placeholder="Tim kiem....">
          <button type="submit" class="w-24 h-10 rounded-lg bg-green-400" >Tim kiem</button>
    </form>
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

    <?php while($row=mysqli_fetch_array($query)): ?>
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
              <button class="bg-blue-400 w-24 hover:bg-blue-600 rounded-full"> Khoa</button>
        </a>
        </div>
        
      </td>
    </tr>
  <?php endwhile?>
  </tbody>
     
    </table>
    <div class="my-10">
 <a href="ADsanpham.php" class="bg-yellow-500  p-2">Quay lai </a>
    </div>
   
     </body>
     </html>
  
