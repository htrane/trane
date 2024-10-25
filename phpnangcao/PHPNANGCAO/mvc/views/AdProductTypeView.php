<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sản phẩm</title>
    <link href="./public/style.css" rel="stylesheet"/>
    </head>
<body>
    <div class="main">
        <div class="admin-header">
            <h2>Quản lý loại sản phẩm</h2>
        </div>
        <div class="admin-content">
            <form action="<?php echo BASE_URL . 'AdProductType/add'; ?>" method="post">
                <?php if (isset($data['error'])): ?>
                    <div class="error-message" style="color: red;">
                        <?php echo $data['error']; ?>
                    </div>
                <?php endif; ?>

                <table class="admin-form">
                    <tr>
                        <td>
                            <input type="text" name="txt_maloaisp" placeholder="Nhập mã loại sản phẩm" value="<?php echo isset($txt_maloaisp) ? $txt_maloaisp : ''; ?>" />
                        </td>
                        <td>
                            <input type="text" name="txt_tenloaisp" placeholder="Nhập tên loại sản phẩm" value="<?php echo isset($txt_tenloaisp) ? $txt_tenloaisp : ''; ?>" />
                        </td>
                        <td>
                            <input type="text" name="txt_motaloaisp" placeholder="Nhập mô tả loại sản phẩm" value="<?php echo isset($txt_motaloaisp) ? $txt_motaloaisp : ''; ?>" />
                        </td>
                        <td>
                            <button type="submit" name="insert" value="insert" class="details-button">Thêm mới</button>
                        </td>
                    </tr>
            </table>
            </form>

            <!-- Bảng thông tin sản phẩm -->
            <table class="admin-table">
                <tr>
                    <th>Mã loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Mô tả loại sản phẩm</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                <?php if (!empty($data["Adproducttype"])): ?>
                    <?php foreach ($data["Adproducttype"] as $r): ?>
                        <tr>
                            <td><?php echo $r['Ma_loaisp']; ?></td>
                            <td><?php echo $r['Ten_loaisp']; ?></td>
                            <td><?php echo $r['Mota_loaisp']; ?></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'AdProductType/delete/' . $r['Ma_loaisp']; ?>">Xóa</a></td>
                            <td><a class="details-button" href="<?php echo BASE_URL . 'AdProductType/edit/' . $r['Ma_loaisp']; ?>">Sửa</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>

            <!-- Nút quay lại -->
            <a href="../Admin" class="details-button">Quay lại</a>
            </div>
    </div>
</body>
</html>
