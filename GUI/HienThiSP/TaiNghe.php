
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<?php
// Kết nối CSDL và import file Head.php
include "Head.php";
?>
    <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 text-center -mt-4">Tai nghe</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
            <?php
            // Truy vấn CSDL để lấy danh sách sản phẩm điện thoại từ danh mục có id_danhmuc = 2
            $sql = "SELECT * FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc WHERE tbl_sanpham.id_danhmuc = 4";
            $query = $conn->query($sql);
            while($row = mysqli_fetch_array($query)):
            ?>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <a href="#">
                    <img src="../images/<?= $row["hinhanh"] ?>" alt="product image" class="w-full h-68 object-cover rounded-t-lg">
                </a>
                <div class="p-4">
                    <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white"><?= $row["tensanpham"] ?></a>
                    <div class="flex items-center mt-2">
                        <!-- Đánh giá sao -->
                        <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 1.4l1.36 3.59L15 7.15l-3.42 2.91L10 14.33l-1.58 1.43 1.19-3.64L5 7.15l3.64-2.92L10 1.4z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 1.4l1.36 3.59L15 7.15l-3.42 2.91L10 14.33l-1.58 1.43 1.19-3.64L5 7.15l3.64-2.92L10 1.4z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 1.4l1.36 3.59L15 7.15l-3.42 2.91L10 14.33l-1.58 1.43 1.19-3.64L5 7.15l3.64-2.92L10 1.4z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 1.4l1.36 3.59L15 7.15l-3.42 2.91L10 14.33l-1.58 1.43 1.19-3.64L5 7.15l3.64-2.92L10 1.4z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 1.4l1.36 3.59L15 7.15l-3.42 2.91L10 14.33l-1.58 1.43 1.19-3.64L5 7.15l3.64-2.92L10 1.4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-bold text-gray-900 dark:text-white"><?= $row["giasanpham"] ?>,000 Đ</span>
                        <a href="xemchitiet.php?id_sanpham=<?= $row["id_sanpham"] ?>&id_danhmuc=<?= $row["id_danhmuc"] ?>" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-sm font-medium">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
<?php
// Import file Footer.php
include "Footer.php";
?>
