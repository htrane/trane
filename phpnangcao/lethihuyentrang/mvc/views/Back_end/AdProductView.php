
<table>
        <thead>
            <tr>
                <th colspan="12">Quản lý danh sách sản phẩm</th>
            </tr>
            <tr>
                <th colspan="12">
                    <form action="./insert" method="POST">
                    <button type="submit" name="send" class="btn">Thêm Mới</button>
                </form>
                </th>   
            </tr>
            <tr>
                <th>Mã Loại sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá Nhập</th>
                <th>Giá xuất</th>
                <th>Khuyến mại</th>
                <th>Số lượng</th>
                <th>Mô tả sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $r) { ?>
                    <tr>
                    <td><?php echo $r['ma_loaisp']; ?></td>
                    <td><?php echo $r['ma_sp']; ?></td>
                    <td><?php echo $r['tensp']; ?></td>
                    <td><img src="<?php echo BASE_URL;?><?php echo $r['hinhanh']; ?>" width="80"></td>
                    <td><?php echo $r['gianhap']; ?></td>
                    <td><?php echo $r['giaxuat']; ?></td>
                    <td><?php echo $r['khuyenmai']; ?></td>
                    <td><?php echo $r['soluong']; ?></td>
                    <td><?php echo $r['motasp']; ?></td>
                    <td><?php echo $r['ngay_nhap']; ?></td>
                    <td><a href="./update/<?php echo ($r['ma_loaisp']); ?>" class="btn">Sửa</a></td>
                    <td><a href="./delete/<?php echo ($r['ma_sp']); ?>" class="btn">Xóa</a></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="12">Không có dữ liệu</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>