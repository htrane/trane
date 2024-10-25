<!DOCTYPE html>
<html>
<head>
    <style>
        .product img {
            width: 150px; /* Adjust the width as needed */
            height: auto; /* Keep the aspect ratio */
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007BFF;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="product-container">
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $r) { ?>
        <div class="product">
            <h2>Tên sản phẩm<?php echo $r['tensp']; ?></h2>
            <img src="<?php echo BASE_URL;?><?php echo $r['hinhanh']; ?>" alt="Product Image">
            <p>Giá: <?php echo $r['giaxuat']; ?></p>
            <p>Khuyến mãi: <?php echo $r['khuyenmai']; ?></p>
            <form action="<?php echo BASE_URL; ?>detail" method="post">
                <button type="hidden" name="#" value="" class="button">thêm giỏ hàng</button>
                <button type="submit" name="/detail" class="button">Xem chi tiết</button>
            </form>
        </div>
        <?php } ?>
        <?php } else { ?>
        <p>Không có dữ liệu</p>
        <?php } ?>
    </div>
</body>
</html>
