<?php 
include "../DAL/KetNoi.php";
global $conn;

$limit = 7;

// Xác định trang hiện tại
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Lấy tổng số bản ghi
$sql_total = "SELECT COUNT(*) FROM tbl_sanpham";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_row();
$total_records = $row_total[0];

// Tính tổng số trang
$total_pages = ceil($total_records / $limit);

// Tính toán offset
$offset = ($page - 1) * $limit;

// Lấy dữ liệu từ bảng với LIMIT và OFFSET
$sql1 = "SELECT * FROM tbl_sanpham LIMIT $limit OFFSET $offset";
$query1 = $conn->query($sql1);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan tri san pham</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
    </style>

    <div class=" mx-32 container">
    <div class="w-4/6 my-8">
   <a href="../DAL/ADDSP.php" style="float:left;">
        <button class=" bg-yellow-500 w-32 h-10 rounded-lg  ">Them🐼</button>
        </a>
     
       <form method="GET" action="Sapxep.php">
    <select name="sapxep" class="bg-emerald-500 w-40 h-10 rounded-lg ">
        <option value="gia_asc">Gia tang dan</option>
        <option value="gia_desc">Gia giam dan</option>
        <option value="soluong_asc">So luong tang dan</option>
        <option value="soluong_desc">So luong giam dan</option>
    </select>
    <input type="submit" class="bg-blue-400  w-24 h-10 rounded-lg" value="Sắp xếp">
      </form>
            
        <form method="GET" action="ADtimkiem.php" style="float:right;" class="mx-10">
          <input type="text" class="w-48 h-10  rounded-lg border-2 " name="search" placeholder="Tim kiem....">
          <button type="submit" class="w-24 h-10 rounded-lg bg-green-400" >Tim kiem</button>
        </form>
        
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
  

    <?php while($row=mysqli_fetch_array($query1)): ?>
    <tr>
      <td class="text-center"> <?= $row['id_sanpham']?>   </td>
      <td class="text-center"><?= $row['masanpham']?></td>
      <td class="text-center"><?= $row['tensanpham']?></td>
      <td class="text-center w-32 h-32">
        <img src="images/<?= $row['hinhanh']?>" alt="">
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
        </button>
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
<div class="my-5 w-48 mx-auto">
<?php   
    echo "<div class='w-38 text-red-600'><a href='Quantri.php?index=ADsanpham'>Trang chu</a></div>";
   echo "Trang";
 for ($i = 1; $i <= $total_pages; $i++): ?>
   <a href="ADsanpham.php?page=<?php echo $i?>"><button class="bg-pink-400 w-10 hover:bg-pink-600 rounded-full">
    <?php echo $i?>
   </button></a>
<?php endfor ?>
</div>

</div>


</body>
</html>