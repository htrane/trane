<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị người dùng</title>
    <link href="<?php echo BASE_URL;?>./public/style.css" rel="stylesheet">
</head>
<body>
    
    <div class="main">
        <div class="header">
            <?php
               require_once "./mvc/views/pages/Menu.php";
               ?>
        </div>

        <div class="content">
            <?php
               require_once "./mvc/views/front end/".$data["page"].".php";
               ?>
        </div>

        <div class="footer">
            
        </div>
        
    </div>

</body>
</html>
