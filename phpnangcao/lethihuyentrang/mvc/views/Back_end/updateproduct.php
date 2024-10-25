<?php if (isset($data['product'])): ?>
    <?php $product = $data['product']; ?>
<?php else: ?>
    <p>Sản phẩm không tồn tại.</p>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Mã Loại Sản Phẩm:</td>
            <td><input type="text" name="txt_ma_loaisp" readonly value="<?php echo $product['ma_loaisp']; ?>" /></td>
        </tr>
        <tr>
            <td>Mã Sản Phẩm:</td>
            <td><input type="text" id="ma_sp" name="ma_sp" value="<?php echo $product['ma_sp']; ?>" required></td>
        </tr>
        <tr>
            <td>Tên Sản Phẩm:</td>
            <td><input type="text" id="tensp" name="tensp" value="<?php echo $product['tensp']; ?>" required></td>
        </tr>
        <tr>
            <td>Hình Ảnh:</td>
            <td>
                <input type="file" id="hinhanh" name="hinhanh">
                <input type="hidden" name="existing_hinhanh" value="<?php echo $product['hinhanh']; ?>">
                <img src="<?php echo $product['hinhanh']; ?>" alt="Current Image" width="100">
            </td>
        </tr>
        <tr>
            <td>Giá Nhập:</td>
            <td><input type="number" id="gianhap" name="gianhap" value="<?php echo $product['gianhap']; ?>" required></td>
        </tr>
        <tr>
            <td>Giá Xuất:</td>
            <td><input type="number" id="giaxuat" name="giaxuat" value="<?php echo $product['giaxuat']; ?>" required></td>
        </tr>
        <tr>
            <td>Khuyến Mãi (%):</td>
            <td><input type="number" id="khuyenmai" name="khuyenmai" value="<?php echo $product['khuyenmai']; ?>" required></td>
        </tr>
        <tr>
            <td>Số Lượng:</td>
            <td><input type="number" id="soluong" name="soluong" value="<?php echo $product['soluong']; ?>" required></td>
        </tr>
        <tr>
            <td>Mô Tả:</td>
            <td><textarea id="motasp" name="motasp" rows="4" cols="50" required><?php echo $product['motasp']; ?></textarea></td>
        </tr>
        <tr>
            <td>Ngày Nhập:</td>
            <td><input type="date" id="ngay_nhap" name="ngay_nhap" value="<?php echo $product['ngay_nhap']; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Cập Nhật Sản Phẩm</button></td>
        </tr>
    </table>
</form>
