<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <h1>Chi tiết sản phẩm</h1>
    <p>Tên sản phẩm: <?php echo $product['name']; ?></p>
    <p>Giá: <?php echo $product['price']; ?> VND</p>
    <p>Mô tả: <?php echo $product['description']; ?></p>
</body>
</html>
<h2>Chi tiết sản phẩm</h2>
<p><strong>Mã sản phẩm:</strong> <?php echo $product['masp']; ?></p>
<p><strong>Tên sản phẩm:</strong> <?php echo $product['tensp']; ?></p>
<p><strong>Giá:</strong> <?php echo $product['giaxuat']; ?></p>
<p><strong>Khuyến mại:</strong> <?php echo $product['khuyenmai']; ?></p>
<p><strong>Hình ảnh:</strong> <br><img src="<?php echo $product['hinhanh']; ?>" width="200"></p>
<p><strong>Mô tả:</strong> <?php echo $product['mota']; ?></p>
<a href="index.php">Quay lại danh sách sản phẩm</a>