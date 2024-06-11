<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto my-5">
    <ul class="flex border-b">
         <li class=" mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="Quantri.php?index=Home">Trang chủ</a>
  </li>
  <li class=" mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800 font-semibold" href="Quantri.php?index=ADsanpham">Quản lý sản phẩm</a>
  </li>
  <li class="mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800  font-semibold" href="Quantri.php?index=ADdanhmuc">Quản lý danh mục</a>
  </li>
  <li class="mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800 font-semibold" href="Quantri.php?index=ADdonhang">Quản lý đơn hàng</a>
  </li>
  <li class="mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800 font-semibold" href="Quantri.php?index=ADtaikhoan">Quản lý tài khoản</a>
  </li>
  <li class="mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800 font-semibold" href="Quantri.php?index=Thongke">Thông Kê</a>
  </li>
   <li class="mr-2">
    <a class="bg-white hover:bg-yellow-400 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 hover:text-red-800 font-semibold" href="Quantri.php?index=Admin">Thông tin tài khoản</a>
  </li>
</ul>
    </div>

</body>
</html>
<?php 
 $url="";
 if(isset($_GET["index"])){
   $url=$_GET['index'];
 }
switch($url){
    case "Home":
           include("Home.php");
           break;
       case "ADdanhmuc":
           include("ADdanhmuc.php");
           break;
        case "ADsanpham":
           include("ADsanpham.php");
           break;
       case "ADdonhang":
           include("ADdonhang.php");
           break;
       case "ADtaikhoan":
           include("ADtaikhoan.php");
           break;
       case "Admin":
           include("Admin.php");
           break;    
}




?> 