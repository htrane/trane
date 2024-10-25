<form action="" method="post" enctype="multipart/form-data">
    <table width="800" border="1">
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>
                <select name="ma_loaisp" id="ma_loaisp">
        <?php foreach($data['productTypes'] as $productType): ?>
            <option value="<?php echo $productType['Ma_loaisp']; ?>">
                <?php echo $productType['Ma_loaisp']; ?>
            </option>
        <?php endforeach; ?>
             </select>
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input name="ma_sp" type="text" required></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input name="tensp" type="text" required></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh" style="border: none; padding-top: 10px"/>
           
            </td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input name="gianhap" type="text" required></td>
        </tr>
        <tr>
            <td>Giá xuất</td>
            <td><input name="giaxuat" type="text" required></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input name="soluong" type="text" required></td>
        </tr>
        <tr>
            <td>Khuyến mãi</td>
            <td><input name="khuyenmai" type="text" required></td>
            
        </tr>
        <tr>
            <td>Mô tả sản phẩm</td>
            <td><input name="motasp" type="text" required></td>
        </tr>
        <tr>
            <td>Ngày tạo</td>
            <td><input name="ngay_nhap" type="date" required></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center;">
                <input type="submit" style="text-align:center" value="Cập nhật" name="btn_update">
            </th>
        </tr>
    </table>
</form>
