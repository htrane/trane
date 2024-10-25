<?php
$obj = new adproducttype;
$Ma_loaisp = "";
$Ten_loaisp = "";
$Mota_loaisp = "";

if (isset($_POST["send"])) {
    $obj->insert();
}
if (isset($_POST["delete"])) {
    $Ma_loaisp = $_POST["Ma_loaisp"];  
    $obj->delete($Ma_loaisp); 
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td colspan="5">
                <input type="text" name="txt_Ma_loaisp" placeholder="Nhập mã loại sp" 
                value="<?php echo isset($data['Ma_loaisp']) ? $data['Ma_loaisp'] : ''; ?>" />
                <input type="text" name="txt_Ten_loaisp" placeholder="Nhập tên loại sp" 
                value="<?php echo isset($data['Ten_loaisp']) ? $data['Ten_loaisp'] : ''; ?>" />
                <input type="text" name="txt_Mota_loaisp" placeholder="Mô tả loại sản phẩm" 
                value="<?php echo isset($data['Mota_loaisp']) ? $data['Mota_loaisp'] : ''; ?>" />
                <input type="submit" name="send" value="Lưu" />
            </td>
        </tr>
        <tr>
            <th colspan="5">Quản lý loại sản phẩm</th>
        </tr>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>Tên loại sản phẩm</td>
            <td>Mô tả loại sản phẩm</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
<?php if (!empty($data["data"])): ?>
    <?php foreach ($data["data"] as $V): ?>
        <tr>
            <td><?php echo $V['Ma_loaisp']; ?></td>
            <td><?php echo $V['Ten_loaisp']; ?></td>
            <td><?php echo $V['Mota_loaisp']; ?></td>
            <td><a href="./update/<?php echo $V['Ma_loaisp']; ?>">Sửa</a></td>
            <td><a href="./delete/<?php echo $V['Ma_loaisp']; ?>">xoá</a></td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
    </table>
</form>
