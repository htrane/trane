<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa loại sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main">
        <div class="admin-header">
            <h2>Chỉnh sửa loại sản phẩm</h2>
        </div>
        <div class="admin-content">
            <form action="" method="post"> <!-- action để gửi dữ liệu lại chính trang này -->
                <div class="form-group">
                    <label for="txt_maloaisp">Mã sản phẩm:</label>
                    <input type="text" name="maloaisp" value="<?php echo $data['Adproducttype']['Ma_loaisp']; ?>" readonly style="color: #666; background-color: #f5f5f5;"/> <!-- Hiển thị mã sản phẩm với màu đen nhạt -->
                    <input type="hidden" name="id" value="<?php echo $data['Adproducttype']['Ma_loaisp']; ?>"/> <!-- Lưu ID sản phẩm để xử lý nếu cần -->


                    <label for="txt_tenloaisp">Tên loại sản phẩm:</label>
                    <input type="text" id="txt_tenloaisp" name="txt_tenloaisp" placeholder="Nhập tên loại sản phẩm" value="<?php echo $data['Adproducttype']['Ten_loaisp']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="txt_motaloaisp">Mô tả loại sản phẩm:</label>
                    <input type="text" id="txt_motaloaisp" name="txt_motaloaisp" placeholder="Nhập mô tả loại sản phẩm" value="<?php echo $data['Adproducttype']['Mota_loaisp']; ?>"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="details-button"/>
                </div>
            </form>
            <a href="http://localhost/php-mvc-master/AdProductType/" class="btn">Quay lại</a>
        </div>
    </div>
</body>
</html>
