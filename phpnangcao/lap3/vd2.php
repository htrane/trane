<?php
// Định nghĩa trait Hinhhoc
trait Hinhhoc {
    public function tinhDienTich() {
        echo "Tính diện tích từ trait Hinhhoc\n";
    }
}

// Định nghĩa trait Hinh
trait Hinh {
    public function tinhDienTich() {
        echo "Tính diện tích từ trait Hinh\n";
    }
}

// Định nghĩa class HinhTronSt6
class HinhTronSt6 {
    use Hinh, Hinhhoc {
        Hinh::tinhDienTich insteadof Hinhhoc;  
        Hinhhoc::tinhDienTich as tinhDienTichHinhhoc;  
    }
    private $banKinh;
    public function __construct($banKinh) {
        $this->banKinh = $banKinh;
    }

    // Tính diện tích hình tròn
    public function tinhDienTich() {
        $dienTich = pi() * pow($this->banKinh, 2);  
        echo "Diện tích hình tròn: " . $dienTich . "\n";
    }

    // Tính chu vi hình tròn
    public function tinhChuVi() {
        $chuVi = 2 * pi() * $this->banKinh;  
        echo "Chu vi hình tròn: " . $chuVi . "\n";
    }
}

// Định nghĩa class HinhVuong
class HinhVuong {
    private $canh;
    public function __construct($canh) {
        $this->canh = $canh;
    }

    // Tính diện tích hình vuông
    public function tinhDienTich() {
        $dienTich = pow($this->canh, 2);  
        echo "Diện tích hình vuông: " . $dienTich . "\n";
    }

    // Tính chu vi hình vuông
    public function tinhChuVi() {
        $chuVi = 4 * $this->canh;  
        echo "Chu vi hình vuông: " . $chuVi . "\n";
    }
}

// Định nghĩa class HinhTamGiac
class HinhTamGiac {
    private $canhA;
    private $canhB;
    private $canhC;
    public function __construct($canhA, $canhB, $canhC) {
        $this->canhA = $canhA;
        $this->canhB = $canhB;
        $this->canhC = $canhC;
    }

    // Tính diện tích hình tam giác sử dụng công thức Heron
    public function tinhDienTich() {
        $p = ($this->canhA + $this->canhB + $this->canhC) / 2;
        $dienTich = sqrt($p * ($p - $this->canhA) * ($p - $this->canhB) * ($p - $this->canhC));
        echo "Diện tích hình tam giác: " . $dienTich . "\n";
    }

    // Tính chu vi hình tam giác
    public function tinhChuVi() {
        $chuVi = $this->canhA + $this->canhB + $this->canhC;
        echo "Chu vi hình tam giác: " . $chuVi . "\n";
    }
}

$objHinhTron = new HinhTronSt6(3);  
$objHinhTron->tinhDienTich();     
$objHinhTron->tinhChuVi();

$objHinhVuong = new HinhVuong(3);
$objHinhVuong->tinhDienTich();
$objHinhVuong->tinhChuVi();

$objHinhTamGiac = new HinhTamGiac(3, 4, 5);
$objHinhTamGiac->tinhDienTich();
$objHinhTamGiac->tinhChuVi();
?>