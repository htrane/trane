<?php
trait message1 {
    public function msg() {
        echo "Welcome to Khoa CNTT";
    }
}

trait message2 {
    public function msg() {
        echo "Very happy to see you visiting Đại học Lao động Xã hội";
    }
}

class user {
    use message1, message2 {
        message1::msg insteadof message2; // Dùng phương thức msg() của message1 thay vì message2
    }
}

$user = new user();
$user->msg(); // Gọi phương thức msg() từ message1
?>
