<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        /* Định dạng chung */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e3f2fd; /* Màu xanh nhạt cho nền */
            margin: 0;
            padding: 20px;
        }

        /* Định dạng cho container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #1565c0; /* Màu xanh đậm cho tiêu đề */
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Định dạng cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #bbb;
        }

        th {
            background-color: #42a5f5; /* Màu xanh sáng cho tiêu đề bảng */
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            text-align: left;
        }

        /* Định dạng cho các hàng xen kẽ */
        tr:nth-child(even) {
            background-color: #bbdefb; /* Màu xanh nhạt cho các hàng xen kẽ */
        }

        tr:hover {
            background-color: #90caf9; /* Màu xanh nhạt hơn khi hover */
        }

        /* Định dạng cho hình ảnh sản phẩm */
        img {
            max-width: 80px;
            border-radius: 5px;
        }

        /* Định dạng cho ô input tìm kiếm */
        .search-box {
            text-align: center;
            margin-bottom: 20px;
            background-color: #42a5f5; /* Màu nền cho ô tìm kiếm */
            border-radius: 10px;
            padding: 20px; /* Tăng padding để form to hơn */
        }

        input[type="text"] {
            padding: 15px; /* Tăng padding */
            width: 450px; /* Kích thước rộng hơn cho ô nhập */
            border: 2px solid #bbb;
            border-radius: 5px;
            margin-right: 10px;
            background-color: #fff; /* Màu nền trắng cho ô tìm kiếm */
            transition: border 0.3s; /* Thêm hiệu ứng chuyển tiếp */
        }

        input[type="text"]:focus {
            border-color: #1e88e5; /* Thay đổi màu viền khi focus */
        }

        /* Định dạng cho nút submit */
        input[type="submit"] {
            padding: 15px 20px; /* Tăng padding cho nút */
            background-color: #1e88e5; /* Màu xanh sáng cho nút */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #42a5f5; /* Màu xanh sáng hơn khi hover */
        }

        /* Định dạng cho footer */
        .footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Quản lý sản phẩm</h2>

        <!-- Search box -->
        <div class="search-box">
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>

        <!-- Danh sách sản phẩm -->
        <?php include 'product_list.php'; ?>
    </div>

    <div class="footer">
        <p>© 2024 Quản lý sản phẩm. All rights reserved.</p>
    </div>
</body>
</html>
