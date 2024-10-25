<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

// Kiểm tra action được yêu cầu
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$masp = isset($_GET['masp']) ? $_GET['masp'] : null;

switch ($action) {
    case 'list':
        $controller->list();
        break;
    case 'detail':
        if ($masp) {
            $controller->detail($masp);
        } else {
            $controller->list();
        }

        
        break;
    case 'search':
        $controller->search();
        break;
    default:
        $controller->list();
        break;
}
?>
<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'detail':
            if (isset($_GET['masp'])) {
                $controller->detail($_GET['masp']);
            } else {
                echo "Mã sản phẩm không tồn tại!";
            }
            break;
        // Các hành động khác như 'list', 'search', ...
        default:
            $controller->list();
            break;
    }
} else {
    // Mặc định hiển thị danh sách sản phẩm
    $controller->list();
}
?>

