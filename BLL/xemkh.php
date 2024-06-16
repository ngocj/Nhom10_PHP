<?php
include "../DAL/KetNoi.php";
global $conn;
$id=(int)$_GET['id'];
$sql="SELECT * FROM tbl_dangky WHERE id_khachhang='$id'";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto w-full bg-pink-500 p-5">
    <h1>Thông tin khach hang có id là: <?= $row['id_khachhang']?></h1>
    <div>
        <p class="text-black-400 text-2xl">Họ tên : <span class="text-white"> <?= $row['hovaten']?> </span> </p>
        <p class="text-black-400 text-2xl">Tài khoản:  <span class="text-white"> <?= $row['taikhoan']?> </span></p>
        <p class="text-black-400 text-2xl">Mật khẩu: <span class="text-white"> <?= $row['matkhau']?> </span></p>
        <p class="text-black-400 text-2xl">Số điện thoại:<span class="text-white"> <?= $row['sodienthoai']?> </span> </p>
        <p class="text-black-400 text-2xl">Email: <span class="text-white"> <?= $row['email']?> </span></p>
        <p class="text-black-400 text-2xl">Địa chỉ:<span class="text-white"> <?= $row['diachi']?> </span> </p>
        <p class="text-black-400 text-2xl">Chức vụ:<span class="text-white"> <?= $row['chucvu']?> </span> </p>
    </div>
   
    </div>
    <div class="container mx-auto w-full">
          <a href="../GUI/ADtaikhoan.php">Quay lai trang chu</a>
    </div>
</body>
</html>