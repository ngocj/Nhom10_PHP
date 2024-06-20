<?php 
 $check=true;
include "../../DAL/KetNoi.php";
global $conn;
$username="";
$pass="";
$error=[];
if(isset($_POST["btnDangNhap"])){
    $username=$_POST["username"];
    $pass=$_POST["pass"];
}
if(!empty($username)&&!empty($pass)){
$sql="SELECT * FROM tbl_admin WHERE username='$username' AND pass='$pass'";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);


$sql2="SELECT * FROM tbl_dangky WHERE taikhoan='$username' AND matkhau='$pass'";
$query2=$conn->query($sql2);
$row2=mysqli_fetch_array($query2);

if($row2>=1){
    header("location:main.php");
}else{
    $check=false;
}

if($row>=1){
    header("location:../quantri2.php");
}else{
   $check=false;
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

<?php 
if($check==false){
    echo " 
    <div class='flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800' role='alert'>
  <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
  </svg>
 
  <div>
    <span class='font-medium text-xl'>
    Sai tai khoan hoac mat khau
    </span> 
  </div>
</div>   
  " ;       
};
?>
<form  method ="post">
<section class="bg-gray-50 dark:bg-gray-900">
    
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          ZYRO
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Đăng nhập tài khoản
              </h1>
              <form class="space-y-4 md:space-y-6" method="POST" >
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tài khoản</label>
                      <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                      <input type="password" name="pass" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Nhớ mật khẩu</label>
                          </div>
                      </div>
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Quên mật khẩu?</a>
                  </div>
                  <button type="submit" name="btnDangNhap" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Đăng nhập</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Chưa có tài khoản? <a href="DangKy.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng ký</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

</form>
</body>
</html>