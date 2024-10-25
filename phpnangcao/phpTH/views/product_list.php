<form method="post" action="/phpTH/index.php?action=search">
    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : ''; ?>">
    <input type="submit" value="Tìm kiếm">
</form>

<h2>Danh sách sản phẩm</h2>
<table border="1">
    <tr>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá bán</th>
        <th>Khuyến mại</th>
        <th>Chi Tiết</th>
    </tr>

    <?php if (!empty($searchResults)) {
        foreach ($searchResults as $product) { ?>
            <tr>
                <td><img src="<?php echo $product['hinhanh']; ?>" width="100"></td>
                <td>
                    <!-- <a href="/phpTH/index.php?action=detail&masp=<?php echo $product['masp']; ?>"> -->
                <?php echo $product['tensp']; ?></a></td>
                <td><?php echo $product['giaxuat']; ?></td>
                <td><?php echo $product['khuyenmai']; ?></td>
                <td><a href="/phpTH/index.php?action=detail&masp=<?php echo $product['masp']; ?>"><?php echo "Chi tiết"; ?></a></td>
            </tr>
    <?php }
    } elseif (!empty($products)) {
        foreach ($products as $product) { ?>
            <tr>
                <td><img src="<?php echo $product['hinhanh']; ?>" width="100"></td>
                 <td>
                    <!-- <a href="/phpTH/index.php?action=detail&masp=<?php echo $product['masp']; ?>">  -->
                <?php echo $product['tensp']; ?></a></td>
                <td><?php echo $product['giaxuat']; ?></td>
                <td><?php echo $product['khuyenmai']; ?></td>
                <td><a href="/phpTH/index.php?action=detail&masp=<?php echo $product['masp']; ?>"><?php echo "Chi tiết"; ?></a></td>
            </tr>
    <?php }
    } else { ?>
        <tr><td colspan="4">Không tìm thấy sản phẩm</td></tr>
    <?php } ?>
</table>
