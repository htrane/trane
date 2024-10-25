<body>
    <div class="product-container">
        <?php if ($data["data"]) { ?>
            <?php foreach ($data["data"] as $r) { ?>
        <div class="product">
            <h1>Mã sản phẩm <?php echo $r['ma_sp']; ?> </h1>
            <h2>Tên sản phẩm<?php echo $r['tensp']; ?></h2>
            <img src="<?php echo BASE_URL;?><?php echo $r['hinhanh']; ?>" alt="Product Image">
            <p>Giá: <?php echo $r['giaxuat']; ?></p>
            <p>Khuyến mãi: <?php echo $r['khuyenmai']; ?></p>
            <p>Mô tả sản phẩm: <?php echo $r['motasp']; ?></p>
            <form action="<?php echo BASE_URL; ?>detail" method="post">
                <button type="hidden" name="#" value="" class="button">thêm giỏ hàng</button>
            </form>
        </div>
        <?php } ?>
        <?php } else { ?>
        <p>Không có dữ liệu</p>
        <?php } ?>
    </div>
</body>
