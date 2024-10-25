<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quản trị người dùng</title>
</head>
<body>
    <div class="main">
        <?php 
            require_once "./mvc/views/pages/menu_backendView.php"; // Nhúng menu
        ?>
        <div class="content">
            <?php
                require_once "./mvc/views/back_end/".$data["page"].".php"; // Nhúng nội dung của trang
            ?>
        </div>
        <div class="footer">
            @<i class="fa fa-copyright" aria-hidden="true">Họ tên sv</i>
        </div>
    </div>
</body>
</html>
