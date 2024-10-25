<?php
// Trait Car
trait Car {
    public function InFor() {
        echo "Ô tô: Ford";
    }
}

// Trait Moto
trait Moto {
    public function Sale() {
        echo "Chương trình khuyến mãi: 50%";
    }
}

// Lớp Transport sử dụng các trait Car và Moto
class Transport {
    use Car, Moto;
}

// Tạo đối tượng của lớp Transport
$obj = new Transport();
$obj->InFor(); // Xuất ra: Ô tô: Ford
echo "<br>";
$obj->Sale();  // Xuất ra: Chương trình khuyến mãi: 50%

// gọi function getInfor () của trait moto
// moto :: InFor instanceof Car;









