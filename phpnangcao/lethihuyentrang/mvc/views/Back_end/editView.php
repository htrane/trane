<?php
 $obj= new AdProductType;
 $txt_Ma_loaisp =isset($_POST["txt_Ma_loaisp"])?:$data["product"]["Ma_loaisp"];
 $txt_Ten_loaisp =isset($_POST["txt_Ten_loaisp"])?:$data["product"]["Ten_loaisp"];
 $txt_Mota_loaisp =isset($_POST["txt_Mota_loaisp"])?:$data["product"]["Mota_loaisp"];
?>
<form method="post">
    <table class="center-table">
        <tr>
            <td>Mã loại sản phẩm</td>
            <td><input type="text" name="txt_Ma_loaisp" readonly value="<?php echo $txt_Ma_loaisp; ?>" /></td>
        </tr>
        <tr>
            <td>Tên loại sản phẩm</td>
            <td><input type="text" name="txt_Ten_loaisp" value="<?php echo $txt_Ten_loaisp; ?>" /></td>
        </tr>
        <tr>
            <td>Mô tả sản phẩm</td>
            <td><textarea name="txt_Mota_loaisp" cols="20" rows="5"><?php echo $txt_Mota_loaisp; ?></textarea></td>
        </tr>
        <tr class="center-buttons">
            <td colspan="2">
            <input type="submit" name="update" value="Cập nhật"/>
                <input type="reset" name="reset" value="Reset"/>
            </td>
        </tr>
    </table>
</form>
