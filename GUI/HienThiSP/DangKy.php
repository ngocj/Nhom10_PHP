<?php
include "../../DAL/KetNoi.php";
global $conn;

$hovaten="";
$taikhoan="";
$matkhau="";
$sodienthoai="";
$email="";

$errors = array(); 
if(isset($_POST['btnAdd'])){
    $hovaten=$_POST['name'];
    $taikhoan=$_POST['taikhoan'];
    $matkhau=$_POST['pass'];
    $sodienthoai=$_POST['sdt'];
    $email=$_POST['email'];
   }
if(!empty($hovaten)&&!empty($taikhoan)&&!empty($matkhau)&&!empty($sodienthoai)&&!empty($email)){
    $sql="INSERT INTO tbl_dangky VALUES ('','$hovaten','$taikhoan','$matkhau','$sodienthoai','$email','','')";
    $query=$conn->query($sql);
    if($query){
        header("location:DangNhap.php");
    }else{
        echo "Sai ";
    }
}
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include 'Head.php' ?>
<form  method ="post">
<section class="bg-gray-50 dark:bg-gray-900 pt-10">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          ZYRO    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Tạo một tài khoản
              </h1>
              <form class="space-y-4 md:space-y-6" action="" method="POST">
              <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ và tên</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="" placeholder="Nguyen Bao Ngoc">
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tài khoản</label>
                      <input type="text" name="taikhoan" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="" placeholder="ngoc123">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                      <input type="password" name="pass" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                      <input type="text" name="sdt" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="" placeholder="09123114">
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="email" name="email" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="" placeholder="ngocnguyen10072003@gmail.com">
                  </div>
                  <div class="flex items-start">
                      <div class="flex items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="" >
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Tôi chấp nhận <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">giấy phép và điều kiện</a></label>
                      </div>
                  </div>
                  <input type="submit" value="Tao tai khoan" name="btnAdd" class="w-full text-white bg-blue-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"/>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Bạn đã có tài khoản? <a href="DangNhap.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng nhập ở đây</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</form>
</body>
</html>


